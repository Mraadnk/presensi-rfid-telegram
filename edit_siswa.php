<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id_siswa='$id'");
$d = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="content">

<h2>Edit Data Siswa</h2>

<form action="update_siswa.php" method="POST">

<input type="hidden" name="id_siswa" value="<?= $d['id_siswa']; ?>">

<label>Nama Siswa</label><br>
<input type="text" name="nama" value="<?= $d['nama']; ?>" required>

<br><br>

<label>UID RFID</label><br>
<input type="text" name="uid_rfid" value="<?= $d['uid_rfid']; ?>" required>

<br><br>

<label>Chat ID Telegram</label><br>
<input type="text" name="chat_id" value="<?= $d['chat_id']; ?>">

<br><br>

<button type="submit">💾 Simpan Perubahan</button>

</form>

</div>

</body>
</html>