<?php
require_once '../../../../config/db.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = trim($_POST['id'] ?? '');
    $name = trim($_POST['name'] ?? '');
    $description = trim($_POST['description'] ?? '');

    // Debug: Log data yang diterima
    error_log("Received data - ID: $id, Name: $name, Description: $description");

    if (empty($id)) {
        echo json_encode(['success' => false, 'message' => 'ID is required']);
        exit;
    }

    if (empty($name)) {
        echo json_encode(['success' => false, 'message' => 'Name is required']);
        exit;
    }

    try {
        // PERBAIKAN: Gunakan id_category di WHERE clause
        $stmt = $pdo->prepare("UPDATE category SET name = :name, description = :description WHERE id_category = :id");
        $result = $stmt->execute([
            ':id' => $id,
            ':name' => $name,
            ':description' => $description
        ]);

        if ($result && $stmt->rowCount() > 0) {
            echo json_encode([
                'success' => true,
                'category' => [
                    'id' => $id,
                    'name' => $name,
                    'description' => $description
                ]
            ]);
        } else {
            // Cek apakah kategori dengan ID tersebut ada
            $checkStmt = $pdo->prepare("SELECT * FROM category WHERE id_category = :id");
            $checkStmt->execute([':id' => $id]);
            
            if ($checkStmt->rowCount() === 0) {
                echo json_encode(['success' => false, 'message' => 'Category not found with ID: ' . $id]);
            } else {
                // Data tidak berubah (update dengan nilai yang sama)
                echo json_encode([
                    'success' => true,
                    'category' => [
                        'id' => $id,
                        'name' => $name,
                        'description' => $description
                    ]
                ]);
            }
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
exit;