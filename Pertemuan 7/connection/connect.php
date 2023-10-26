<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "db_pengguna";

$required = 'required';
$vnama = "";
$vnim = "";
$vprodi = "";
$vpassword = "";
$vllpass = "";
$vlbpass = "";
$vpengguna = "-Pilih-";
$vledit = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: ". mysqli_connect_error());
}

?>