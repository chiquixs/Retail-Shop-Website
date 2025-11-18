<?php
require_once '../../../../config/db.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = trim($_POST['id'] ?? '');
    $name = trim($_POST['name'] ?? '');
    $description = trim($_POST['description'] ?? '');

    if (empty($id) || empty($name)) {
        echo json_encode(['success' => false, 'message' => 'ID and Name are required']);
        exit;
    }

    try {
        $stmt = $pdo->prepare("UPDATE category SET name = :name, description = :description WHERE id_category = :id");
        $result = $stmt->execute([
            ':id' => $id,
            ':name' => $name,
            ':description' => $description
        ]);

        if ($result) {
            echo json_encode([
                'success' => true,
                'category' => [
                    // 'id' => $id,
                    'name' => $name,
                    'description' => $description
                ]
            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update category']);
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
exit;