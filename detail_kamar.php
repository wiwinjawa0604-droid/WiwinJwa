<?php
include 'koneksi.php';
if (isset($_GET['id_kamar'])) {
    $id_kamar = $_GET['id_kamar'];
    $query = mysqli_query($koneksi, "SELECT * FROM kamar WHERE Kamar_id='$id_kamar'");
    $data = mysqli_fetch_array($query);
} else {
    echo "<script>alert('Kamar tidak ditemukan'); window.location='index.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Detail <?php echo $data['No_kamar']; ?> | Kost 3.AM</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">← Kembali</a>
  </div>
</nav>

<div class="container my-5">
  <div class="row shadow bg-white p-4 rounded">
    <div class="col-md-6">
    <img src="assets/img/<?php echo $data['Foto']; ?>" 
         class="img-fluid rounded shadow" 
         alt="Foto Kamar">
    </div>
    <div class="col-md-6">
      <h2>Kamar <?php echo $data['No_kamar']; ?></h2>
      <p><strong>Harga:</strong> Rp <?php echo number_format($data['Hrg_bulan'], 0, ',', '.'); ?> / bulan</p>
      <p><strong>Status:</strong>
        <?php if ($data['Status_kamar'] == 'Kosong') { ?>
          <span class="badge bg-success">Kosong</span>
        <?php } else { ?>
          <span class="badge bg-danger">Terisi</span>
        <?php } ?>
      </p>

      <?php if ($data['Status_kamar'] == 'Kosong') { ?>
        <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#pesanModal">Pesan Kamar</button>
      <?php } else { ?>
        <button class="btn btn-secondary mt-3" disabled>Kamar Sudah Terisi</button>
      <?php } ?>
    </div>
  </div>
</div>

<!-- Modal Form Pemesanan -->
<div class="modal fade" id="pesanModal" tabindex="-1" aria-labelledby="pesanModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="pesan_kamar.php" method="POST" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Form Pemesanan Kamar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="Kamar_id" value="<?php echo $data['Kamar_id']; ?>">
        <div class="mb-3">
          <label>Nama Penyewa</label>
          <input type="text" name="Nama" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>No Telepon</label>
          <input type="text" name="Telepon" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Alamat</label>
          <textarea name="Alamat" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
          <label>Tanggal Masuk</label>
          <input type="date" name="Tgl_masuk" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Lama Sewa (bulan)</label>
          <input type="number" name="Lama_sewa" class="form-control" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Kirim Pesanan</button>
      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
