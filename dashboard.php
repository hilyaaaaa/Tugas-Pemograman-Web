<?php

session_start();

if(!isset($_SESSION['user_id'])){

    header("Location: login.php");

    exit;
}

include "koneksi.php";

$total = mysqli_fetch_assoc(

    mysqli_query(
        $conn,
        "SELECT COUNT(*) as total
         FROM monitoring"
    )

);

$aman = mysqli_fetch_assoc(

    mysqli_query(
        $conn,
        "SELECT COUNT(*) as total
         FROM monitoring
         WHERE status_banjir='Aman'"
    )

);

$waspada = mysqli_fetch_assoc(

    mysqli_query(
        $conn,
        "SELECT COUNT(*) as total
         FROM monitoring
         WHERE status_banjir='Waspada'"
    )

);

$bahaya = mysqli_fetch_assoc(

    mysqli_query(
        $conn,
        "SELECT COUNT(*) as total
         FROM monitoring
         WHERE status_banjir='Bahaya'"
    )

);

?>

<!DOCTYPE html>

<html>

<head>

    <title>Dashboard</title>

    <link rel="stylesheet"
          href="assets/style.css">

</head>

<body>

<div class="container">

    <?php include "navbar.php"; ?>

    <h2>

        Halo,
        <?= $_SESSION['nama']; ?>

    </h2>

    <div class="dashboard">

        <div class="card">

            <h3>Total Monitoring</h3>

            <p>
                <?= $total['total']; ?>
            </p>

        </div>

        <div class="card">

            <h3>Status Aman</h3>

            <p>
                <?= $aman['total']; ?>
            </p>

        </div>

        <div class="card">

            <h3>Status Waspada</h3>

            <p>
                <?= $waspada['total']; ?>
            </p>

        </div>

        <div class="card">

            <h3>Status Bahaya</h3>

            <p>
                <?= $bahaya['total']; ?>
            </p>

        </div>

    </div>

</div>

</body>

</html>
```
