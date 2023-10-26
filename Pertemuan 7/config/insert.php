<?php

include 'connection/connect.php';

$nama = mysqli_real_escape_string($conn, $_POST['nama']);
$nim = mysqli_real_escape_string($conn, $_POST['nim']);
$prodi = mysqli_real_escape_string($conn, $_POST['prodi']);
$pass = $_POST['password'];
$cpass = $_POST['cpassword'];
$tipe_pengguna = $_POST['tipe_pengguna'];

$select = " SELECT * FROM tb_pengguna WHERE nim = '$nim' && password = '$pass' ";

$result = mysqli_query($conn, $select);

if (mysqli_num_rows($result) > 0) {
    $error[] = 'pengguna sudah terdaftar!';
} else {
    if ($pass != $cpass) {
        $error[] = 'kata sandi tidak sesuai!';
    } else {
        $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $insert = " INSERT INTO tb_pengguna(nama, nim, prodi, password, tipe_pengguna) 
            VALUES('$nama','$nim','$prodi','$pass','$tipe_pengguna')";
        mysqli_query($conn, $insert);

        echo "<script> alert('Berhasil di Tambahkan!') </script>";
    }
}

mysqli_close($conn);

?>
