<?php
include 'koneksi.php';

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=pesan.xls");

echo "Nama\tPesan\tStatus\n";

$data = mysqli_query($koneksi, "
SELECT pesan.*, siswa.nama 
FROM pesan 
JOIN siswa ON pesan.id_siswa = siswa.id_siswa
");

while($d = mysqli_fetch_array($data)){
    echo $d['nama']."\t".$d['isi_pesan']."\t".$d['status']."\n";
}
?>