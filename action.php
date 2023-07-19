<?php
require 'koneksi.php';

if (isset($_GET['action']) && $_GET['action'] === 'edit') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Pastikan hanya melakukan proses edit jika ada data POST yang dikirimkan
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Ambil data yang dikirimkan melalui form edit.php
            $nama_baru = $_POST['nama'];
            $alamat_baru = $_POST['alamat'];
            $jk_baru = $_POST['jk'];
            $agama_baru = $_POST['agama'];
            $sekolah_asal_baru = $_POST['sekolah_asal'];

            // Proses update data ke database
            $sql = "UPDATE data SET nama=?, alamat=?, jk=?, agama=?, sekolah_asal=? WHERE no=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssi", $nama_baru, $alamat_baru, $jk_baru, $agama_baru, $sekolah_asal_baru, $id);

            if ($stmt->execute()) {
                // Redirect ke halaman siswa.php setelah berhasil update data atau hapus data
                header("location: siswa.php");
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            // Query untuk mendapatkan data siswa berdasarkan ID
            $sql = "SELECT * FROM data WHERE no=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                // Tampilkan form edit data
?>
                <!DOCTYPE html>
                <html>

                <head>
                    <title>Edit Data Siswa</title>
                    <!-- Link Bootstrap CSS -->
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                </head>

                <body>
                    <div class="container mt-5">
                        <h2 class="text-center mb-4">Edit Data Siswa</h2>
                        <form method="post">
                            <div class="form-group">
                                <label for="nama">Nama:</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat:</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $row['alamat']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin:</label>
                                <select class="form-control" id="jk" name="jk">
                                    <option value="Laki-laki" <?php if ($row['jk'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                                    <option value="Perempuan" <?php if ($row['jk'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="agama">Agama:</label>
                                <select id="agama" name="agama" class="form-control" required>
                                    <option value="">Pilih Agama</option>
                                    <option value="Islam" <?php if ($row['agama'] == 'Islam') echo 'selected'; ?>>Islam</option>
                                    <option value="Kristen" <?php if ($row['agama'] == 'Kristen') echo 'selected'; ?>>Kristen</option>
                                    <option value="Katolik" <?php if ($row['agama'] == 'Katolik') echo 'selected'; ?>>Katolik</option>
                                    <option value="Hindu" <?php if ($row['agama'] == 'Hindu') echo 'selected'; ?>>Hindu</option>
                                    <option value="Buddha" <?php if ($row['agama'] == 'Buddha') echo 'selected'; ?>>Buddha</option>
                                    <option value="Konghucu" <?php if ($row['agama'] == 'Konghucu') echo 'selected'; ?>>Konghucu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sekolah_asal">Sekolah Asal:</label>
                                <input type="text" class="form-control" id="sekolah_asal" name="sekolah_asal" value="<?php echo $row['sekolah_asal']; ?>">
                            </div>
                            <button type="submit" href="siswa.php" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>

                    <!-- Link Bootstrap JS (untuk beberapa fitur Bootstrap) -->
                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                </body>

                </html>
<?php
            } else {
                echo "Invalid request.";
            }

            $stmt->close();
        }
    }
} elseif (isset($_GET['action']) && $_GET['action'] === 'delete') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Proses hapus data dari database
        $sql = "DELETE FROM data WHERE no=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            // Redirect ke halaman index.php setelah berhasil hapus data
            header("location: siswa.php");
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>