<?php
include 'koneksi.php';

$jurusan_id = $_GET['jurusan_id'];

$sql = "DELETE FROM jurusan WHERE jurusan_id=$jurusan_id";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
