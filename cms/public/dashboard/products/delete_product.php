<?php
// delete_product.php
error_reporting(0);
ini_set('display_errors', 0);

require_once '../../../../config/db.php'; // Sesuaikan path

header('Content-Type: application/json');

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Invalid request method');
    }

    $id = $_POST['id_product'] ?? null;

    if (empty($id)) {
        throw new Exception('ID Produk tidak ditemukan!');
    }

    // 1. Ambil nama file gambar dulu sebelum dihapus datanya
    $stmt = $pdo->prepare("SELECT image FROM product WHERE id_product = ?");
    $stmt->execute([$id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        throw new Exception('Produk sudah tidak ada.');
    }

    // 2. Hapus Gambar Fisik (jika ada)
    $uploadDir = '../../../../public/assets/images/products/';
    if (!empty($product['image'])) {
        $filePath = $uploadDir . $product['image'];
        if (file_exists($filePath)) {
            unlink($filePath); // Hapus file
        }
    }

    // 3. Hapus Data dari Database
    $stmtDelete = $pdo->prepare("DELETE FROM product WHERE id_product = ?");
    $stmtDelete->execute([$id]);

    echo json_encode([
        'success' => true,
        'message' => 'Produk berhasil dihapus!'
    ]);

} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
?>