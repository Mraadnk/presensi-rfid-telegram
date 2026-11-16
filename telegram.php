file_put_contents("log.txt", "WEBHOOK AKTIF\n", FILE_APPEND);
<?php
date_default_timezone_set("Asia/Jakarta");


// Ambil data dari Telegram
$content = file_get_contents("php://input");
$data = json_decode($content, true);

// Jika tidak ada update, hentikan
if (!$data || !isset($data["message"])) {
    exit;
}

// Ambil data penting
$chat_id = $data["message"]["chat"]["id"];
$pesan = strtolower(trim($data["message"]["text"] ?? ""));

// Tentukan status
$status = "";
if (strpos($pesan, "sakit") !== false) {
    $status = "Sakit";
} elseif (strpos($pesan, "terlambat") !== false) {
    $status = "Terlambat";
} elseif (strpos($pesan, "izin") !== false) {
    $status = "Izin";
}

// Koneksi database
$koneksi = new mysqli("localhost", "root", "", "presensi_rfid");

if ($koneksi->connect_error) {
    exit;
}

// Cari siswa berdasarkan chat_id
$query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE chat_id='$chat_id'");
$siswa = mysqli_fetch_assoc($query);

// TOKEN BOT
$token = "8543584397:AAE4EXBTwZrwf7PLoYY4eVl-t2llllP2ExE";

// ======================
// PROSES DATA
// ======================1
if ($siswa) {

    $id_siswa = $siswa['id_siswa'];

    if ($status != "") {

        // Simpan ke database
       $tanggal = date("Y-m-d");

        mysqli_query($koneksi, "INSERT INTO presensi (id_siswa, tanggal, jam, status) VALUES ('$id_siswa', '$tanggal', NULL, '$status')");
        
        $reply = "Pesan diterima sebagai $status ✅";

    } else {
        $reply = "Format salah!\nGunakan: izin / sakit / terlambat";
    }

} else {
    $reply = "Nomor Telegram belum terdaftar ❌";
}

// ======================
// KIRIM BALASAN KE TELEGRAM
// ======================
file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode($reply));

?>