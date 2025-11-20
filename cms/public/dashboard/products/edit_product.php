<?php
// 1. Matikan warning supaya JSON tidak rusak
error_reporting(0);
ini_set('display_errors', 0);

require_once '../../../../config/db.php'; // Pastikan path ini benar

header('Content-Type: application/json');

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Invalid request method');
    }

    // 2. Ambil Data dari Form
    $id = $_POST['id_product'] ?? null;
    $name = trim($_POST['name'] ?? '');
    $sku = trim($_POST['sku'] ?? '');
    $id_category = (int)($_POST['id_category'] ?? 0);
    $id_supplier = (int)($_POST['id_supplier'] ?? 0);
    $stock = (int)($_POST['stock'] ?? 0);
    $price = (float)($_POST['price'] ?? 0);

    // 3. Validasi
    if (empty($id)) {
        throw new Exception('ID Produk tidak ditemukan!');
    }
    if (empty($name) || empty($sku) || $id_category <= 0 || $id_supplier <= 0 || $price <= 0) {
        throw new Exception('Semua field wajib diisi dengan benar!');
    }

    // 4. Cek apakah user upload gambar baru?
    $imageClause = "";
    $params = [
        ':id_category' => $id_category,
        ':id_supplier' => $id_supplier,
        ':name' => $name,
        ':sku' => $sku,
        ':stock' => $stock,
        ':price' => $price,
        ':id_product' => $id
    ];

    // Logika Upload Gambar (Optional)
    if (!empty($_FILES['image']['name']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../../../../public/assets/images/products/';
        
        // Buat folder kalau belum ada
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

        $fileExtension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];

        if (!in_array($fileExtension, $allowedExtensions)) {
            throw new Exception('Format file salah (Hanya JPG, PNG, WEBP).');
        }
        
        if ($_FILES['image']['size'] > 2 * 1024 * 1024) {
            throw new Exception('Ukuran file terlalu besar (Max 2MB).');
        }

        // Nama file unik
        $imageName = preg_replace('/[^A-Za-z0-9\-]/', '', $sku) . '_' . time() . '.' . $fileExtension;
        $uploadPath = $uploadDir . $imageName;

        if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
            throw new Exception('Gagal upload gambar baru.');
        }

        // Tambahkan ke query update
        $imageClause = ", image = :image";
        $params[':image'] = $imageName;
    }

    // 5. Eksekusi Query UPDATE
    $sql = "UPDATE product 
            SET id_category = :id_category, 
                id_supplier = :id_supplier, 
                name = :name, 
                sku = :sku, 
                stock = :stock, 
                price = :price
                $imageClause
            WHERE id_product = :id_product";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    echo json_encode([
        'success' => true,
        'message' => 'Produk berhasil diupdate!'
    ]);

} catch (Exception $e) {
    // Hapus gambar baru jika database gagal update (Clean up)
    if (isset($uploadPath) && file_exists($uploadPath)) {
        unlink($uploadPath);
    }

    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
?>