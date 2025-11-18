<?php
require_once '../../../../config/db.php';

// PENTING: Jangan ada output apapun sebelum header ini!
header('Content-Type: application/json');

// Pastikan tidak ada whitespace atau output sebelum PHP tag

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $description = trim($_POST['description'] ?? '');

    if (empty($name)) {
        echo json_encode(['success' => false, 'message' => 'Name is required']);
        exit;
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO category (name, description) VALUES (:name, :description)");
        $stmt->execute([
            ':name' => $name,
            ':description' => $description
        ]);

        echo json_encode([
            'success' => true,
            'category' => [
                // 'id' => $pdo->lastInsertId(),
                'name' => $name,
                'description' => $description
            ]
        ]);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
exit; // Pastikan tidak ada output lagi setelah ini