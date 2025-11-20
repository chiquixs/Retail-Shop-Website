<?php
session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_product = (int)($_POST['id_product'] ?? 0);
    $name = trim($_POST['name'] ?? '');
    $price = (float)($_POST['price'] ?? 0);
    $qty = (int)($_POST['qty'] ?? 1);
    
    if ($id_product <= 0 || empty($name) || $price <= 0) {
        echo json_encode(['success' => false, 'message' => 'Invalid product data']);
        exit;
    }
    
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    
    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id_product'] == $id_product) {
            $item['qty'] += $qty;
            $found = true;
            break;
        }
    }
    
    if (!$found) {
        $_SESSION['cart'][] = [
            'id_product' => $id_product,
            'name' => $name,
            'price' => $price,
            'qty' => $qty
        ];
    }
    
    $cart_count = array_sum(array_column($_SESSION['cart'], 'qty'));
    
    echo json_encode([
        'success' => true,
        'cart_count' => $cart_count
    ]);
    
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}