<?php
session_start();
include '../koneksi.php';

$email = $_POST['email']; //ngambil email inputan dari user
$password = sha1($_POST['password']); //ngambil inputan password dari user

$queryLogin = mysqli_query($connection, "SELECT * FROM user WHERE email='$email'"); //query untuk mencocokkan email yg diinputkan user dengan database

if (mysqli_num_rows($queryLogin) > 0) {
    $rowUser = mysqli_fetch_assoc($queryLogin); //mysqli_fetch_assoc adalah sebuah fungsi dalam PHP yang digunakan untuk mengambil data dari database MySQL
    if ($rowUser['password'] == $password) {
        $_SESSION['email'] = $rowUser['email']; //mengirimkan email user
        $_SESSION['ID'] = $rowUser['id']; //mengirimkan id user
        header("location: ../views/dashboard.php?login=berhasil");
    } else {
        header("location: ../views/login.php?error=gagal");
    }
}

// 1. ambil dulu inputan dari user email dan password
// 2. ambil data dari database berdasarkan email yg sudah dimasukkan
// 3. validasi jika datanya ada maka masukkan data nya ke dalam variable 
// 4. lalu cek passwordnya apakah sudah sesuai dengan data yg ada di dalam database
// 5. kalau datanya sama kirim kan email dan id
// 6. lalu arahkan ke halaman dashboard
