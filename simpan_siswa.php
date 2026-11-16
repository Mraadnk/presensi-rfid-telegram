<?php

include 'koneksi.php';

$nama = $_POST['nama'];
$uid = $_POST['uid_rfid'];

mysqli_query($koneksi,
"INSERT INTO siswa(nama,uid_rfid)
VALUES('$nama','$uid')");

header("Location:siswa.php");

?>