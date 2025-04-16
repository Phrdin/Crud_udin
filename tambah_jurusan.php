<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Jurusan</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f7e7ce; /* Warna krem */
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 50px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            max-width: 400px;
        }

        h2 {
            color: #0d6efd; /* Warna biru */
            text-align: center;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #0d6efd;
            border: none;
            padding: 10px;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
        }

        .form-control:focus {
            border-color: #0a4275; /* Biru navy */
            box-shadow: 0 0 5px rgba(10, 66, 117, 0.5);
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Tambah Data Jurusan</h2>
        <form action="proses_jurusan.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Nama Jurusan:</label>
                <input type="text" name="nama_jurusan" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>