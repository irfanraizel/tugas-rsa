<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Transaksi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Riwayat Transaksi</h2>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>No Referensi</th>
                        <th>No Rekening</th>
                        <th>Nama User</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Alamat</th>
                        <th>Metode</th>
                        <th>Tanggal Transaksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Include koneksi dan fungsi dekripsi
                    include("koneksi.php");
                    include("function.php");

                    // Query untuk mengambil data transaksi
                    $sql = "SELECT no_ref, no_rekening, nama_user, email, telp, nama_barang, harga, alamat, metode, created_at FROM transaksi";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $no = 1; // Nomor urut
                        while ($row = $result->fetch_assoc()) {
                            // Dekripsi data
                            $no_rekening = decrypt(json_decode($row['no_rekening']), $private_key);
                            $nama_user = decrypt(json_decode($row['nama_user']), $private_key);
                            $email = decrypt(json_decode($row['email']), $private_key);
                            $telp = decrypt(json_decode($row['telp']), $private_key);
                            $nama_barang = decrypt(json_decode($row['nama_barang']), $private_key);
                            $alamat = decrypt(json_decode($row['alamat']), $private_key);

                            echo "<tr>
                                <td>$no</td>
                                <td>{$row['no_ref']}</td>
                                <td>$no_rekening</td>
                                <td>$nama_user</td>
                                <td>$email</td>
                                <td>$telp</td>
                                <td>$nama_barang</td>
                                <td>{$row['harga']}</td>
                                <td>$alamat</td>
                                <td>{$row['metode']}</td>
                                <td>{$row['created_at']}</td>
                            </tr>";
                            $no++;
                        }
                    } else {
                        echo "<tr><td colspan='11' class='text-center'>Tidak ada data transaksi</td></tr>";
                    }

                    // Tutup koneksi
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>