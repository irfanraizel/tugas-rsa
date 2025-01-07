<?php
// Include koneksi dan fungsi dekripsi
include("koneksi.php"); // File koneksi database
include("function.php"); // Pastikan file ini memuat fungsi decrypt dan kunci privat

// Query untuk mengambil data dari tabel `transaksi`
$sql = "SELECT no_ref, no_rekening, nama_user, email, telp, nama_barang, harga, alamat, metode, created_at FROM transaksi";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output setiap baris
    while ($row = $result->fetch_assoc()) {
        // Dekripsi data
        $no_ref = $row['no_ref'];
        $no_rekening = decrypt(json_decode($row['no_rekening']), $private_key); // Decrypt account number
        $nama_user = decrypt(json_decode($row['nama_user']), $private_key); // Decrypt name
        $email = decrypt(json_decode($row['email']), $private_key); // Decrypt email
        $telp = decrypt(json_decode($row['telp']), $private_key); // Decrypt telp
        $nama_barang = decrypt(json_decode($row['nama_barang']), $private_key); // Decrypt nama barang
        $harga = $row['harga'];
        $alamat = decrypt(json_decode($row['alamat']), $private_key); // Decrypt alamat
        $metode = $row['metode'];
        $created_at = $row['created_at'];

        // Tampilkan data yang sudah didekripsi
        echo "<h3>Transaksi</h3>";
        echo "No Referensi: $no_ref<br>";
        echo "No Rekening: $no_rekening<br>";
        echo "Nama User: $nama_user<br>";
        echo "Email: $email<br>";
        echo "Telepon: $telp<br>";
        echo "Nama Barang: $nama_barang<br>";
        echo "Harga: $harga<br>";
        echo "Alamat: $alamat<br>";
        echo "Metode: $metode<br>";
        echo "Waktu Transaksi: $created_at<br><br>";
    }
} else {
    echo "Tidak ada data dalam tabel transaksi.";
}

// Tutup koneksi
$conn->close();
