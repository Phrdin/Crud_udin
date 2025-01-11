<?php
$host = "localhost";
$usename = "root";
$password = "";
$dbname = "kampus";

$conn =  new mysqli($host, $usename, $password, $dbname);

if ($conn->connect_error) {
    die("koneksi gagal: " . $conn->connec_error);

}