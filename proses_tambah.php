<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST['nama']);
    $nim = trim($_POST['nim']);
    $email = trim($_POST['email']);
    $nomor = trim($_POST['nomor']);
    $jurusan_id = trim($_POST['jurusan']);

    // Validasi input agar tidak ada yang kosong
    if (empty($nama) || empty($nim) || empty($email) || empty($nomor) || empty($jurusan_id)) {
        echo "<script>alert('Semua field harus diisi!'); window.history.back();</script>";
        exit();
    }

    // Gunakan prepared statement untuk mencegah SQL Injection
    $stmt = $conn->prepare("INSERT INTO mahasiswa (nama, nim, email, nomor, jurusan_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $nama, $nim, $email, $nomor, $jurusan_id);

    if ($stmt->execute()) {
        echo "<script>alert('Data mahasiswa berhasil ditambahkan!'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Akses tidak diizinkan!";
}
?>