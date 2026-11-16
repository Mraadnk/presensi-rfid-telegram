<?php

include 'koneksi.php';

$id = $_POST['id'];
$status = $_POST['status'];

$query = mysqli_query($koneksi,
"UPDATE presensi 
SET status='$status'
WHERE id_presensi='$id'");

if($query){

    echo "
    <script>
    alert('Data berhasil diupdate!');
    window.location='presensi.php';
    </script>
    ";

}else{

    echo "Gagal update!";
    echo "<br>";
    echo mysqli_error($koneksi);

}

?>