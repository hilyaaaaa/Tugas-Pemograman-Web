<?php
        unlink("uploads/".$data['foto_bukti']);

        $foto = $_FILES['foto_bukti']['name'];
        $tmp = $_FILES['foto_bukti']['tmp_name'];

        move_uploaded_file($tmp, "uploads/".$foto);

    } else {

        $foto = $data['foto_bukti'];
    }

    mysqli_query($conn,
    "UPDATE monitoring SET
    lokasi_sungai='$lokasi',
    waktu_pengukuran='$waktu',
    tinggi_air='$tinggi',
    status_banjir='$status',
    deskripsi='$deskripsi',
    foto_bukti='$foto'
    WHERE id='$id'");

    header("Location: monitoring.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Monitoring</title>
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<h2>Edit Monitoring</h2>

<form method="POST" enctype="multipart/form-data">

<input type="text" name="lokasi_sungai"
value="<?php echo $data['lokasi_sungai']; ?>"><br><br>

<input type="datetime-local" name="waktu_pengukuran"
value="<?php echo date('Y-m-d\TH:i', strtotime($data['waktu_pengukuran'])); ?>"><br><br>

<input type="number" name="tinggi_air"
value="<?php echo $data['tinggi_air']; ?>"><br><br>

<textarea name="deskripsi"><?php echo $data['deskripsi']; ?></textarea><br><br>

<img src="uploads/<?php echo $data['foto_bukti']; ?>" width="100"><br><br>

<input type="file" name="foto_bukti"><br><br>

<button type="submit" name="update">Update</button>

</form>

</body>
</html>