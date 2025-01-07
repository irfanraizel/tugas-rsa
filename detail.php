<?php
include("koneksi.php");
include("function.php");
$time = time();

session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
$email = $_SESSION['email'];
$telp = $_SESSION['telp'];

if (!$username) {
    echo "<script>alert('Silahkan Login Terlebih Dahulu!!')</script>";
    echo "<script>window.location='index.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Produk - Toko Bangun Jaya</title>
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
            <a class="navbar-brand" href="<?= base_url() ?>">Toko Bangun Jaya</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href=""><?= $username ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Checkout Section -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Checkout Produk</h2>
        <div class="row">
            <!-- Detail Produk -->
            <?php
            // Ambil ID produk dari parameter URL
            $id_barang = isset($_GET['id']) ? intval($_GET['id']) : 0;

            // Query untuk mengambil detail barang
            $sql = "SELECT * FROM barang WHERE id = $id_barang";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Ambil data barang
                $barang = $result->fetch_assoc();
            } else {
                die("Produk tidak ditemukan.");
            }
            ?>
            <div class="col-md-4">
                <div class="card">
                    <img src="img/<?php echo $barang['gambar']; ?>" class="card-img-top" alt="<?php echo $barang['nama_barang']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $barang['nama_barang']; ?></h5>
                        <p class="card-text"><?php echo $barang['deskripsi']; ?></p>
                        <p><strong>Harga:</strong> Rp<?php echo number_format($barang['harga'], 0, ',', '.'); ?></p>
                        <p><strong>Stok:</strong> <?php echo $barang['stok']; ?> pcs</p>
                    </div>
                </div>
            </div>


            <!-- Form Checkout -->
            <div class="col-md-5">
                <form method="post" action="save.php">
                    <input type="hidden" value="<?= $barang['nama_barang'] ?>" name="nama_barang">
                    <input type="hidden" value="<?= $barang['harga'] ?>" name="harga">
                    <input type="hidden" value="1401<?= $time ?>2024" name="no_ref">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" placeholder="<?= $username ?>" value="<?= $username ?>" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="<?= $email ?>" value="<?= $email ?>" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="telp" class="form-label">No Telepon</label>
                        <input type="telp" class="form-control" id="telp" placeholder="<?= $telp ?>" value="<?= $telp ?>" name="telp">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat Pengiriman</label>
                        <textarea class="form-control" id="alamat" rows="3" placeholder="Masukkan alamat pengiriman" name="alamat"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="payment" class="form-label">Metode Pembayaran</label>
                        <select class="form-select" id="payment" name="metode">
                            <option selected>Pilih metode pembayaran</option>
                            <option value="bca">Transfer Bank BCA</option>
                            <option value="mandiri">Transfer Bank Mandiri</option>
                            <option value="bri">Transfer Bank BRI</option>
                            <option value="ovo">Transfer e-wallet (Ovo)</option>
                            <option value="gopay">Transfer e-wallet (GoPay)</option>
                            <option value="dana">Transfer e-wallet (Dana)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="no_rek" class="form-label">No Rekening/e-wallet</label>
                        <input type="no_rek" class="form-control" id="no_rek" placeholder="Masukkan no rek/e-wallet" value="" name="no_rek">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Bayar Sekarang</button>
                </form>
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
    </script>
</body>

</html>