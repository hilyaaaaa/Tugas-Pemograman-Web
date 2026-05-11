<?php

session_start();

if(!isset($_SESSION['user_id'])){

    header("Location: login.php");

    exit;
}

include "koneksi.php";

$user_id = $_SESSION['user_id'];

$data = mysqli_query(

    $conn,

    "SELECT * FROM monitoring
     WHERE user_id='$user_id'"

);

?>

<!DOCTYPE html>

<html>

<head>

    <title>Monitoring</title>

    <link rel="stylesheet"
          href="assets/style.css">

</head>

<body>

<div class="container">

    <?php include "navbar.php"; ?>

    <h2>Data Monitoring</h2>

    <table>

        <tr>

            <th>Lokasi</th>

            <th>Waktu</th>

            <th>Tinggi</th>

            <th>Status</th>

            <th>Deskripsi</th>

            <th>Foto</th>

            <th>Aksi</th>

        </tr>

        <?php while($d = mysqli_fetch_assoc($data)){ ?>

        <tr>

            <td>

                <?= $d['lokasi_sungai']; ?>

            </td>

            <td>

                <?= $d['waktu_pengukuran']; ?>

            </td>

            <td>

                <?= $d['tinggi_air']; ?> cm

            </td>

            <td class="status-<?= strtolower($d['status_banjir']); ?>">

                <?= $d['status_banjir']; ?>

            </td>

            <td>

                <?= $d['deskripsi']; ?>

            </td>

            <td>

                <img src="uploads/<?= $d['foto_bukti']; ?>"
                     width="80">

            </td>

            <td>

                <a class="action-link edit"
                   href="edit_monitoring.php?id=<?= $d['id']; ?>">

                    Edit

                </a>

                <a class="action-link delete"
                   href="hapus_monitoring.php?id=<?= $d['id']; ?>">

                    Hapus

                </a>

            </td>

        </tr>

        <?php } ?>

    </table>

</div>

</body>

</html>

