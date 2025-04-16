<?php
include 'koneksi.php';

$nama_jurusan = $_POST['nama_jurusan'];

$sql = "INSERT INTO jurusan (nama_jurusan) VALUES ('$nama_jurusan')";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
