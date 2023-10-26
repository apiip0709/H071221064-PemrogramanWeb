<?php

@include 'connection/connect.php';

session_start();

if (!isset($_SESSION['nama_mahasiswa']) && !isset($_SESSION['pengguna'])) {
    header('location:login.php');
}

if (isset($_POST['logout'])) {
    include 'config/logout.php';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Mahasiswa</title>

    <link rel="stylesheet" href="css/logoutStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container-logout">
        <button class="logout" onclick="showLogoutPopup()"></button>
    </div>
    <div class="overlay" id="overlay"></div>
    <div class="popup" id="popup">
        <h2>Logout Confirmation</h2>
        <p class="message">Are you sure you want to logout?</p>
        <div class="buttons">
            <form method="post">
                <button type="submit" class="tombolmera" name="logout">Logout</button>
            </form>
        </div>
        <span class="close" onclick="hidePopup()">&times;</span>
    </div>

    <div id="container" class="container">
        <h2 class="mt-3 text-center">Halo Mahasiswa, <span><?php echo $_SESSION['nama_mahasiswa'] ?></span></h2>
        <div class="card mt-3">
            <div class="card-header bg-info text-light">
                DATA MAHASISWA
            </div>
            <div class="card-body">
                <div class="col-md-6 mx-auto">
                    <form action="" method="post">
                        <div class="input-group mb-3">
                            <input type="text" name="tcari" class="form-control" placeholder="Masukkan kata kunci" autocomplete="off">
                            <button class="btn btn-primary" name="bcari" type="submit">Cari</button>
                            <button class="btn btn-danger" name="breset" type="submit">Reset</button>
                        </div>
                    </form>
                </div>

                <table class="table table-striped table-hover table-bordered">
                    <tr>
                        <th>No.</th>
                        <th>Nama Mahasiswa</th>
                        <th>NIM Mahasiswa</th>
                        <th>Prodi Mahasiswa</th>
                    </tr>

                    <?php
                    include 'config/read.php';
                    ?>

                </table>
            </div>
            <div class="card-footer bg-info">

            </div>
        </div>
    </div>

    <script>
        function showLogoutPopup() {
            document.getElementById('overlay').style.display = 'block';
            document.getElementById('popup').style.display = 'block';
            document.getElementById('container').style.display = 'none';
        }

        function hidePopup() {
            document.getElementById('overlay').style.display = 'none';
            document.getElementById('popup').style.display = 'none';
            document.getElementById('container').style.display = 'block';
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>