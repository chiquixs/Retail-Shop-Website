<?php
require_once 'config/db.php';

header('Content-Type: application/json');

try {
    $stmt = $pdo->query("
        SELECT 
            p.id_product,
            p.name,
            p.price,
            p.stock,
            p.image,
            c.name as category_name
        FROM product p
        LEFT JOIN category c ON p.id_category = c.id_category
        WHERE p.stock > 0
        ORDER BY p.name ASC
    ");
    
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode([
        'success' => true,
        'products' => $products,
        'count' => count($products)
    ]);
    
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}