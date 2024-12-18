<?php
include("koneksi.php");
include("function.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Bangun Jaya</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }

        .navbar {
            background-color: #6c63ff;
        }

        .navbar-brand,
        .nav-link {
            color: #fff !important;
        }

        .card {
            border-radius: 15px;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        footer {
            background-color: #6c63ff;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold fs-2" href="#">Toko Bangun Jaya</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kontak</a>
                    </li>

                    <?php
                    // Mulai session untuk mengecek user login
                    session_start();

                    // Cek apakah user sudah login
                    $username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
                    ?>
                    <!-- Menu Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <?php if ($username): ?>
                            <!-- Jika user login -->
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://instagram.com/irfanrz2"><?= $username ?></a>
                            </li>
                        <?php else: ?>
                            <!-- Jika user belum login -->
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>
                        <?php endif; ?>
                    </ul>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="container mt-5">
        <div class="text-center">
            <h1 class="mb-3">Selamat Datang di Toko Bangun Jaya</h1>
            <p class="mb-4">Tempat terbaik untuk memenuhi kebutuhan bahan bangunan Anda!</p>
            <a href="#produk" class="btn btn-primary">Lihat Produk</a>
        </div>
    </div>

    <!-- Produk Section -->
    <?php
    // query
    $sql = "SELECT * FROM barang";
    $result = $conn->query($sql);

    ?>
    <!-- Produk Section -->
    <div class="container mt-5" id="produk">
        <h2 class="text-center mb-4">Produk Kami</h2>
        <div class="row g-4">
            <?php
            // Periksa apakah ada data yang ditemukan
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="col-md-4">
                        <div class="card">
                            <!-- Gambar Barang -->
                            <img src="img/<?php echo $row['gambar']; ?>" class="card-img-top" alt="<?php echo $row['nama_barang']; ?>">
                            <div class="card-body">
                                <!-- Nama Barang -->
                                <h5 class="card-title"><?php echo $row['nama_barang']; ?></h5>
                                <!-- Deskripsi Barang -->
                                <p class="card-text"><?php echo $row['deskripsi']; ?></p>
                                <!-- Harga Barang -->
                                <p class="card-text"><strong>Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></strong></p>
                                <a href="detail.php?id=<?php echo $row['id_barang']; ?>" class="btn btn-primary">Beli Sekarang</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p class='text-center'>Belum ada produk yang tersedia.</p>";
            }
            ?>
        </div>
    </div>

    <!-- Tentang Kami Section -->
    <div class="container mt-5" id="tentang">
        <h2 class="text-center mb-4">Tentang Kami</h2>
        <div class="row align-items-center">
            <div class="col-md-5">
                <img src="https://noiadigital.com/wp-content/uploads/2022/10/IMG_8360-copy-1-scaled.jpg" class="img-fluid rounded" alt="Tentang Kami">
            </div>
            <div class="col-md-6">
                <h3>Toko Bangun Jaya</h3>
                <p>Toko Bangun Jaya telah berdiri sejak tahun 2000 dan menjadi salah satu penyedia bahan bangunan terpercaya di Indonesia. Kami berkomitmen untuk menyediakan produk berkualitas tinggi dengan harga yang kompetitif, sehingga memenuhi kebutuhan konstruksi pelanggan kami dengan maksimal.</p>
                <p>Kami percaya bahwa pembangunan yang kuat dimulai dari bahan yang berkualitas. Dengan pengalaman lebih dari 20 tahun, kami selalu siap untuk membantu mewujudkan proyek Anda dengan produk terbaik dan layanan profesional.</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="mt-5">
        <div class="container">
            <p>&copy; 2024 Toko Bangun Jaya. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>