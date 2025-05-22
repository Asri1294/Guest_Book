<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // mengambil waktu dari input hidden (bukan dari server)
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    
    // Sanitasi data lainnya
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $instansi = mysqli_real_escape_string($conn, $_POST['instansi']);
    $tujuan = mysqli_real_escape_string($conn, $_POST['tujuan']);

    // Menyimpan ke database
    $stmt = $conn->prepare("INSERT INTO buku_tamu (nama, instansi, tujuan, tanggal, waktu) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nama, $instansi, $tujuan, $tanggal, $waktu);
    
    if ($stmt->execute()) {
        header("Location: daftar_tamu.php");
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
    $conn->close();
}
?>