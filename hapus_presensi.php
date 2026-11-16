<?php

include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi,
"DELETE FROM presensi
WHERE id_presensi='$id'");

header("location:presensi.php");

?>