<?php
include 'koneksi.php';

// Ambil data dari form
$nama      = $_POST['Nama'];
$telepon   = $_POST['Telepon'];
$alamat    = $_POST['Alamat'];
$tgl_masuk = $_POST['Tgl_masuk'];
$lama_sewa = $_POST['Lama_sewa'];
$kamar_id  = $_POST['Kamar_id'];

// Buat ID unik untuk penyewa baru
$penyewa_id = sprintf("%03d", rand(5, 999)); // misal: 005, 006, dst.

// 1️⃣ Tambahkan ke tabel penyewa
mysqli_query($koneksi, "INSERT INTO penyewa (Penyewa_id, Nama, Telepon, Alamat, Status_penyewa)
VALUES ('$penyewa_id', '$nama', '$telepon', '$alamat', 'Aktif')");

// 2️⃣ Hitung tanggal keluar otomatis
$tgl_keluar = date('Y-m-d', strtotime("+$lama_sewa months", strtotime($tgl_masuk)));

// Buat ID kontrak baru (misal: B05)
$kontrak_id = 'B' . sprintf("%02d", rand(5, 99));

// 3️⃣ Tambahkan ke tabel kontrak
mysqli_query($koneksi, "INSERT INTO kontrak (Kontrak_id, Penyewa_id, Kamar_id, Tgl_masuk, Tgl_keluar, Status_kontrak)
VALUES ('$kontrak_id', '$penyewa_id', '$kamar_id', '$tgl_masuk', '$tgl_keluar', 'Aktif')");

// 4️⃣ Update status kamar jadi "Terisi"
mysqli_query($koneksi, "UPDATE kamar SET Status_kamar='Terisi' WHERE Kamar_id='$kamar_id'");

// 5️⃣ Redirect dengan pesan sukses
echo "<script>
alert('Pemesanan berhasil! Data sudah disimpan ke database.');
window.location='index.php';
</script>";
?>
