

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Monitoring</title>
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<h2>Tambah Monitoring</h2>

<form method="POST" enctype="multipart/form-data">

<input type="text" name="lokasi_sungai" placeholder="Lokasi Sungai"><br><br>

<input type="datetime-local" name="waktu_pengukuran"><br><br>

<input type="number" name="tinggi_air" placeholder="Tinggi Air"><br><br>

<textarea name="deskripsi" placeholder="Deskripsi"></textarea><br><br>

<input type="file" name="foto_bukti"><br><br>

<button type="submit" name="simpan">Simpan</button>

</form>

</body>
</html>