<?php
include 'koneksi.php';
$id = $_GET['id'];

$sql = "DELETE FROM mahasiswa WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("location: index.php");
    exit;
}  else {
    echo "error: " . $conn->error;
}

$conn->close();