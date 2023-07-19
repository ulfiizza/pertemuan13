<?php
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jk'];
    $agama = $_POST['agama'];
    $sekolah_asal = $_POST['sekolah_asal'];

    // Query untuk menyimpan data siswa ke dalam tabel pendaftaran_siswa
    $sql = "INSERT INTO data (nama, alamat, jk, agama, sekolah_asal) 
            VALUES ('$nama', '$alamat', '$jk', '$agama', '$sekolah_asal')";

    if ($conn->query($sql) === TRUE) {
        // Pendaftaran berhasil
        echo '<script>
                alert("Pendaftaran Berhasil!");
                window.location.href = "siswa.php";
            </script>';
        exit; // Keluar dari script PHP agar tidak ada output lain yang tampil
    } else {
        // Terjadi kesalahan dalam pendaftaran
        echo '<script>
                alert("Error: Terjadi masalah dalam pendaftaran.");
                window.location.href = "form.php";
            </script>';
        exit; // Keluar dari script PHP agar tidak ada output lain yang tampil
    }
}

// Tutup koneksi setelah selesai
$conn->close();
?>
