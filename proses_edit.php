<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $email = $_POST['email'];
    $nomor = $_POST['nomor'];
    $jurusan_id = $_POST['jurusan'];

    // Validasi input agar tidak ada yang kosong
    if (empty($id) || empty($nama) || empty($nim) || empty($email) || empty($nomor) || empty($jurusan_id)) {
        echo "<script>alert('Semua field harus diisi!'); window.history.back();</script>";
        exit();
    }

    // Query update data mahasiswa
    $sql = "UPDATE mahasiswa SET nama='$nama', nim='$nim', email='$email', nomor='$nomor', jurusan_id='$jurusan_id' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data mahasiswa berhasil diperbarui!'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Akses tidak diizinkan!";
}
?>
