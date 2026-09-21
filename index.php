<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kost 3.AM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        html { scroll-behavior: smooth; }
        .hero {
            background: url('https://images.unsplash.com/photo-1600607688969-a5bfcd646154?auto=format&fit=crop&w=1400&q=80') center/cover no-repeat;
            height: 100vh;
            display: flex;
            align-items: center;
            color: white;
            text-shadow: 1px 1px 10px black;
        }
        .facility-icon {
            font-size: 45px;
            color: #0d6efd;
        }
        .card:hover {
            transform: scale(1.03);
            transition: 0.3s;
        }
        .card-img-top {
            width: 100%;
            height: 220px;
            object-fit: cover;
            object-position: center;
            border-top-left-radius: 0.5rem;
            border-top-right-radius: 0.5rem;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">Kost 3.AM</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#kamar">Kamar</a></li>
        <li class="nav-item"><a class="nav-link" href="#fasilitas">Fasilitas</a></li>
        <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
        <a class="nav-link btn btn-danger" href="logout.php">Logout</a>

      </ul>
    </div>
  </div>
</nav>

<!-- HERO -->
<section class="hero">
  <div class="container text-center">
    <h1 class="display-4 fw-bold">Selamat Datang di Kost 3.AM</h1>
    <p class="fs-5">Tinggal Nyaman, Harga Terjangkau, Fasilitas Lengkap</p>
    <a href="#kamar" class="btn btn-primary btn-lg">Lihat Kamar</a>
  </div>
</section>

<!-- FASILITAS -->
<section id="fasilitas" class="py-5 text-center">
  <div class="container">
    <h2 class="fw-bold mb-4">Fasilitas Kost</h2>
    <div class="row g-4">
      <div class="col-md-3">
        <i class="bi bi-wifi facility-icon"></i>
        <p class="mt-2">WiFi 24 Jam</p>
      </div>
      <div class="col-md-3">
        <i class="bi bi-camera-video facility-icon"></i>
        <p class="mt-2">CCTV Keamanan</p>
      </div>
      <div class="col-md-3">
        <i class="bi bi-car-front facility-icon"></i>
        <p class="mt-2">Parkir Luas</p>
      </div>
      <div class="col-md-3">
        <i class="bi bi-cup-hot facility-icon"></i>
        <p class="mt-2">Dapur Bersama</p>
      </div>
    </div>
  </div>
</section>

<!-- DAFTAR KAMAR -->
<section id="kamar" class="py-5 bg-light">
  <div class="container text-center">
    <h2 class="fw-bold mb-4">Daftar Kamar</h2>
    <div class="row g-4">
      <?php
      include 'koneksi.php';
      $query = mysqli_query($koneksi, "SELECT * FROM kamar");
      while ($data = mysqli_fetch_array($query)) {
      ?>
      <div class="col-md-4">
        <div class="card shadow-sm">
          <img src="assets/img/<?php echo $data['Foto']; ?>" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title"><?php echo $data['No_kamar']; ?></h5>
            <p class="card-text">Rp <?php echo number_format($data['Hrg_bulan'], 0, ',', '.'); ?> / bulan</p>
            <a href="detail_kamar.php?id_kamar=<?php echo $data['Kamar_id']; ?>" class="btn btn-primary">Detail</a>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>

<!-- TENTANG -->
<section id="tentang" class="py-5">
  <div class="container text-center">
    <h2 class="fw-bold mb-3">Tentang Kost 3.AM</h2>
    <p class="w-75 mx-auto">
      Kost 3.AM menyediakan hunian nyaman dengan lingkungan yang bersih dan aman.
      Lokasi strategis dekat kampus, minimarket, dan transportasi umum.
    </p>
  </div>
</section>

<!-- FOOTER -->
<footer class="bg-dark text-white text-center py-3">
  <p class="m-0">© 2025 Kost 3.AM. All Rights Reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
