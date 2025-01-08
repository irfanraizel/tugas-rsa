<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Toko Bangun Jaya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .sidebar {
            height: 100vh;
            background-color: #343a40;
            color: white;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #495057;
            color: #fff;
        }

        .active-menu {
            background-color: #495057;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block sidebar">
                <div class="pt-3">
                    <h3 class="text-center">Toko Bangun Jaya</h3>
                    <ul class="nav flex-column mt-4">
                        <li class="nav-item">
                            <a class="nav-link active-menu" href="#" onclick="showSection('manageBarang')">Manage Barang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="showSection('transaksi')">Transaksi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="showSection('encrypted_transaksi')">Transaksi Terenkripsi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="showSection('manageUser')">Manage User</a>
                        </li>
                        <li class="nav-item mt-4">
                            <a class="nav-link text-danger" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div id="manageBarang" class="content-section">
                    <h2 class="mt-4">Manage Barang</h2>
                    <button type="button" class="btn btn-primary my-2">
                        <a href="add.php" class="text-light text-decoration-none">Tambah Barang</a>
                    </button>
                    <!-- Tambahkan konten manajemen barang -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="bg-primary-subtle">No</th>
                                <th class="bg-primary-subtle">Nama Barang</th>
                                <th class="bg-primary-subtle">Deskripsi</th>
                                <th class="bg-primary-subtle">Harga</th>
                                <th class="bg-primary-subtle">Stok</th>
                                <th class="bg-primary-subtle">Gambar</th>
                                <th class="bg-primary-subtle">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Include koneksi dan fungsi dekripsi
                            include("koneksi.php");
                            include("function.php");

                            // Query untuk mengambil data transaksi
                            $sql = "SELECT id, nama_barang, deskripsi, harga, stok, gambar FROM barang";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $no = 1; // Nomor urut
                                while ($row = $result->fetch_assoc()) {
                                    $id = $row['id'];
                                    $nama_barang = $row['nama_barang'];
                                    $deskripsi = $row['deskripsi'];
                                    $harga = $row['harga'];
                                    $stok = $row['stok'];
                                    $gambar = $row['gambar'];

                                    echo "<tr>
                                    <td>$no</td>
                                    <td>$nama_barang</td>
                                    <td>$deskripsi</td>
                                    <td>$harga</td>
                                    <td>$stok</td>
                                    <td>
                                        <img src='img/$gambar' alt='' class='rounded img-thumbnail' style='width:100px'>
                                    </td>
                                    <td>
                                        <button type='button' class='btn btn-success mb-2' style='width:70px'>Edit</button>
                                        <button type='button' class='btn btn-danger' mt-2 style='width:70px'>Delete</button>
                                    </td>
                                </tr>";
                                    $no++;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div id="transaksi" class="content-section" style="display: none;">
                    <h2 class="mt-4">Transaksi</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="bg-primary-subtle">No</th>
                                <th class="bg-primary-subtle">No. Referensi</th>
                                <th class="bg-primary-subtle">No. Rekening</th>
                                <th class="bg-primary-subtle">Nama User</th>
                                <th class="bg-primary-subtle">Email</th>
                                <th class="bg-primary-subtle">Telepon</th>
                                <th class="bg-primary-subtle">Nama Barang</th>
                                <th class="bg-primary-subtle">Harga</th>
                                <th class="bg-primary-subtle">Alamat</th>
                                <th class="bg-primary-subtle">Metode</th>
                                <th class="bg-primary-subtle">Waktu Transaksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Include koneksi dan fungsi dekripsi
                            //include("koneksi.php");
                            //include("function.php");

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


                <div id="encrypted_transaksi" class="content-section" style="display: none;">
                    <h2 class="mt-4">Transaksi Terenkripsi</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="bg-primary-subtle">No</th>
                                <th class="bg-primary-subtle">No. Referensi</th>
                                <th class="bg-primary-subtle">No. Rekening</th>
                                <th class="bg-primary-subtle">Nama User</th>
                                <th class="bg-primary-subtle">Email</th>
                                <th class="bg-primary-subtle">Telepon</th>
                                <th class="bg-primary-subtle">Nama Barang</th>
                                <th class="bg-primary-subtle">Harga</th>
                                <th class="bg-primary-subtle">Alamat</th>
                                <th class="bg-primary-subtle">Metode</th>
                                <th class="bg-primary-subtle">Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include("koneksi.php");

                            // Query untuk mengambil data transaksi
                            $sql = "SELECT no_ref, no_rekening, nama_user, email, telp, nama_barang, harga, alamat, metode, created_at FROM transaksi";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $no = 1; // Nomor urut
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                        <td>$no</td>
                                        <td>{$row['no_ref']}</td>
                                        <td>{$row['no_rekening']}</td>
                                        <td>{$row['nama_user']}</td>
                                        <td>{$row['email']}</td>
                                        <td>{$row['telp']}</td>
                                        <td>{$row['nama_barang']}</td>
                                        <td>{$row['harga']}</td>
                                        <td>{$row['alamat']}</td>
                                        <td>{$row['metode']}</td>
                                        <td>{$row['created_at']}</td>
                                    </tr>";
                                    $no++;
                                }
                            } else {
                                echo "<tr><td colspan='11' class='text-center'>Tidak ada data transaksi</td></tr>";
                            }

                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>

                <div id="manageUser" class="content-section" style="display: none;">
                    <h2 class="mt-4">Manage User</h2>
                    <!-- Tambahkan konten manajemen user -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="bg-primary-subtle">No</th>
                                <th class="bg-primary-subtle">Username</th>
                                <th class="bg-primary-subtle">Email</th>
                                <th class="bg-primary-subtle">Telepon</th>
                                <th class="bg-primary-subtle">Password</th>
                                <th class="bg-primary-subtle">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Include koneksi dan fungsi dekripsi
                            include("koneksi.php");

                            // Query untuk mengambil data transaksi
                            $sql = "SELECT * FROM users";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $no = 1; // Nomor urut
                                while ($row = $result->fetch_assoc()) {
                                    $id = $row['id'];
                                    $username = $row['username'];
                                    $email = $row['email'];
                                    $telp = $row['telp'];
                                    $password = $row['password'];

                                    echo "<tr>
                                    <td>$no</td>
                                    <td>$username</td>
                                    <td>$email</td>
                                    <td>$telp</td>
                                    <td>$password</td>
                                    <td>
                                        <button type='button' class='btn btn-success' style='width:70px'>Edit</button>
                                        <button type='button' class='btn btn-danger' style='width:70px'>Delete</button>
                                    </td>
                                    </tr>";
                                    $no++;
                                }
                            }
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function showSection(sectionId) {
            // Hide all sections
            const sections = document.querySelectorAll('.content-section');
            sections.forEach(section => section.style.display = 'none');

            // Show the selected section
            document.getElementById(sectionId).style.display = 'block';

            // Update active menu
            const menuItems = document.querySelectorAll('.nav-link');
            menuItems.forEach(item => item.classList.remove('active-menu'));
            event.target.classList.add('active-menu');
        }
    </script>
</body>

</html>