<?php
// config/db.php
declare(strict_types=1);

$DB_HOST = '127.0.0.1';
$DB_PORT = '5432';
$DB_NAME = 'db_toko_retail';
$DB_USER = 'postgres';
$DB_PASS = 'Nafisachiqui3006_';

$dsn = "pgsql:host={$DB_HOST};port={$DB_PORT};dbname={$DB_NAME};";

try {
    $pdo = new PDO($dsn, $DB_USER, $DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // exception on error
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false, // use native prepares
    ]);
} catch (PDOException $e) {
    // handle gracefully — jangan tampilkan full error di production
    error_log("DB connection failed: " . $e->getMessage());
    http_response_code(500);
    die('Database connection failed.'); // friendly message
}
