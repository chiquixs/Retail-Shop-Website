<?php
require_once '../../../../config/db.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $description = trim($_POST['description'] ?? '');

    if (empty($name)) {
        echo json_encode(['success' => false, 'message' => 'Name is required']);
        exit;
    }

    try {
        // PERBAIKAN: Gunakan RETURNING id_category
        $stmt = $pdo->prepare("INSERT INTO category (name, description) VALUES (:name, :description) RETURNING id_category, name, description");
        $stmt->execute([
            ':name' => $name,
            ':description' => $description
        ]);
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        echo json_encode([
            'success' => true,
            'category' => [
                'id' => $result['id_category'], // Ambil id_category
                'name' => $result['name'],
                'description' => $result['description']
            ]
        ]);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
exit;