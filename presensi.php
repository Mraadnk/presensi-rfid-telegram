<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Presensi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="sidebar">
    <h2>📊 Presensi</h2>
    <a href="index.php">Dashboard</a>
    <a href="siswa.php">Siswa</a>
    <a href="presensi.php">Presensi</a>
    <a href="pesan.php">Pesan</a>
</div>

<div class="content">
<div class="card">

<h2>Data Presensi</h2>

<a href="export_presensi.php" class="btn">⬇ Export Excel</a>

<table>
<tr>
    <th>Nama</th>
    <th>Tanggal</th>
    <th>Jam</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>

<?php
$query = mysqli_query($koneksi, "
SELECT presensi.*, siswa.nama 
FROM presensi 
JOIN siswa ON presensi.id_siswa = siswa.id_siswa
ORDER BY id_presensi DESC
");

if (!$query) {
    die("Query error: " . mysqli_error($koneksi));
}

while($d = mysqli_fetch_array($query)){
?>
<tr>
    <td><?= $d['nama']; ?></td>
    <td><?= $d['tanggal']; ?></td>
   <td>
    <?= $d['jam'] ? $d['jam'] : '-'; ?>
</td>
    <td>

<?php
if($d['status']=="Hadir"){
    echo "<span style='color:green;font-weight:bold'>Hadir</span>";
}
elseif($d['status']=="Izin"){
    echo "<span style='color:orange;font-weight:bold'>Izin</span>";
}
elseif($d['status']=="Sakit"){
    echo "<span style='color:blue;font-weight:bold'>Sakit</span>";
}
else{
    echo "<span style='color:red;font-weight:bold'>Terlambat</span>";
}
?>

</td>

<td>
<a href="edit_presensi.php?id=<?= $d['id_presensi']; ?>" 
style="
background:#3498db;
color:white;
padding:6px 10px;
border-radius:5px;
text-decoration:none;
">
Edit
</a>
<a href="hapus_presensi.php?id=<?= $d['id_presensi']; ?>" 
onclick="return confirm('Yakin ingin menghapus data ini?')"
style="
background:#e74c3c;
color:white;
padding:6px 10px;
border-radius:5px;
text-decoration:none;
margin-left:5px;
">
Hapus
</a>

</td>
</tr>
<?php } ?>

</table>
</div>
</div>

</body>
</html>