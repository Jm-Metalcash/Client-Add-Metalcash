<?php
require '../config.php';

session_start();

// Vérification du token CSRF
$headers = getallheaders();
if (empty($_SESSION['csrf_token']) || empty($headers['X-CSRF-Token']) || $_SESSION['csrf_token'] !== $headers['X-CSRF-Token']) {
    http_response_code(403);
    echo json_encode(['success' => false, 'error' => 'Token CSRF invalide.']);
    exit;
}

// Vérification de la méthode de requête
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['success' => false, 'error' => 'Méthode non autorisée.']);
    exit;
}

// Récupération des données JSON
$input = json_decode(file_get_contents('php://input'), true);
$clientId = $input['client_id'] ?? null;
$position = $input['position'] ?? null;

if (!$clientId || !$position || !in_array($position, ['recto', 'verso'])) {
    http_response_code(400); // Bad Request
    echo json_encode(['success' => false, 'error' => 'Données invalides.']);
    exit;
}


// Vérification que le client existe
$stmt = $pdo->prepare("SELECT * FROM clients WHERE ID = :id");
$stmt->execute([':id' => $clientId]);
$client = $stmt->fetch();

if (!$client) {
    http_response_code(404); // Not Found
    echo json_encode(['success' => false, 'error' => 'Client introuvable.']);
    exit;
}

// Récupération du nom du fichier à supprimer
$column = $position === 'recto' ? 'document_recto' : 'document_verso';
$stmt = $pdo->prepare("SELECT $column FROM client_documents WHERE client_id = :client_id");
$stmt->execute([':client_id' => $clientId]);
$fileName = $stmt->fetchColumn();

if (!$fileName) {
    http_response_code(404);
    echo json_encode(['success' => false, 'error' => "Veuillez sauvegarder les modifications avant de supprimer l'image."]);
    exit;
}

// Suppression du fichier du système de fichiers
$uploadDir = dirname(__DIR__, 2) . '/uploads_documents/client/images/';
$filePath = $uploadDir . $fileName;

if (file_exists($filePath)) {
    if (!unlink($filePath)) {
        http_response_code(500);
        echo json_encode(['success' => false, 'error' => 'Impossible de supprimer le fichier sur le serveur.']);
        exit;
    }
}

// Mise à jour de la base de données
$stmt = $pdo->prepare("UPDATE client_documents SET $column = NULL WHERE client_id = :client_id");
$stmt->execute([':client_id' => $clientId]);

echo json_encode(['success' => true]);
exit;
?>
