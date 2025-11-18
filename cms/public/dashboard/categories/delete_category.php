<?php
require_once '../../../../config/db.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = trim($_POST['id'] ?? '');

    if (empty($id)) {
        echo json_encode(['success' => false, 'message' => 'ID is required']);
        exit;
    }

    try {
        // Cek apakah kategori ada
        $checkStmt = $pdo->prepare("SELECT name FROM category WHERE id_category = :id");
        $checkStmt->execute([':id' => $id]);
        
        if ($checkStmt->rowCount() === 0) {
            echo json_encode(['success' => false, 'message' => 'Category not found']);
            exit;
        }

        // Delete kategori
        $stmt = $pdo->prepare("DELETE FROM category WHERE id_category = :id");
        $result = $stmt->execute([':id' => $id]);

        if ($result) {
            echo json_encode([
                'success' => true,
                'message' => 'Category deleted successfully',
                'id' => $id
            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to delete category']);
        }
    } catch (PDOException $e) {
        // Handle foreign key constraint atau error lainnya
        if ($e->getCode() == '23503') {
            echo json_encode(['success' => false, 'message' => 'Cannot delete category. It is being used by products.']);
        } else {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
exit;