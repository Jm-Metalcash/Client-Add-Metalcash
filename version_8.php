<?php
require 'config.php';

session_start();

// Initialisation des variables pour sécurité htmlspecialchars
$entity = $docType = $docNumber = $docExp = $familyName = $firstName = $birthDate = $address = $locality = $country = $email = $phone = $company = $companyvat = $interest = $referer = $iban = $swift = $bankName = $note = '';
$errors = []; // Tableau pour stocker les erreurs

// Honeypot pour détecter les bots
if (!empty($_POST['fake_field'])) {
    die("Spam détecté.");
}

// Génération d'un token CSRF pour sécuriser le formulaire
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}


$processed = false;


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_client'])) {
    // Vérification CSRF
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'] ?? '')) {
        die("Erreur CSRF : soumission non autorisée.");
    }

    // Récupération des champs
    $entity = $_POST['entity'] ?? null;
    $docType = $_POST['docType'] ?? null;
    $docNumber = !empty(trim($_POST['docNumber'])) ? strtoupper(trim($_POST['docNumber'])) : null;
    $docExp = !empty(trim($_POST['docExp'])) ? $_POST['docExp'] : null;
    $familyName = !empty(trim($_POST['familyName'])) ? strtoupper(trim($_POST['familyName'])) : null;
    $firstName = !empty(trim($_POST['firstName'])) ? ucwords(strtolower(trim($_POST['firstName']))) : null;
    $fullName = $familyName && $firstName ? trim("$familyName $firstName") : null;
    $birthDate = !empty(trim($_POST['birthDate'])) ? $_POST['birthDate'] : null;
    $address = !empty(trim($_POST['address'])) ? ucfirst(trim($_POST['address'])) : null;
    $locality = !empty(trim($_POST['locality'])) ? ucfirst(trim($_POST['locality'])) : null;
    $country = !empty(trim($_POST['country'])) ? strtoupper(trim($_POST['country'])) : null;
    $email = !empty(trim($_POST['email'])) ? filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) : null;
    $phone = !empty(trim($_POST['phone'])) ? trim($_POST['phone']) : null;
    $company = !empty(trim($_POST['company'])) ? strtoupper(trim($_POST['company'])) : null;
    $companyvat = !empty(trim($_POST['companyvat'])) ? strtoupper(trim($_POST['companyvat'])) : null;
    $iban = !empty(trim($_POST['iban'])) ? strtoupper(trim($_POST['iban'])) : null;
    $swift = !empty(trim($_POST['swift'])) ? strtoupper(trim($_POST['swift'])) : null;
    $bankName = !empty(trim($_POST['bankName'])) ? ucfirst(trim($_POST['bankName'])) : null;
    $interest = $_POST['interest'] ?? null;
    $referer = $_POST['referer'] ?? null;
    // $note = !empty(trim($_POST['note'])) ? trim($_POST['note']) : null;
    $regdate = date('Y-m-d');


    // Vérification si `ID` existe déjà
    if (!empty($_POST['id'])) {
        $clientId = trim($_POST['id']);
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM clients WHERE id = :id");
        $stmt->execute([':id' => $clientId]);
        if ($stmt->fetchColumn() > 0) {
            $errors['id'] = "Cet ID client existe déjà.";
        }
    }

    // Vérification si `docNumber` existe déjà
    if ($docNumber) {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM clients WHERE docNumber = :docNumber");
        $stmt->execute([':docNumber' => $docNumber]);
        if ($stmt->fetchColumn() > 0) {
            $errors['docNumber'] = "Le numéro de document existe déjà.";
        }
    }

    // Vérification si `fullName` existe déjà
    if ($fullName) {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM clients WHERE fullName = :fullName");
        $stmt->execute([':fullName' => $fullName]);
        if ($stmt->fetchColumn() > 0) {
            $errors['fullName'] = "Le nom complet est déjà existant dans nos enregistrements.";
        }
    }



    if (!empty($errors)) {
        // Si des erreurs sont détectées, le formulaire est affiché avec les erreurs, et le reste du traitement est ignoré
    } else {
        // Insertion du client dans la table clients
        $stmt = $pdo->prepare("
            INSERT INTO clients 
            (entity, docType, docNumber, docExp, fullName, familyName, firstName, birthDate, address, locality, country, email, phone, company, companyvat, interest, referer, regdate, iban, swift, bankName) 
            VALUES 
            (:entity, :docType, :docNumber, :docExp, :fullName, :familyName, :firstName, :birthDate, :address, :locality, :country, :email, :phone, :company, :companyvat, :interest, :referer, :regdate, :iban, :swift, :bankName)
        ");
        $stmt->execute([
            ':entity' => $entity,
            ':docType' => $docType,
            ':docNumber' => $docNumber,
            ':docExp' => $docExp,
            ':fullName' => $fullName,
            ':familyName' => $familyName,
            ':firstName' => $firstName,
            ':birthDate' => $birthDate,
            ':address' => $address,
            ':locality' => $locality,
            ':country' => $country,
            ':email' => $email,
            ':phone' => $phone,
            ':company' => $company,
            ':companyvat' => $companyvat,
            ':interest' => $interest,
            ':referer' => $referer,
            ':regdate' => $regdate,
            ':iban' => $iban,
            ':swift' => $swift,
            ':bankName' => $bankName,
        ]);

        // Récupération de l'ID du client inséré
        $clientId = $pdo->lastInsertId();

        // Insertion des notes dans la table `client_notes`
        // Insertion des notes dans la table `client_notes`
        if (!empty($_POST['notes'])) {
            $notes = json_decode($_POST['notes'], true); // Décoder le JSON des notes

            if (is_array($notes)) {
                foreach ($notes as $noteItem) {
                    // Vérifie si la clé 'text' existe dans le tableau
                    if (!empty($noteItem['text'])) {
                        $stmt = $pdo->prepare("
                    INSERT INTO client_notes (client_id, note) 
                    VALUES (:client_id, :note)
                ");
                        $stmt->execute([
                            ':client_id' => $clientId,
                            ':note' => $noteItem['text'], // Utiliser la clé 'text'
                        ]);
                    }
                }
            } else {
                // Ajouter une erreur si les notes ne sont pas un tableau valide
                $errors['notes'] = "Les données des notes sont invalides.";
            }
        }


        // Gestion de l'upload des documents (recto et verso)
        $allowedExtensions = ['jpg', 'jpeg', 'png'];
        $uploadDir = __DIR__ . '/uploads_documents/client/images/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true); // Crée le dossier avec les permissions nécessaires
        }

        $recto = $_FILES['document_recto'] ?? null;
        $verso = $_FILES['document_verso'] ?? null;
        $filePaths = [];

        foreach (['recto' => $recto, 'verso' => $verso] as $key => $file) {
            if ($file && $file['error'] === UPLOAD_ERR_OK) {
                $fileExt = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

                if (!in_array($fileExt, $allowedExtensions)) {
                    die("Seuls les fichiers JPG, JPEG et PNG sont autorisés pour le $key.");
                }

                // Générer un nom sécurisé
                $secureName = $clientId . '-' . hash('sha256', uniqid() . $file['name']) . '.' . $fileExt;

                // Redimensionner l'image
                $destinationPath = $uploadDir . $secureName;
                if (!resizeImage($file['tmp_name'], $destinationPath)) {
                    die("Erreur lors du redimensionnement de l'image $key.");
                }

                // Vérifiez si le fichier a bien été stocké
                if (!file_exists($destinationPath)) {
                    die("Le fichier $key n'a pas été correctement téléversé.");
                }

                $filePaths[$key] = $secureName; // Ajouter le nom du fichier sécurisé
            }
        }

        // Si des fichiers ont été téléversés, insérer les chemins dans la base de données
        if (!empty($filePaths)) {
            $stmt = $pdo->prepare("
                INSERT INTO client_documents (client_id, document_recto, document_verso) 
                VALUES (:client_id, :document_recto, :document_verso)
            ");
            $stmt->execute([
                ':client_id' => $clientId,
                ':document_recto' => $filePaths['recto'] ?? null,
                ':document_verso' => $filePaths['verso'] ?? null,
            ]);
        }

        $processed = true;

        // Ajouter un message flash à la session
        $_SESSION['flash_message'] = "Le client a été ajouté avec succès";

        // Redirection pour éviter une double soumission
        header("Location: " . BASE_URL . "/client/show/$clientId");
        exit;
    }
}

// Fonction pour redimensionner les images
function resizeImage($source, $destination, $maxWidth = 800, $maxHeight = 800)
{
    $imageInfo = getimagesize($source);
    if (!$imageInfo) {
        die("Impossible de lire les informations de l'image source.");
    }

    $width = $imageInfo[0];
    $height = $imageInfo[1];
    $mime = $imageInfo['mime'];

    // Calcul des nouvelles dimensions
    $scale = min($maxWidth / $width, $maxHeight / $height);
    $newWidth = ceil($width * $scale);
    $newHeight = ceil($height * $scale);

    // Charger l'image source
    switch ($mime) {
        case 'image/jpeg':
            $sourceImage = @imagecreatefromjpeg($source);
            break;
        case 'image/png':
            $sourceImage = @imagecreatefrompng($source);
            break;
        default:
            die("Format d'image non supporté. Type MIME : $mime");
    }

    if (!$sourceImage) {
        die("Erreur lors du chargement de l'image source.");
    }

    // Créer une nouvelle image redimensionnée
    $resizedImage = imagecreatetruecolor($newWidth, $newHeight);
    if (!$resizedImage) {
        die("Impossible de créer une nouvelle image redimensionnée.");
    }

    // Appliquer le redimensionnement
    $success = imagecopyresampled($resizedImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
    if (!$success) {
        die("Erreur lors du redimensionnement de l'image.");
    }

    // Sauvegarder l'image
    $saveSuccess = imagejpeg($resizedImage, $destination, 85); // Compression JPEG
    if (!$saveSuccess) {
        die("Impossible de sauvegarder l'image redimensionnée.");
    }

    // Libérer la mémoire
    imagedestroy($sourceImage);
    imagedestroy($resizedImage);

    return true;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/clients_add.css">
    <title>Ajouter un client</title>
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
        <h1>Ajouter un nouveau client</h1>
        <?php if (!empty($errors['id'])): ?>
            <span class="error"><?= htmlspecialchars($errors['id']) ?></span>
        <?php endif; ?>
        <form method="POST" enctype="multipart/form-data" class="form" id="clientForm" style="margin-top: 60px;"">
            <input type=" text" name="fake_field" style="display:none;" tabindex="-1">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
            <input type="hidden" id="notes-hidden" name="notes">

            <div class="form-group">
                <label for="entity">Entité *</label>
                <select id="entity" name="entity">
                    <option value="1">Metalcash - BE</option>
                    <option value="2">Metalcash - NL</option>
                </select>
            </div>

            <div class="notes-section">
                <table class="notes-table">
                    <thead>
                        <tr>
                            <th class="table-header">Date</th>
                            <th class="table-header">Note</th>
                            <th class="table-header"></th>
                        </tr>
                    </thead>
                    <tbody id="notes-list">
                        <!-- Les notes seront insérées ici par le script -->
                    </tbody>
                </table>
            </div>

            <!-- Affichage de l'erreur pour les notes -->
            <?php if (!empty($errors['notes'])): ?>
                <div class="error"><?= htmlspecialchars($errors['notes']) ?></div>
            <?php endif; ?>

            <div class="form-group notes-container">
                <label for="new-note">Ajouter une note</label>
                <input id="new-note" class="note-input" placeholder="Écrivez une nouvelle note..."></input>
                <button type="button" id="add-note-button" class="add-note-button">Enregistrer la note</button>
            </div>


            <h2>Informations sur le document d'identité</h2>
            <div class="form-group">
                <label for="docType">Type de document *</label>
                <select id="docType" name="docType">
                    <option value="1">Carte d'identité</option>
                    <option value="2">Passeport</option>
                    <option value="3">Permis</option>
                    <option value="4">Autre</option>
                </select>
            </div>
            <div class="form-row">
                <div class="form-group" style="margin-bottom: 0 !important;">
                    <label for="docNumber">Numéro de document *</label>
                    <input type="text" id="docNumber" name="docNumber" placeholder="exemple: 123-1234567-12" value="<?= htmlspecialchars($docNumber, ENT_QUOTES, 'UTF-8') ?>">
                    <?php if (!empty($errors['docNumber'])): ?>
                        <span class="error"><?= htmlspecialchars($errors['docNumber']) ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group" style="margin-bottom: 0 !important;">
                    <label for="docExp">Date d'expiration *</label>
                    <input type="date" id="docExp" name="docExp">
                </div>
            </div>

            <div class="form-group">
                <label for="document_recto">Téléverser document d'identité - Recto</label>
                <input type="file" id="document_recto" name="document_recto" accept="image/*">

                <label for="document_verso">Téléverser document d'identité - Verso</label>
                <input type="file" id="document_verso" name="document_verso" accept="image/*">

                <div id="previewBoth" class="preview-both">
                    <!-- Les images téléversées seront affichées ici -->
                </div>
            </div>

            <!-- Modal pour afficher l'image en grand -->
            <div id="imageModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="modalImage">
            </div>



            <h2>Informations générales</h2>
            <div class="form-row">
                <div class="form-group">
                    <label for="familyName">Nom *</label>
                    <input type="text" id="familyName" name="familyName" placeholder="exemple: Doe" value="<?= htmlspecialchars($familyName, ENT_QUOTES, 'UTF-8') ?>">
                    <?php if (!empty($errors['fullName'])): ?>
                        <span class="error"><?= htmlspecialchars($errors['fullName']) ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="firstName">Prénom *</label>
                    <input type="text" id="firstName" name="firstName" placeholder="exemple: John" value="<?= htmlspecialchars($firstName, ENT_QUOTES, 'UTF-8') ?>">
                    <?php if (!empty($errors['fullName'])): ?>
                        <span class="error"><?= htmlspecialchars($errors['fullName']) ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group">
                <label for="birthDate">Date de naissance</label>
                <input type="date" id="birthDate" name="birthDate">
            </div>
            <div class="form-group">
                <label for="address">Adresse *</label>
                <input type="text" id="address" name="address" placeholder="exemple: Avenue du marché 12" value="<?= htmlspecialchars($address, ENT_QUOTES, 'UTF-8') ?>">
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="locality">Localité *</label>
                    <input type="text" id="locality" name="locality" placeholder="exemple: 4000 Liège" value="<?= htmlspecialchars($locality, ENT_QUOTES, 'UTF-8') ?>">
                </div>
                <div class="form-group">
                    <label for="country">Pays *</label>
                    <input type="text" id="country" name="country" placeholder="exemple: Belgique" value="<?= htmlspecialchars($country, ENT_QUOTES, 'UTF-8') ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="exemple: johndoe@exemple.be" value="<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>">
                </div>
                <div class="form-group">
                    <label for="phone">Téléphone</label>
                    <input type="text" id="phone" name="phone" placeholder="exemple: +32 493 87 22 10" value="<?= htmlspecialchars($phone, ENT_QUOTES, 'UTF-8') ?>">
                </div>
            </div>

            <h2>Informations bancaires</h2>
            <div class="form-row">
                <div class="form-group">
                    <label for="iban">IBAN</label>
                    <input type="text" id="iban" placeholder="exemple: BE71096123456769" name="iban" value="<?= htmlspecialchars($iban, ENT_QUOTES, 'UTF-8') ?>">
                </div>
                <div class="form-group">
                    <label for="swift">SWIFT</label>
                    <input type="text" id="swift" name="swift" placeholder="exemple: KRED BE BB" value="<?= htmlspecialchars($swift, ENT_QUOTES, 'UTF-8') ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="bankName">Nom de la banque</label>
                <input type="text" id="bankName" name="bankName" placeholder="exemple: KBC Bank" value="<?= htmlspecialchars($bankName, ENT_QUOTES, 'UTF-8') ?>">
            </div>



            <div class="form-row">
                <div class="form-group">
                    <label for="company">Société</label>
                    <input type="text" id="company" name="company" placeholder="exemple: Metalcash SPRL" value="<?= htmlspecialchars($company, ENT_QUOTES, 'UTF-8') ?>">
                </div>
                <div class="form-group">
                    <label for="companyvat">Numéro de TVA</label>
                    <input type="text" id="companyvat" name="companyvat" placeholder="exemple: BE0123456789" value="<?= htmlspecialchars($companyvat, ENT_QUOTES, 'UTF-8') ?>">
                </div>
            </div>

            <h2>Informations complémentaires</h2>
            <div class="form-group">
                <label for="interest">Intérêt</label>
                <select id="interest" name="interest">
                    <option value="1">Etain</option>
                    <option value="2">Métal argenté</option>
                    <option value="3">D3E</option>
                    <option value="4">Catalyseurs</option>
                    <option value="10">Tout</option>
                </select>
            </div>
            <div class="form-group">
                <label for="referer">Référent</label>
                <select id="referer" name="referer">
                    <option value="1">Recherche Internet</option>
                    <option value="2">Recommendation d'un ami</option>
                    <option value="3">Déjà client</option>
                    <option value="4">Autre</option>
                </select>
            </div>
            <button type="submit" name="add_client" class="submit-button">Ajouter le client</button>
        </form>
        <div id="globalError">Merci de corriger les erreurs avant de continuer.</div>
    </div>

    <script>
        // Variables PHP accessibles en JavaScript
        const clientId = <?= isset($clientId) ? json_encode($clientId) : 'null' ?>;
        const csrfToken = '<?= $_SESSION['csrf_token'] ?? '' ?>';
    </script>


    <script src="<?= BASE_URL ?>/js/formValidationAdd.js" defer></script>
    <script src="<?= BASE_URL ?>/js/animationInputsAdd.js" defer></script>
    <script src="<?= BASE_URL ?>/js/addClientNote.js" defer></script>
    <script src="<?= BASE_URL ?>/js/documentUploadShow.js" defer></script>
    <script src="<?= BASE_URL ?>/js/openIbanApi.js" defer></script>
    <script src="<?= BASE_URL ?>/js/GooglePlaceAPI.js" defer></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSabS4IR4na718B5zm0NB0sPdgg3Da-7E&libraries=places&callback=initAutocomplete" defer></script>
</body>

</html>