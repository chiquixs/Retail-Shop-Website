<?php
require_once '../../../../config/db.php';

header('Content-Type: application/json');

try {
    $stmt = $pdo->query("SELECT id_supplier, name FROM supplier ORDER BY name ASC");
    $suppliers = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode([
        'success' => true,
        'suppliers' => $suppliers
    ]);
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}