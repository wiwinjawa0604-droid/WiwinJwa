<?php
session_start(); // Selalu mulai session

// Periksa apakah pengguna sudah login. Jika tidak, arahkan kembali ke halaman login.
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['username'] ?? 'Pengguna'; // Ambil username dari session
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f8f8f8;
            color: #333;
        }
        h1 {
            color: #0056b3;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .header-info {
            margin-bottom: 20px;
            font-size: 1.1em;
        }
        .header-info a {
            color: #dc3545;
            text-decoration: none;
            font-weight: bold;
        }
        .header-info a:hover {
            text-decoration: underline;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        td img {
            max-width: 80px;
            height: auto;
            display: block;
            margin: 0 auto;
            border-radius: 4px;
        }
        .action-links a {
            margin-right: 10px;
            text-decoration: none;
            color: #007bff;
        }
        .action-links a:hover {
            text-decoration: underline;
        }
        .action-links a.hapus {
            color: #dc3545;
        }
        .tambah-data {
            margin-bottom: 20px;
            display: inline-block;
            padding: 8px 15px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .tambah-data:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h1>Data Siswa</h1>
    <p class="header-info">Selamat datang, **<?php echo htmlspecialchars($username); ?>**! | <a href="logout.php">Logout</a></p>

    <a href="#" class="tambah-data">Tambah Data</a> <table>
        <thead>
            <tr>
                <th>Foto</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><img src="https://via.placeholder.com/80/cccccc/ffffff?text=Foto1" alt="Foto Siswa"></td>
                <td>2034</td>
                <td>adel</td>
                <td>Perempuan</td>
                <td>09122</td>
                <td>sumba</td>
                <td class="action-links">
                    <a href="#">Ubah</a>
                    <a href="#" class="hapus">Hapus</a>
                </td>
            </tr>
            <tr>
                <td><img src="https://via.placeholder.com/80/999999/ffffff?text=Foto2" alt="Foto Siswa"></td>
                <td>2222</td>
                <td>Winwin</td>
                <td>Perempuan</td>
                <td>0811111</td>
                <td>sumteng</td>
                <td class="action-links">
                    <a href="#">Ubah</a>
                    <a href="#" class="hapus">Hapus</a>
                </td>
            </tr>
            <tr>
                <td><img src="https://via.placeholder.com/80/666666/ffffff?text=Foto3" alt="Foto Siswa"></td>
                <td>33333330</td>
                <td>Devan</td>
                <td>Laki-laki</td>
                <td>08755555</td>
                <td>Jaksel</td>
                <td class="action-links">
                    <a href="#">Ubah</a>
                    <a href="#" class="hapus">Hapus</a>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>