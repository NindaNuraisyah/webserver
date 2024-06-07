<?php
$url = $_SERVER['REQUEST_URI'];
$parts = explode('/', $url);
$userId = end($parts);

$server = "localhost";
$username = "root";
$password = "";
$dbname = "db_akademik";

$conn = mysqli_connect($server, $username, $password, $dbname);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$sql = "DELETE FROM users WHERE id = '$userId'";
if (mysqli_query($conn, $sql)) {
    echo "Pengguna dengan ID $userId telah dihapus.";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
