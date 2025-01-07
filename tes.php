<?php

// Include koneksi dan fungsi enkripsi
include("koneksi.php"); // Pastikan koneksi database sudah benar
include("function.php"); // Pastikan file ini memuat fungsi encrypt dan kunci publik

// Proses data dari form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $ref = $_POST['no_ref'];
    $rek = json_encode(encrypt($_POST['no_rek'], $public_key)); // Encrypt account number
    $nama = json_encode(encrypt($_POST['name'], $public_key)); // Encrypt name
    $email = json_encode(encrypt($_POST['email'], $public_key)); // Encrypt email
    $telp = json_encode(encrypt($_POST['telp'], $public_key)); // Encrypt telp
    $nama_barang = json_encode(encrypt($_POST['nama_barang'], $public_key)); // Encrypt nama barang
    $harga = $_POST['harga'];
    $alamat = json_encode(encrypt($_POST['alamat'], $public_key)); // Encrypt alamat
    $metode = $_POST['metode'];

    // SQL Insert ke database
    $sql = "INSERT INTO transaksi (no_ref, no_rekening, nama_user, email, telp, nama_barang, harga, alamat, metode) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Binding parameter
    $stmt->bind_param(
        "ssssssiss", // Tipe data (s = string, i = integer)
        $ref,
        $rek,
        $nama,
        $email,
        $telp,
        $nama_barang,
        $harga,
        $alamat,
        $metode
    );

    // Eksekusi query
    if ($stmt->execute()) {
        echo "<script>
                alert('Data berhasil disimpan.');
                window.location.href='index.php';
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Tutup statement
    $stmt->close();
}

// Tutup koneksi
$conn->close();
