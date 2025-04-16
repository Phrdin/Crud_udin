<?php
include 'koneksi.php';

// Ambil data mahasiswa
$sql = "SELECT * FROM mahasiswa INNER JOIN jurusan ON mahasiswa.jurusan_id = jurusan.jurusan_id";
$result = $conn->query($sql);

// Ambil data jurusan
$sqlJurusan = "SELECT * FROM jurusan";
$resultJurusan = $conn->query($sqlJurusan);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa & Jurusan</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f7e7ce; /* krem */
            font-family: 'Poppins', sans-serif;
        }

        .container {
            margin-top: 60px;
        }

        h2 {
            color: #003366; /* biru navy */
            font-weight: 600;
            text-align: center;
            margin-bottom: 30px;
        }

        .btn-custom {
            background-color: #003366;
            color: white;
            border-radius: 8px;
            padding: 8px 20px;
            font-size: 14px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #002244;
        }

        .table {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        }

        .table th {
            background-color: #cce5ff; /* biru muda */
            color: #003366;
            text-align: center;
            font-weight: 600;
        }

        .table td {
            vertical-align: middle;
            text-align: center;
        }

        .action-btn .btn {
            margin: 0 3px;
        }

        .section {
            margin-top: 60px;
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Data Mahasiswa -->
        <h2>Data Mahasiswa</h2>
        <div class="text-end mb-3">
            <a href="tambah_mahasiswa.php" class="btn btn-custom">+ Tambah Data</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Email</th>
                        <th>Nomor</th>
                        <th>Jurusan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $row['id']; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['nim']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['nomor']; ?></td>
                            <td><?= $row['nama_jurusan']; ?></td>
                            <td class="action-btn">
                                <a href="edit_mahasiswa.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="hapus_mahasiswa.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- Data Jurusan -->
        <div class="section">
            <h2>Data Jurusan</h2>
            <div class="text-end mb-3">
                <a href="tambah_jurusan.php" class="btn btn-custom">+ Tambah Jurusan</a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $resultJurusan->fetch_assoc()) { ?>
                            <tr>
                                <td><?= $row['jurusan_id']; ?></td>
                                <td><?= $row['nama_jurusan']; ?></td>
                                <td class="action-btn">
                                    <a href="edit_jurusan.php?jurusan_id=<?= $row['jurusan_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="hapus_jurusan.php?jurusan_id=<?= $row['jurusan_id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

<?php $conn->close(); ?>
