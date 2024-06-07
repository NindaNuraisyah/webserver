<?php
header("Content-Type: application/json");

include 'db_config.php';

$data = json_decode(file_get_contents("php://input"));

if (!isset($data->id) || !isset($data->name) || !isset($data->email) || !isset($data->nim) || !isset($data->nohp) || !isset($data->alamat)) {
    die(json_encode(["error" => "Invalid input"]));
}

$id = $koneksi->real_escape_string($data->id);
$name = $koneksi->real_escape_string($data->name);
$email = $koneksi->real_escape_string($data->email);
$nim = $koneksi->real_escape_string($data->nim);
$nohp = $koneksi->real_escape_string($data->nohp);
$alamat = $koneksi->real_escape_string($data->alamat);


$sql = "UPDATE users SET name='$name', email='$email', nim='$nim', nohp='$nohp', alamat='$alamat' WHERE id=$id";

if ($koneksi->query($sql) === TRUE) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["error" => $koneksi->error]);
}

$koneksi->close();
