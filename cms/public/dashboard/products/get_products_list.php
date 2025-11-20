<?php
require_once '../../../../config/db.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

try {
    $stmt = $pdo->query("
        SELECT 
            p.id_product,
            p.name,
            p.sku,
            p.stock,
            p.price,
            c.name as category_name,
            s.name as supplier_name
        FROM product p
        LEFT JOIN category c ON p.id_category = c.id_category
        LEFT JOIN supplier s ON p.id_supplier = s.id_supplier
        ORDER BY p.id_product DESC
    ");
    
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode([
        'success' => true,
        'products' => $products
    ]);
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}