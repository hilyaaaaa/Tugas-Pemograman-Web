<?php
// Pastikan tidak ada output sebelum session_start()
session_start();

// Data user dummy (tanpa database)
$users = [
    'user1'   => ['name' => 'Hilya Kayla',     'password' => '123456'],
    'user2'   => ['name' => 'Admin Kolaborasa', 'password' => 'admin123'],
];

$error_message = '';

// Jika ada logout
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}

// Cek login pada POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login_name   = trim($_POST['login_name'] ?? '');
    $login_pass   = $_POST['login_password'] ?? '';

    // Validasi: nama & password wajib
    if (empty($login_name) || empty($login_pass)) {
        $error_message = 'Username dan password wajib diisi.';
    } else {
        // Cek apakah username+password cocok
        foreach ($users as $uname => $data) {
            if ($uname === $login_name && $data['password'] === $login_pass) {
                $_SESSION['user'] = $data;
                header("Location: dashboard.php");
                exit();
            }
        }
        $error_message = 'Username atau password salah.';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kolaborasa - Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">
            <a href="index.html" class="logo-text">Kolaborasa</a>
        </div>
    </nav>

    <!-- Card Login -->
    <div class="container">
        <div class="login-card">
            <div class="login-form">
                <h1>Welcome Back!</h1>

                <!-- Pesan error -->
                <?php if (!empty($error_message)): ?>
                    <div class="error-message"><?php echo htmlspecialchars($error_message); ?></div>
                <?php endif; ?>

                <!-- Form Login -->
                <form method="POST" id="loginForm">
                    <div class="input-group">
                        <label>Username</label>
                        <input type="text" name="login_name"
                               value="<?php echo htmlspecialchars($_POST['login_name'] ?? ''); ?>"
                               placeholder="Masukkan username"
                               required>
                    </div>
                    <div class="input-group">
                        <label>Password</label>
                        <input type="password" name="login_password"
                               placeholder="Masukkan password"
                               required>
                    </div>
                    <div class="options">
                        <label><input type="checkbox" name="remember"> Remember Me</label>
                    </div>
                    <button type="submit" class="btn-login">Login</button>
                    <button type="button" class="btn-google">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Google_%22G%22_logo.svg" alt="Google">
                        Sign in with Google
                    </button>
                </form>

                <p class="signup-text">
                    Don't have an Account?
                    <a href="register.php">Sign up</a>
                </p>
            </div>
            <div class="login-image"></div>
        </div>
    </div>

    <hr class="footer-divider">

    <div class="footer-bottom">
        <p class="copyright">© 2025 Kolaborasa Inc. All rights reserved.</p>
        <div class="social-icons">
        </div>
    </div>
    </footer>

    <script src="script.js"></script>

</body>
</html>
