<?php
include "koneksi.php";

if (isset($_POST['register'])) {

    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Cek apakah username sudah dipakai
    $cek = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username'");
    
    if (mysqli_num_rows($cek) > 0) {
        $error = "Username sudah digunakan!";
    } else {
        mysqli_query($koneksi, "INSERT INTO users (username, password, nama) 
                                VALUES ('$username', '$password', '$nama')");
        echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location='login.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Kost 3.AM</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    html {
        scroll-behavior: smooth;
    }

    /* Sama seperti login */
    .hero-register {
        background: url('https://images.unsplash.com/photo-1600607688969-a5bfcd646154?auto=format&fit=crop&w=1400&q=80')
                    center/cover no-repeat;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        color: white;
        text-shadow: 1px 1px 10px black;
        padding: 20px;
    }

    .register-box {
        max-width: 380px;
        width: 100%;
        background: rgba(0, 0, 0, 0.45);
        padding: 25px;
        border-radius: 12px;
        backdrop-filter: blur(5px);
    }

    .register-box label {
        color: white;
        font-weight: 500;
    }

    .btn-primary {
        background-color: #0d6efd;
        border: none;
        padding: 10px;
        font-size: 18px;
        border-radius: 8px;
    }

    .btn-primary:hover {
        background-color: #0b5ed7;
    }

    a {
        color: #8fd8ff;
        text-decoration: none;
    }
</style>

</head>
<body>

<div class="hero-register">

    <div class="register-box">

        <h1 class="fw-bold mb-2">Registrasi Akun</h1>
        <p class="mb-4">Buat akun baru untuk melanjutkan</p>

        <!-- Pesan error -->
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST">

            <div class="mb-3 text-start">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="mb-3 text-start">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>

            <div class="mb-3 text-start">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button name="register" class="btn btn-primary w-100 mt-2">Daftar</button>

            <p class="mt-3">Sudah punya akun?
                <a href="login.php">Login</a>
            </p>

        </form>

    </div>

</div>

</body>
</html>
