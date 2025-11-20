<?php
require_once '../../../../config/db.php';

header('Content-Type: application/json');

try {
    $stmt = $pdo->query("SELECT id_category, name FROM category ORDER BY name ASC");
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode([
        'success' => true,
        'categories' => $categories
    ]);
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}