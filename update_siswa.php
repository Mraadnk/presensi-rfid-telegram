<?php
include 'koneksi.php';

$id = $_POST['id_siswa'];
$nama = $_POST['nama'];
$uid = $_POST['uid_rfid'];
$chat = $_POST['chat_id'];

mysqli_query($koneksi, "
UPDATE siswa
SET
nama='$nama',
uid_rfid='$uid',
chat_id='$chat'
WHERE id_siswa='$id'
");

header("Location:siswa.php");
exit;
?>