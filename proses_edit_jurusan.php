<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jurusan_id = $_POST['jurusan_id'];
    $nama_jurusan = $_POST['nama_jurusan'];

    // Validasi jika input kosong
    if (empty($jurusan_id) || empty($nama_jurusan)) {
        echo "Data tidak boleh kosong!";
        exit();
    }

    // Update data
    $sql = "UPDATE jurusan SET nama_jurusan='$nama_jurusan' WHERE jurusan_id='$jurusan_id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data jurusan berhasil diperbarui!'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Akses tidak diizinkan!";
}
?>