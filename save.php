<?php
// Informasi koneksi ke database
$servername = "localhost"; // Ganti dengan nama server Anda
$username = "root";        // Ganti dengan username database Anda
$password = "";            // Ganti dengan password database Anda
$dbname = "tugas_rsa";    // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari formulir
if (isset($_POST['submit'])) {
    $ref = $_POST['no_ref'];
    $rek = $_POST['no_rek'];
    $nama = $_POST['nama'];
    $nominal = $_POST['nominal'];

    // Query untuk menyisipkan data ke tabel
    $sql = "INSERT INTO transaksi (no_ref, no_rekening, nama, nominal) VALUES ('$ref', $rek, '$nama', $nominal)";

    //Eksekusi query
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil disimpan.')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Tutup koneksi
$conn->close();
