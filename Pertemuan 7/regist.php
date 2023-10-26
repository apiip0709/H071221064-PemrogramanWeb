<?php

include 'connection/connect.php';

if (isset($_POST['submit'])) {
    include 'config/insert.php';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>

    <!-- Custom css file link -->
    <link rel="stylesheet" href="css/registStyle.css">
</head>

<body>
    <div class="form-container">
        <form action="" method="post">

            <h3>Registrasi</h3>

            <input type="text" name="nama" required placeholder="Masukkan Nama Lengkap anda">
            <input type="text" name="nim" required placeholder="Masukkan NIM anda">
            <input type="text" name="prodi" required placeholder="Masukkan Prodi anda">
            <input type="password" name="password" required placeholder="Masukkan Password anda">
            <input type="password" name="cpassword" required placeholder="Konfirmasi Password anda">

            <select name="tipe_pengguna">
                <option value="mahasiswa">mahasiswa</option>
                <option value="admin">admin</option>
            </select>

            <input type="submit" name="submit" value="Daftar Sekarang" class="form-btn">

            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                };
            };
            ?>

            <p>sudah memiliki akun? <a href="login.php">login sekarang</a></p>
        </form>
    </div>
</body>

</html>