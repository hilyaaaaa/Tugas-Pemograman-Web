<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reg_name = trim($_POST["reg_name"] ?? '');
    $reg_email = trim($_POST["reg_email"] ?? '');
    $reg_password = $_POST["reg_password"] ?? '';
    
    if (!empty($reg_name) && !empty($reg_email) && !empty($reg_password)) {
        $_SESSION['temp_register'] = [
            'name' => $reg_name,
            'email' => $reg_email
        ];
        header("Location: login.php?registered=1");
        exit();
    }
    
    $reg_error = "Semua field harus diisi!";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kolaborasa - Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navbar sama seperti login.php -->
    
    <div class="container">
        <div class="login-card">
            <div class="login-form">
                <h1>Create Account</h1>
                <?php if (isset($reg_error)): ?>
                    <div class="error-message"><?php echo $reg_error; ?></div>
                <?php endif; ?>
                
                <form method="POST" id="registerForm">
                    <div class="input-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="reg_name" required placeholder="Nama Anda">
                    </div>
                    <div class="input-group">
                        <label>Email</label>
                        <input type="email" name="reg_email" required placeholder="email@contoh.com">
                    </div>
                    <div class="input-group">
                        <label>Password</label>
                        <input type="password" name="reg_password" required placeholder="Kata sandi">
                    </div>
                    <button type="submit" class="btn-login">Register</button>
                </form>
                <p class="signup-text">Already have an Account? <a href="login.php">Login</a></p>
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
</body>
</html>
