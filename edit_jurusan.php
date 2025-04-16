<?php
include 'koneksi.php';

$jurusan_id = $_GET['jurusan_id'];

$sql = "SELECT * FROM jurusan WHERE jurusan_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $jurusan_id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Jurusan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-lg p-4" style="max-width: 500px; margin: auto; background: #F5F5DC;">
            <h2 class="text-center text-primary mb-4">Edit Data Jurusan</h2>
            <form action="proses_edit_jurusan.php" method="POST">
                <input type="hidden" name="jurusan_id" value="<?php echo $data['jurusan_id']; ?>">

                <div class="mb-3">
                    <label class="form-label">Nama Jurusan:</label>
                    <input type="text" name="nama_jurusan" class="form-control" value="<?php echo $data['nama_jurusan']; ?>" required>
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