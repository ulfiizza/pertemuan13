<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Siswa</title>
    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Form Pendaftaran Siswa Baru</h2>
    <form action="proses_daftar.php" method="POST">
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Jenis Kelamin:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jk" id="laki_laki" value="Laki-laki" required>
                <label class="form-check-label" for="laki_laki">Laki-laki</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jk" id="perempuan" value="Perempuan" required>
                <label class="form-check-label" for="perempuan">Perempuan</label>
            </div>
        </div>

        <div class="form-group">
            <label for="agama">Agama:</label>
            <select id="agama" name="agama" class="form-control" required>
                <option value="">Pilih Agama</option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katolik">Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Konghucu">Konghucu</option>
            </select>
        </div>

        <div class="form-group">
            <label for="sekolah_asal">Sekolah Asal:</label>
            <input type="text" id="sekolah_asal" name="sekolah_asal" class="form-control" required placeholder="Nama Sekolah">
        </div>

        <button type="submit" class="btn btn-primary">Daftar</button>
    </form>
</div>

<!-- Link Bootstrap JS (untuk beberapa fitur Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>