<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Pesan Izin</title>
</head>
<body>
<h2>Pesan / Izin Orang Tua</h2>
<table border="1" cellpadding="10">
<tr>
    <th>Nama</th>
    <th>Pesan</th>
    <th>Status</th>
</tr>

<?php
$query = mysqli_query($koneksi, "
SELECT pesan.*, siswa.nama 
FROM pesan 
JOIN siswa ON pesan.id_siswa = siswa.id_siswa
");

if (!$query) {
    die("Query error: " . mysqli_error($koneksi));
}

while($d = mysqli_fetch_array($query)){
?>
<tr>
    <td><?= $d['nama']; ?></td>
    <td><?= $d['isi_pesan']; ?></td>
    <td><?= $d['status']; ?></td>
</tr>
<?php } ?>
<a href="export_pesan.php" class="btn">⬇ Export Excel</a>
</table>
</body>
</html>