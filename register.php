<?php
include "koneksi.php";

if(isset($_POST['register'])){

    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($nama) || empty($email) || empty($password)){
        echo "Semua field wajib diisi";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Format email tidak valid";
    } elseif(strlen($password) < 6){
        echo "Password minimal 6 karakter";
    } else {

        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        mysqli_query($conn, "INSERT INTO users(nama,email,password)
        VALUES('$nama','$email','$password_hash')");

        echo "Registrasi berhasil";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<h2>Register</h2>

<form method="POST">
    <input type="text" name="nama" placeholder="Nama"><br><br>
    <input type="email" name="email" placeholder="Email"><br><br>
    <input type="password" name="password" placeholder="Password"><br><br>

    <button type="submit" name="register">Register</button>
</form>

<a href="login.php">Login</a>

</body>
</html>