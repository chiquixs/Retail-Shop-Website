<?php
session_start();

// Username & password yang diizinkan
$valid_username = "admin";
$valid_password = "adminadmin";

// Ambil data dari form
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Cek login
if ($username === $valid_username && $password === $valid_password) {

    // simpan session admin
    $_SESSION['admin_logged_in'] = true;

    // redirect ke halaman admin/cms
    header("Location: ../dashboard/index.html");
    exit();

} else {
    // Jika salah
    echo "<script>
            alert('Username atau password salah!');
            window.location.href='login.html';
          </script>";
}
