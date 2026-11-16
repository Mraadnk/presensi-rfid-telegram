<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi,
"SELECT * FROM presensi WHERE id_presensi='$id'");

$d = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Presensi</title>
</head>

<body>

<h2>Edit Status Presensi</h2>

<form method="POST" action="update_presensi.php">

<input type="hidden" name="id"
value="<?= $d['id_presensi']; ?>">

<select name="status">

<option value="Hadir">Hadir</option>
<option value="Izin">Izin</option>
<option value="Sakit">Sakit</option>
<option value="Terlambat">Terlambat</option>

</select>

<br><br>

<button type="submit">
Simpan
</button>

</form>

</body>
</html>