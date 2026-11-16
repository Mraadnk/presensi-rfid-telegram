<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html>
<head>
<title>Tambah Siswa</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="content">

<h2>Tambah Data Siswa</h2>

<form method="POST" action="simpan_siswa.php">

<label>Nama Siswa</label>
<br>
<input type="text" name="nama" required>

<br><br>

<label>UID RFID</label>
<br>
<input type="text" name="uid_rfid" required>

<br><br>

<button type="submit">
Simpan
</button>

</form>

</div>

</body>
</html>