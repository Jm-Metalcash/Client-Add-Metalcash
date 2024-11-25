<?php
session_start();

// Initialisation des variables pour sécurité htmlspecialchars
$entity = $docType = $docNumber = $docExp = $familyName = $firstName = $birthDate = $address = $locality = $country = $email = $phone = $company = $companyvat = $interest = $referer = $iban = $swift = $bankName = '';

//honeypot détection de bots
if (!empty($_POST['fake_field'])) {
    die("Spam détecté.");
}

// Génération d'un token CSRF pour sécuriser le formulaire
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Connexion sécurisée à la base de données avec PDO
try {
    $pdo = new PDO("mysql:host=localhost;dbname=metalcash_clients_add", "root", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

$processed = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_client'])) {
    // Vérification CSRF
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'] ?? '')) {
        die("Erreur CSRF : soumission non autorisée.");
    }

    // Récupération des champs
    $entity = $_POST['entity'];
    $docType = $_POST['docType'];
    $docNumber = strtoupper(trim($_POST['docNumber']));
    $docExp = $_POST['docExp'] ?? null;
    $familyName = strtoupper(trim($_POST['familyName']));
    $firstName = ucwords(strtolower(trim($_POST['firstName'])));
    $fullName = trim("$familyName $firstName");
    $birthDate = $_POST['birthDate'] ?? null;
    $address = ucfirst(trim($_POST['address']));
    $locality = ucfirst(trim($_POST['locality']));
    $country = strtoupper(trim($_POST['country']));
    $email = filter_var($_POST['email'] ?? null, FILTER_VALIDATE_EMAIL);
    $phone = trim($_POST['phone'] ?? null);
    $company = strtoupper(trim($_POST['company'] ?? null));
    $companyvat = strtoupper(trim($_POST['companyvat'] ?? null));
    $iban = strtoupper(trim($_POST['iban'] ?? ''));
    $swift = strtoupper(trim($_POST['swift'] ?? ''));
    $bankName = ucfirst(trim($_POST['bankName'] ?? ''));
    $interest = $_POST['interest'];
    $referer = $_POST['referer'];
    $regdate = date('Y-m-d');

    // Insertion dans la base de données
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

    $processed = true;

    // Ajouter un message flash à la session
    $_SESSION['flash_message'] = "Le client a été ajouté avec succès.";

    // Redirection pour éviter une double soumission
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/clients_add.css">
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
        <form method="POST" class="form" id="clientForm">
            <input type="text" name="fake_field" style="display:none;" tabindex="-1">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">

            <div class="form-group">
                <label for="entity">Entité *</label>
                <select id="entity" name="entity">
                    <option value="1">Metalcash - BE</option>
                    <option value="2">Metalcash - NL</option>
                </select>
            </div>
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
                <div class="form-group">
                    <label for="docNumber">Numéro de document *</label>
                    <input type="text" id="docNumber" name="docNumber" value="<?= htmlspecialchars($docNumber, ENT_QUOTES, 'UTF-8') ?>">
                </div>
                <div class="form-group">
                    <label for="docExp">Date d'expiration *</label>
                    <input type="date" id="docExp" name="docExp">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="familyName">Nom *</label>
                    <input type="text" id="familyName" name="familyName" value="<?= htmlspecialchars($familyName, ENT_QUOTES, 'UTF-8') ?>">
                </div>
                <div class="form-group">
                    <label for="firstName">Prénom *</label>
                    <input type="text" id="firstName" name="firstName" value="<?= htmlspecialchars($firstName, ENT_QUOTES, 'UTF-8') ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="birthDate">Date de naissance</label>
                <input type="date" id="birthDate" name="birthDate">
            </div>
            <div class="form-group">
                <label for="address">Adresse *</label>
                <input type="text" id="address" name="address" value="<?= htmlspecialchars($address, ENT_QUOTES, 'UTF-8') ?>">
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="locality">Localité *</label>
                    <input type="text" id="locality" name="locality" value="<?= htmlspecialchars($locality, ENT_QUOTES, 'UTF-8') ?>">
                </div>
                <div class="form-group">
                    <label for="country">Pays *</label>
                    <input type="text" id="country" name="country" value="<?= htmlspecialchars($country, ENT_QUOTES, 'UTF-8') ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" value="<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>">
                </div>
                <div class="form-group">
                    <label for="phone">Téléphone</label>
                    <input type="text" id="phone" name="phone" value="<?= htmlspecialchars($phone, ENT_QUOTES, 'UTF-8') ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="iban">IBAN</label>
                    <input type="text" id="iban" name="iban" value="<?= htmlspecialchars($iban, ENT_QUOTES, 'UTF-8') ?>" maxlength="34">
                </div>
                <div class="form-group">
                    <label for="swift">SWIFT</label>
                    <input type="text" id="swift" name="swift" value="<?= htmlspecialchars($swift, ENT_QUOTES, 'UTF-8') ?>" maxlength="11">
                </div>
            </div>
            <div class="form-group">
                <label for="bankName">Nom de la banque</label>
                <input type="text" id="bankName" name="bankName" value="<?= htmlspecialchars($bankName, ENT_QUOTES, 'UTF-8') ?>">
            </div>



            <div class="form-row">
                <div class="form-group">
                    <label for="company">Société</label>
                    <input type="text" id="company" name="company" value="<?= htmlspecialchars($company, ENT_QUOTES, 'UTF-8') ?>">
                </div>
                <div class="form-group">
                    <label for="companyvat">Numéro de TVA</label>
                    <input type="text" id="companyvat" name="companyvat" value="<?= htmlspecialchars($companyvat, ENT_QUOTES, 'UTF-8') ?>">
                </div>
            </div>
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

    <script src="./js/formValidationAdd.js" defer></script>
    <script src="./js/animationInputsAdd.js" defer></script>
</body>

</html>