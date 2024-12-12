<?php

include("function.php"); // Asumsikan function.php memiliki fungsi decrypt()

// Informasi koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tugas_rsa";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query untuk mengambil data
$sql = "SELECT * FROM transaksi";
$result = $conn->query($sql);

// Cek apakah ada data
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Ambil data dari kolom
        $ref = $row['no_ref'];
        $rek_encrypted = json_decode($row['no_rekening'], true); // Decode JSON ke array/string
        $nama_encrypted = json_decode($row['nama'], true);
        $nominal = $row['nominal'];

        // Dekripsi data
        $rek_decrypted = decrypt($rek_encrypted, $private_key); // Dekripsi no_rekening
        $nama_decrypted = decrypt($nama_encrypted, $private_key); // Dekripsi nama

        // Tampilkan data
        echo "No Ref: $ref<br>";
        echo "No Rekening: $rek_decrypted<br>";
        echo "Nama: $nama_decrypted<br>";
        echo "Nominal: $nominal<br><hr>";
    }
} else {
    echo "Tidak ada data.";
}

// Tutup koneksi
$conn->close();

?>
