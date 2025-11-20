<?php
error_reporting(0);
ini_set('display_errors', 0);
require_once '../../../../config/db.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $sku = trim($_POST['sku'] ?? '');
    $id_category = (int)($_POST['id_category'] ?? 0);
    $id_supplier = (int)($_POST['id_supplier'] ?? 0);
    $stock = (int)($_POST['stock'] ?? 0);
    $price = (float)($_POST['price'] ?? 0);
    
    // Validation
    if (empty($name) || empty($sku) || $id_category <= 0 || $id_supplier <= 0 || $price <= 0) {
        echo json_encode(['success' => false, 'message' => 'All required fields must be filled']);
        exit;
    }
    
    // Handle image upload
    $imageName = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../../../../public/assets/images/products/';
        
        // Create directory if not exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        
        $fileExtension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowedExtensions = ['jpg', 'jpeg', 'png'];
        
        if (!in_array($fileExtension, $allowedExtensions)) {
            echo json_encode(['success' => false, 'message' => 'Invalid file type. Only JPG, JPEG, and PNG allowed']);
            exit;
        }
        
        // Check file size (max 2MB)
        if ($_FILES['image']['size'] > 2 * 1024 * 1024) {
            echo json_encode(['success' => false, 'message' => 'File too large. Maximum 2MB']);
            exit;
        }
        
        // Generate unique filename
        $imageName = $sku . '_' . time() . '.' . $fileExtension;
        $uploadPath = $uploadDir . $imageName;
        
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
            echo json_encode(['success' => false, 'message' => 'Failed to upload image']);
            exit;
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Product image is required']);
        exit;
    }
    
    try {
        // Insert product
        $stmt = $pdo->prepare("
            INSERT INTO product (id_category, id_supplier, name, sku, stock, price, image) 
            VALUES (:id_category, :id_supplier, :name, :sku, :stock, :price, :image)
            RETURNING id_product
        ");
        
        $stmt->execute([
            ':id_category' => $id_category,
            ':id_supplier' => $id_supplier,
            ':name' => $name,
            ':sku' => $sku,
            ':stock' => $stock,
            ':price' => $price,
            ':image' => $imageName
        ]);
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        echo json_encode([
            'success' => true,
            'message' => 'Product added successfully',
            'product_id' => $result['id_product']
        ]);
        
    } catch (PDOException $e) {
        // Delete uploaded image if database insert fails
        if ($imageName && file_exists($uploadPath)) {
            unlink($uploadPath);
        }
        
        echo json_encode([
            'success' => false,
            'message' => $e->getMessage()
        ]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}