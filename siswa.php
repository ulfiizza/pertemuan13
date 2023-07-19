<?php
// Pastikan file ini berada di tempat yang sama dengan file "koneksi.php"
require 'koneksi.php';

// Query untuk mendapatkan data pendaftaran siswa
$sql = "SELECT * FROM data";
$result = $conn->query($sql);

// Mendapatkan jumlah total data
$total_data = $result->num_rows;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pendaftaran Siswa</title>
    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Tambahkan link ke Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Data Siswa Terdaftar</h2>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Tombol untuk tambah data baru -->
        <a href="form.php" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i> Tambah Data Baru
        </a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Sekolah Asal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                $no = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $no . "</td>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td>" . $row['alamat'] . "</td>";
                    echo "<td>" . $row['jk'] . "</td>";
                    echo "<td>" . $row['agama'] . "</td>";
                    echo "<td>" . $row['sekolah_asal'] . "</td>";
                    echo "<td>";
                    echo "<a href='action.php?action=edit&id=" . $row['no'] . "' class='btn btn-primary mr-2'>Edit</a>";
                    echo "<a href='action.php?action=delete&id=" . $row['no'] . "' class='btn btn-danger' onclick=\"return confirm('Apakah Anda Yakin Akan Menghapus Data Ini?')\">Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                    $no++;
                }
            } else {
                echo "<tr><td colspan='7' class='text-center'>Tidak ada data</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <p class="text-center">Total data: <?php echo $total_data; ?></p>
</div>

<!-- Link Bootstrap JS (untuk beberapa fitur Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
