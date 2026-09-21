<?php
session_start(); // Selalu mulai session di awal skrip

// Jika pengguna sudah login, arahkan langsung ke halaman data_siswa.php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: data_siswa.php');
    exit;
}

// Data pengguna dummy (ganti dengan database di aplikasi nyata)
$valid_username = 'admin';
$valid_password = 'password123'; // Di produksi, gunakan password_hash() dan password_verify()

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input_username = $_POST['username'] ?? '';
    $input_password = $_POST['password'] ?? '';

    if (empty($input_username) || empty($input_password)) {
        $error_message = 'Username dan password tidak boleh kosong.';
    } elseif ($input_username === $valid_username && $input_password === $valid_password) {
        // Kredensial benar, set session
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $input_username; // Simpan username di session

        // Arahkan ke halaman data_siswa.php
        header('Location: data_siswa.php');
        exit;
    } else {
        $error_message = 'Username atau password salah.';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Data Siswa</title>
</head>
<body>
    <div class="login-container">
        <h2>Login Data Siswa</h2>
        <?php if (!empty($error_message)): ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="Username" required autocomplete="username">
            <input type="password" name="password" placeholder="Password" required autocomplete="current-password">
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>