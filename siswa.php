<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="sidebar">

    <div class="logo">
        <h2>📚 PRESENSI RFID</h2>
        <small>Sistem Monitoring Kehadiran</small>
    </div>

    <a href="index.php">📊 Dashboard</a>
    <a href="siswa.php">👨‍🎓 Data Siswa</a>
    <a href="presensi.php">📝 Presensi</a>

</div>

<div class="content">

    <div class="judul-halaman">
        <h1>👨‍🎓 Data Siswa</h1>
        <p>Kelola Data Siswa dan UID RFID</p>
    </div>

    <a href="tambah_siswa.php" class="btn-tambah">
        ➕ Tambah Siswa
    </a>

    <table>

        <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>UID RFID</th>
            <th>Aksi</th>
        </tr>

        <?php

        $no = 1;

        $data = mysqli_query($koneksi,
        "SELECT * FROM siswa ORDER BY id_siswa DESC");

        while($d = mysqli_fetch_array($data)){

        ?>

        <tr>

            <td><?= $no++; ?></td>

            <td><?= $d['nama']; ?></td>

            <td><?= $d['uid_rfid']; ?></td>

            <td>

                <a href="edit_siswa.php?id=<?= $d['id_siswa']; ?>"
                class="btn-edit">
                ✏ Edit
                </a>

                <a href="hapus_siswa.php?id=<?= $d['id_siswa']; ?>"
                class="btn-hapus"
                onclick="return confirm('Yakin ingin menghapus data siswa ini?')">
                🗑 Hapus
                </a>

            </td>

        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>