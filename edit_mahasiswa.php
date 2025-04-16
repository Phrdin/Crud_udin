<?php
include 'koneksi.php';

$id = $_GET['id'];

$sql = "SELECT mahasiswa.*, jurusan.*
        FROM mahasiswa 
        JOIN jurusan ON mahasiswa.jurusan_id = jurusan.jurusan_id 
        WHERE mahasiswa.id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

$query_jurusan = "SELECT jurusan_id, nama_jurusan FROM jurusan";
$result_jurusan = $conn->query($query_jurusan);

$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-lg p-4" style="max-width: 600px; margin: auto; background: #F5F5DC;">
            <h2 class="text-center text-primary mb-4">Edit Data Mahasiswa</h2>
            <form action="proses_edit.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

                <div class="mb-3">
                    <label class="form-label">Nama:</label>
                    <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">NIM:</label>
                    <input type="text" name="nim" class="form-control" value="<?php echo $data['nim']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $data['email']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nomor:</label>
                    <input type="text" name="nomor" class="form-control" value="<?php echo $data['nomor']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jurusan:</label>
                    <select name="jurusan" class="form-select" required>
                        <option value="">Pilih Jurusan</option>
                        <?php while ($row = $result_jurusan->fetch_assoc()) : ?>
                            <option value="<?= $row['jurusan_id']; ?>"
                                <?= ($row['jurusan_id'] == $data['jurusan_id']) ? 'selected' : ''; ?>>
                                <?= $row['nama_jurusan']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>