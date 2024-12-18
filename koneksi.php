<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "tugas_rsa";

$conn = new mysqli($host, $user, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
