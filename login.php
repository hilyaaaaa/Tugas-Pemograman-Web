
<?php
session_start();
include "koneksi.php";

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    $data = mysqli_fetch_assoc($query);

    if($data){

        if(password_verify($password, $data['password'])){

            $_SESSION['user_id'] = $data['id'];
            $_SESSION['nama'] = $data['nama'];

            header("Location: dashboard.php");

        } else {
            echo "Password salah";
        }

    } else {
        echo "Email tidak ditemukan";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<h2>Login</h2>

<form method="POST">

    <input type="email" name="email" placeholder="Email"><br><br>

    <input type="password" name="password" placeholder="Password"><br><br>

    <button type="submit" name="login">Login</button>

</form>

<a href="register.php">Register</a>

</body>
</html>