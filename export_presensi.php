<?php
include 'koneksi.php';

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=presensi.xls");

echo "Nama\tTanggal\tJam\tStatus\n";

$data = mysqli_query($koneksi, "
SELECT presensi.*, siswa.nama 
FROM presensi 
JOIN siswa ON presensi.id_siswa = siswa.id_siswa
");

while($d = mysqli_fetch_array($data)){
    echo $d['nama']."\t".$d['tanggal']."\t".$d['jam']."\t".$d['status']."\n";
}
?>