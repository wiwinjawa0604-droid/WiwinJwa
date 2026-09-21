<?php
session_start();
include "koneksi.php";

// Jika tombol login ditekan
if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Ambil user berdasarkan username
    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username'");
    $data = mysqli_fetch_assoc($query);

    if ($data) {

        // Cocokkan password
        if (password_verify($password, $data['password'])) {

            // Simpan session
            $_SESSION['username'] = $data['username'];
            $_SESSION['nama'] = $data['nama'];

            // Redirect ke index
            header("Location: index.php");
            exit;

        } else {
            $error = "Password salah!";
        }

    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Kost 3.AM</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    html {
        scroll-behavior: smooth;
    }

    /* Sama seperti hero pada index */
    .hero-login {
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

    .login-box {
        max-width: 380px;
        width: 100%;
        background: rgba(0, 0, 0, 0.45);
        padding: 25px;
        border-radius: 12px;
        backdrop-filter: blur(5px);
    }

    .login-box label {
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

<div class="hero-login">

    <div class="login-box">

        <h1 class="fw-bold mb-2">Login Kost 3.AM</h1>
        <p class="mb-4">Masuk untuk melanjutkan</p>

        <!-- Pesan error -->
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST">

            <div class="mb-3 text-start">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>

            <div class="mb-3 text-start">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button name="login" class="btn btn-primary w-100 mt-2">Login</button>

            <p class="mt-3">Belum punya akun?
                <a href="register.php">Daftar</a>
            </p>

        </form>

    </div>

</div>

</body>
</html>
