<?php
require '../../config.php';

session_start();

// Génération du token CSRF si nécessaire
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}


$errors = []; // Tableau pour stocker les erreurs

// Récupération de l'ID du client depuis l'URL
$clientId = $_GET['id'] ?? null;

if (!$clientId || !is_numeric($clientId)) {
    die("ID du client invalide.");
}

// Requête pour récupérer les informations du client
$stmt = $pdo->prepare("SELECT * FROM clients WHERE ID = :id");
$stmt->execute([':id' => $clientId]);
$client = $stmt->fetch();

if (!$client) {
    die("Client introuvable.");
}

// Requête pour récupérer les documents associés au client
$stmtDocuments = $pdo->prepare("
    SELECT document_recto, document_verso
    FROM client_documents
    WHERE client_id = :client_id
");
$stmtDocuments->execute([':client_id' => $clientId]);
$documents = $stmtDocuments->fetch();

// Récupérer les notes associées au client
$stmtNotes = $pdo->prepare("
    SELECT id, note, created_at 
    FROM client_notes 
    WHERE client_id = :client_id 
    ORDER BY created_at DESC
");
$stmtNotes->execute([':client_id' => $clientId]);
$notes = $stmtNotes->fetchAll();

// Suppression d'une note
if (isset($_POST['delete_note_id']) && is_numeric($_POST['delete_note_id'])) {
    $noteId = (int)$_POST['delete_note_id'];

    $stmt = $pdo->prepare("DELETE FROM client_notes WHERE id = :id");
    $stmt->execute([':id' => $noteId]);

    // Réponse JSON pour suppression réussie
    echo json_encode(['success' => true, 'message' => 'Note supprimée avec succès.']);
    exit;
}

// Ajout d'une nouvelle note
if (!empty($_POST['new_note_text'])) {
    $noteText = trim($_POST['new_note_text']);
    if (!empty($noteText)) {
        $stmt = $pdo->prepare("
            INSERT INTO client_notes (client_id, note, created_at) 
            VALUES (:client_id, :note, NOW())
        ");
        $stmt->execute([
            ':client_id' => $clientId,
            ':note' => $noteText,
        ]);

        $newNoteId = $pdo->lastInsertId();
        echo json_encode([
            'success' => true,
            'note_id' => $newNoteId,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Le contenu de la note est vide.']);
    }
    exit;
}


// Traitement de la mise à jour (autres champs)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_POST['delete_note_id']) && empty($_POST['new_note_text'])) {
    $docNumber = trim($_POST['docNumber']);
    $familyName = trim($_POST['familyName']);
    $firstName = trim($_POST['firstName']);
    $fullName = $familyName . ' ' . $firstName;

    // Vérification si `docNumber` existe déjà pour un autre client
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM clients WHERE docNumber = :docNumber AND ID != :id");
    $stmt->execute([':docNumber' => $docNumber, ':id' => $clientId]);
    if ($stmt->fetchColumn() > 0) {
        $errors['docNumber'] = "Le numéro de document existe déjà pour un autre client.";
    }

    // Vérification si `fullName` existe déjà pour un autre client
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM clients WHERE fullName = :fullName AND ID != :id");
    $stmt->execute([':fullName' => $fullName, ':id' => $clientId]);
    if ($stmt->fetchColumn() > 0) {
        $errors['fullName'] = "Le nom complet existe déjà pour un autre client.";
    }

    // Gestion des fichiers téléversés (recto et verso)
    $allowedExtensions = ['jpg', 'jpeg', 'png'];
    $rootDir = dirname(__DIR__, 2); // Remonte de deux niveaux depuis 'client/show/' vers la racine
    $uploadDir = $rootDir . '/uploads_documents/client/images/';

    if (!is_dir($uploadDir)) {
        if (!mkdir($uploadDir, 0755, true)) {
            die("Erreur : Impossible de créer le répertoire $uploadDir. Vérifiez les permissions.");
        }
    }

    $recto = $_FILES['document_recto'] ?? null;
    $verso = $_FILES['document_verso'] ?? null;
    $filePaths = []; // Pour stocker les chemins des fichiers téléversés

    foreach (['recto' => $recto, 'verso' => $verso] as $key => $file) {
        if ($file && $file['error'] === UPLOAD_ERR_OK) {
            $fileExt = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

            if (!in_array($fileExt, ['jpg', 'jpeg', 'png'])) {
                die("Seuls les fichiers JPG, JPEG et PNG sont autorisés pour $key.");
            }

            // Générer un nom sécurisé
            $secureName = $clientId . '-' . hash('sha256', uniqid() . $file['name']) . '.' . $fileExt;
            $destinationPath = $uploadDir . $secureName;

            // Redimensionner et enregistrer l'image
            if (!resizeImage($file['tmp_name'], $destinationPath)) {
                die("Erreur lors du redimensionnement de l'image $key.");
            }

            // Vérifiez si le fichier a bien été stocké
            if (file_exists($destinationPath)) {
                $filePaths[$key] = $secureName;
            }
        }
    }

    // Mise à jour ou insertion dans `client_documents`
    if (!empty($filePaths)) {
        // Vérifiez si une entrée existe déjà dans `client_documents`
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM client_documents WHERE client_id = :client_id");
        $stmt->execute([':client_id' => $clientId]);
        $exists = $stmt->fetchColumn() > 0;

        if ($exists) {
            // Mise à jour des documents existants
            $stmt = $pdo->prepare("
                UPDATE client_documents
                SET 
                    document_recto = COALESCE(:document_recto, document_recto),
                    document_verso = COALESCE(:document_verso, document_verso)
                WHERE client_id = :client_id
            ");
        } else {
            // Insertion des nouveaux documents
            $stmt = $pdo->prepare("
                INSERT INTO client_documents (client_id, document_recto, document_verso)
                VALUES (:client_id, :document_recto, :document_verso)
            ");
        }

        $stmt->execute([
            ':client_id' => $clientId,
            ':document_recto' => $filePaths['recto'] ?? null,
            ':document_verso' => $filePaths['verso'] ?? null,
        ]);
    }

    // Mise à jour des informations du client si pas d'erreurs
    if (empty($errors)) {
        $stmt = $pdo->prepare("
            INSERT INTO clients_history 
            (client_id, entity, docType, docNumber, docExp, fullName, familyName, firstName, birthDate, address, locality, country, email, phone, company, companyvat, iban, swift, bankName, interest, referer, regdate, modified_at) 
            SELECT 
                ID, 
                entity, 
                docType, 
                docNumber, 
                docExp, 
                fullName, 
                familyName, 
                firstName, 
                birthDate, 
                address, 
                locality, 
                country, 
                email, 
                phone, 
                company, 
                companyvat, 
                iban, 
                swift, 
                bankName, 
                interest, 
                referer, 
                regdate, 
                NOW() 
            FROM clients 
            WHERE ID = :id
        ");
        $stmt->execute([':id' => $clientId]);

        $stmt = $pdo->prepare("
            UPDATE clients SET 
                entity = :entity,
                docType = :docType,
                docNumber = :docNumber,
                docExp = :docExp,
                fullName = :fullName,
                familyName = :familyName,
                firstName = :firstName,
                birthDate = :birthDate,
                address = :address,
                locality = :locality,
                country = :country,
                email = :email,
                phone = :phone,
                company = :company,
                companyvat = :companyvat,
                iban = :iban,
                swift = :swift,
                bankName = :bankName,
                interest = :interest,
                referer = :referer,
                regdate = :regdate
            WHERE ID = :id
        ");
        $stmt->execute([
            ':entity' => $_POST['entity'] ?? $client['entity'],
            ':docType' => $_POST['docType'] ?? $client['docType'],
            ':docNumber' => $_POST['docNumber'] ?? $client['docNumber'],
            ':docExp' => $_POST['docExp'] ?? $client['docExp'],
            ':fullName' => $fullName ?? $client['fullName'],
            ':familyName' => $_POST['familyName'] ?? $client['familyName'],
            ':firstName' => $_POST['firstName'] ?? $client['firstName'],
            ':birthDate' => $_POST['birthDate'] ?? $client['birthDate'],
            ':address' => $_POST['address'] ?? $client['address'],
            ':locality' => $_POST['locality'] ?? $client['locality'],
            ':country' => $_POST['country'] ?? $client['country'],
            ':email' => $_POST['email'] ?? $client['email'],
            ':phone' => $_POST['phone'] ?? $client['phone'],
            ':company' => $_POST['company'] ?? $client['company'],
            ':companyvat' => $_POST['companyvat'] ?? $client['companyvat'],
            ':iban' => $_POST['iban'] ?? $client['iban'],
            ':swift' => $_POST['swift'] ?? $client['swift'],
            ':bankName' => $_POST['bankName'] ?? $client['bankName'],
            ':interest' => $_POST['interest'] ?? $client['interest'],
            ':referer' => $_POST['referer'] ?? $client['referer'],
            ':regdate' => $client['regdate'],
            ':id' => $clientId,
        ]);

        // Message flash pour succès
        $_SESSION['flash_message'] = "Le client a été mis à jour avec succès.";

        // Redirection
        header("Location: /Metalcash_clients_add/client/show/$clientId");
        exit;
    }
}


function resizeImage($source, $destination, $maxWidth = 800, $maxHeight = 800)
{
    $imageInfo = getimagesize($source);
    if (!$imageInfo) {
        return false;
    }

    $width = $imageInfo[0];
    $height = $imageInfo[1];
    $mime = $imageInfo['mime'];

    $scale = min($maxWidth / $width, $maxHeight / $height);
    $newWidth = ceil($width * $scale);
    $newHeight = ceil($height * $scale);

    switch ($mime) {
        case 'image/jpeg':
            $sourceImage = @imagecreatefromjpeg($source);
            break;
        case 'image/png':
            $sourceImage = @imagecreatefrompng($source);
            break;
        default:
            return false;
    }

    $resizedImage = imagecreatetruecolor($newWidth, $newHeight);
    imagecopyresampled($resizedImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
    $result = imagejpeg($resizedImage, $destination, 85);
    imagedestroy($sourceImage);
    imagedestroy($resizedImage);

    return $result;
}


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du client</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/clients_add.css">
</head>

<body>
    <!-- FLASH MESSAGE SUCCESS -->
    <?php if (isset($_SESSION['flash_message'])): ?>
        <div class="flash-message success">
            <?= htmlspecialchars($_SESSION['flash_message']) ?>
        </div>
        <?php unset($_SESSION['flash_message']);
        ?>
    <?php endif; ?>
    <div class="form-container">
        <h1>Informations du client</h1>
        <form method="POST" enctype="multipart/form-data" class="form" id="clientForm" style="margin-top: 60px;">
            <input type="text" name="fake_field" style="display:none;" tabindex="-1">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'] ?? '') ?>">

            <div class="form-group">
                <label for="entity">Entité *</label>
                <select id="entity" name="entity">
                    <option value="1" <?= $client['entity'] == '1' ? 'selected' : '' ?>>Metalcash - BE</option>
                    <option value="2" <?= $client['entity'] == '2' ? 'selected' : '' ?>>Metalcash - NL</option>
                </select>
            </div>

            <div class="notes-section">
                <h2>Notes du client</h2>
                <table class="notes-table">
                    <thead>
                        <tr>
                            <th class="table-header">Date</th>
                            <th class="table-header">Note</th>
                            <th class="table-header"></th>
                        </tr>
                    </thead>
                    <tbody id="notes-list">
                        <?php if (!empty($notes)): ?>
                            <?php foreach ($notes as $note): ?>
                                <tr>
                                    <td><?= htmlspecialchars($note['created_at']) ?></td>
                                    <td><?= htmlspecialchars($note['note']) ?></td>
                                    <td>
                                        <!-- Bouton pour supprimer une note -->
                                        <button
                                            type="button"
                                            class="delete-note"
                                            data-note-id="<?= htmlspecialchars($note['id'] ?? '') ?>">
                                            Supprimer
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr id="no-notes-row">
                                <td colspan="3">Aucune note disponible pour ce client.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <div class="form-group notes-container">
                    <label for="new-note">Ajouter une note</label>
                    <input
                        id="new-note"
                        class="note-input"
                        placeholder="Écrivez une nouvelle note..." />
                    <button
                        type="button"
                        id="add-note-button"
                        class="add-note-button">
                        Enregistrer la note
                    </button>
                </div>
            </div>

            <h2>Informations sur le document d'identité</h2>
            <div class="form-group">
                <label for="docType">Type de document *</label>
                <select id="docType" name="docType">
                    <option value="1" <?= $client['docType'] == '1' ? 'selected' : '' ?>>Carte d'identité</option>
                    <option value="2" <?= $client['docType'] == '2' ? 'selected' : '' ?>>Passeport</option>
                    <option value="3" <?= $client['docType'] == '3' ? 'selected' : '' ?>>Permis</option>
                    <option value="4" <?= $client['docType'] == '4' ? 'selected' : '' ?>>Autre</option>
                </select>
            </div>
            <div class="form-row">
                <div class="form-group" style="margin-bottom: 0 !important;">
                    <label for="docNumber">Numéro de document *</label>
                    <input type="text" id="docNumber" name="docNumber" value="<?= htmlspecialchars($client['docNumber']) ?>" placeholder="exemple: 123-1234567-12">
                    <?php if (!empty($errors['docNumber'])): ?>
                        <span class="error"><?= htmlspecialchars($errors['docNumber']) ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group" style="margin-bottom: 0 !important;">
                    <label for="docExp">Date d'expiration *</label>
                    <input type="date" id="docExp" name="docExp" value="<?= htmlspecialchars($client['docExp']) ?>">
                </div>
            </div>

            <div class="form-group">
                    <label for="document_recto">Téléverser document d'identité - Recto</label>
                    <input type="file" id="document_recto" name="document_recto" accept="image/*">
                    
                    <label for="document_verso">Téléverser document d'identité - Verso</label>
                    <input type="file" id="document_verso" name="document_verso" accept="image/*">

                <div id="previewBoth" class="preview-both">
                    <?php if (!empty($documents['document_recto'])): ?>
                        <div class="image-container" data-position="recto">
                            <img class="preview-image" src="<?= BASE_URL ?>/uploads_documents/client/images/<?= htmlspecialchars($documents['document_recto']) ?>" alt="Document recto">
                            <button type="button" class="delete-image" data-position="recto">&times;</button>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($documents['document_verso'])): ?>
                        <div class="image-container" data-position="verso">
                            <img class="preview-image" src="<?= BASE_URL ?>/uploads_documents/client/images/<?= htmlspecialchars($documents['document_verso']) ?>" alt="Document verso">
                            <button type="button" class="delete-image" data-position="verso">&times;</button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Modal -->
            <div id="imageModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="modalImage">
            </div>

            <h2>Informations générales</h2>
            <div class="form-row">
                <div class="form-group">
                    <label for="familyName">Nom *</label>
                    <input type="text" id="familyName" name="familyName" value="<?= htmlspecialchars($client['familyName']) ?>" placeholder="exemple: Doe">
                    <?php if (!empty($errors['fullName'])): ?>
                        <span class="error"><?= htmlspecialchars($errors['fullName']) ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="firstName">Prénom *</label>
                    <input type="text" id="firstName" name="firstName" value="<?= htmlspecialchars($client['firstName']) ?>" placeholder="exemple: John">
                    <?php if (!empty($errors['fullName'])): ?>
                        <span class="error"><?= htmlspecialchars($errors['fullName']) ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group">
                <label for="birthDate">Date de naissance</label>
                <input type="date" id="birthDate" name="birthDate" value="<?= htmlspecialchars($client['birthDate']) ?>">
            </div>
            <div class="form-group">
                <label for="address">Adresse *</label>
                <input type="text" id="address" name="address" value="<?= htmlspecialchars($client['address']) ?>" placeholder="exemple: Avenue du marché 12">
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="locality">Localité *</label>
                    <input type="text" id="locality" name="locality" value="<?= htmlspecialchars($client['locality']) ?>" placeholder="exemple: Liège">
                </div>
                <div class="form-group">
                    <label for="country">Pays *</label>
                    <input type="text" id="country" name="country" value="<?= htmlspecialchars($client['country']) ?>" placeholder="exemple: Belgique">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" value="<?= htmlspecialchars($client['email']) ?>" placeholder="exemple: exemple@exemple.be">
                </div>
                <div class="form-group">
                    <label for="phone">Téléphone</label>
                    <input type="text" id="phone" name="phone" value="<?= htmlspecialchars($client['phone']) ?>" placeholder="exemple: +32 491 24 86 57">
                </div>
            </div>

            <h2>Informations bancaires</h2>
            <div class="form-row">
                <div class="form-group">
                    <label for="iban">IBAN</label>
                    <input type="text" id="iban" name="iban" value="<?= htmlspecialchars($client['iban']) ?>" placeholder="exemple: BE71096123456769">
                </div>
                <div class="form-group">
                    <label for="swift">SWIFT</label>
                    <input type="text" id="swift" name="swift" value="<?= htmlspecialchars($client['swift']) ?>" placeholder="exemple: KRED BE BB">
                </div>
            </div>
            <div class="form-group">
                <label for="bankName">Nom de la banque</label>
                <input type="text" id="bankName" name="bankName" value="<?= htmlspecialchars($client['bankName']) ?>" placeholder="exemple: KBC Bank">
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="company">Société</label>
                    <input type="text" id="company" name="company" placeholder="exemple: Metalcash SPRL" value="<?= htmlspecialchars($client['company']) ?>">
                </div>
                <div class="form-group">
                    <label for="companyvat">Numéro de TVA</label>
                    <input type="text" id="companyvat" name="companyvat" placeholder="exemple: BE0123456789" value="<?= htmlspecialchars($client['companyvat']) ?>">
                </div>
            </div>

            <h2>Informations complémentaires</h2>
            <div class="form-group">
                <label for="interest">Intérêt</label>
                <select id="interest" name="interest">
                    <option value="1" <?= $client['interest'] == '1' ? 'selected' : '' ?>>Etain</option>
                    <option value="2" <?= $client['interest'] == '2' ? 'selected' : '' ?>>Métal argenté</option>
                    <option value="3" <?= $client['interest'] == '3' ? 'selected' : '' ?>>D3E</option>
                    <option value="4" <?= $client['interest'] == '4' ? 'selected' : '' ?>>Catalyseurs</option>
                    <option value="10" <?= $client['interest'] == '10' ? 'selected' : '' ?>>Tout</option>
                </select>
            </div>
            <div class="form-group">
                <label for="referer">Référent</label>
                <select id="referer" name="referer">
                    <option value="1" <?= $client['referer'] == '1' ? 'selected' : '' ?>>Recherche Internet</option>
                    <option value="2" <?= $client['referer'] == '2' ? 'selected' : '' ?>>Recommendation d'un ami</option>
                    <option value="3" <?= $client['referer'] == '3' ? 'selected' : '' ?>>Déjà client</option>
                    <option value="4" <?= $client['referer'] == '4' ? 'selected' : '' ?>>Autre</option>
                </select>
            </div>

            <button type="submit" name="update_client" class="submit-button">Enregistrer les modifications</button>
        </form>
        <div id="globalError">Merci de corriger les erreurs avant de continuer.</div>
    </div>

    <!-- SCRIPTS -->
    <script>
        // Variables PHP accessibles en JavaScript
        const clientId = <?= json_encode($clientId) ?>;
        const csrfToken = '<?= $_SESSION['csrf_token'] ?? '' ?>';
        const BASE_URL = "<?= htmlspecialchars(BASE_URL, ENT_QUOTES, 'UTF-8') ?>";
    </script>

    <script src="<?= BASE_URL ?>/js/formValidationAdd.js" defer></script>
    <script src="<?= BASE_URL ?>/js/animationInputsAdd.js" defer></script>
    <script src="<?= BASE_URL ?>/js/addClientNoteShow.js" defer></script>
    <script src="<?= BASE_URL ?>/js/documentUploadShow.js" defer></script>
    <script src="<?= BASE_URL ?>/js/openIbanApi.js" defer></script>
    <script src="<?= BASE_URL ?>/js/GooglePlaceAPI.js" defer></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=VOTRE_CLE_API&libraries=places&callback=initAutocomplete" defer></script>
</body>

</html>