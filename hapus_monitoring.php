<?php
include "koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($conn,
"SELECT * FROM monitoring WHERE id='$id'");

$data = mysqli_fetch_assoc($query);

unlink("uploads/".$data['foto_bukti']);

mysqli_query($conn,
"DELETE FROM monitoring WHERE id='$id'");

header("Location: monitoring.php");
?>