<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "sisfobarang";

// Membuat koneksi menggunakan MySQLi
$conn = new mysqli($servername, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Lakukan operasi database lainnya di sini

// Tutup koneksi database setelah selesai penggunaan
$conn->close();
?>
