<?php
date_default_timezone_set("Asia/Jakarta");

$koneksi = new mysqli("localhost", "root", "", "presensi_rfid");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$uid = $_GET['uid'];

// Cari siswa
$query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE uid_rfid='$uid'");
$data = mysqli_fetch_assoc($query);

if ($data) {
    $id_siswa = $data['id_siswa'];
    $nama = $data['nama'];
    $chat_id = $data['chat_id'];

    $tanggal = date("Y-m-d");
    $jam = date("H:i:s");

    // Simpan presensi
    mysqli_query($koneksi, "INSERT INTO presensi (id_siswa, tanggal, jam, status)
    VALUES ('$id_siswa', '$tanggal', '$jam', 'Hadir')");

    // =====================
    // KIRIM TELEGRAM
    // =====================
    
    $token = "8543584397:AAE4EXBTwZrwf7PLoYY4eVl-t2llllP2ExE";
    
    $pesan = "Siswa $nama telah hadir pada $tanggal pukul $jam";
    
    $url = "https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode($pesan);

    file_get_contents($url);

    echo "Presensi berhasil & notifikasi terkirim";
    
} else {
    echo "UID tidak terdaftar";
}
?>