<?php

$time = time();
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
            <a class="navbar-brand" href="#">Toko Bangun Jaya</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#produk">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Kontak</a>
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
            <div class="col-md-6">
                <div class="card">
                    <img src="https://via.placeholder.com/600x400" class="card-img-top" alt="Produk">
                    <div class="card-body">
                        <h5 class="card-title">Semen</h5>
                        <p class="card-text">Kualitas terbaik untuk segala kebutuhan konstruksi Anda.</p>
                        <p><strong>Harga:</strong> Rp50.000</p>
                        <p><strong>Kuantitas:</strong> 2</p>
                        <p><strong>Total:</strong> Rp100.000</p>
                    </div>
                </div>
            </div>

            <!-- Form Checkout -->
            <div class="col-md-6">
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" placeholder="Masukkan nama lengkap Anda">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Masukkan email Anda">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat Pengiriman</label>
                        <textarea class="form-control" id="address" rows="3" placeholder="Masukkan alamat pengiriman"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="payment" class="form-label">Metode Pembayaran</label>
                        <select class="form-select" id="payment">
                            <option selected>Pilih metode pembayaran</option>
                            <option value="1">Transfer Bank</option>
                            <option value="2">COD (Bayar di Tempat)</option>
                            <option value="3">Kartu Kredit</option>
                        </select>
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
</body>

</html>