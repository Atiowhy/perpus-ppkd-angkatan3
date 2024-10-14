<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'angkatan3_belajar';

$connection = mysqli_connect($host, $username, $password, $database);
if (!$connection) {
    echo 'koneksi gagal';
}
