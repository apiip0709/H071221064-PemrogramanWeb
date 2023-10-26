<?php

include 'connection/connect.php';

session_start();

if (!isset($_SESSION['nama_admin']) && !isset($_SESSION['pengguna'])) {
    header('location: login.php');
}

if (isset($_POST['logout'])) {
    include 'config/logout.php';
}

?>

<?php

include 'connection/connect.php';

if (isset($_POST['btnsimpan'])) {
    if (isset($_GET['hal'])) {
        if ($_GET['hal'] == "edit") {
            include 'config/update.php';
        } elseif ($_GET['hal'] == "hapus") {
            include 'config/delete.php';
        }
    } else {
        include 'config/insert.php';
    }
} else {
    if (isset($_GET['hal'])) {
        if ($_GET['hal'] == "edit") {
            include 'config/update.php';
        } elseif ($_GET['hal'] == "hapus") {
            include 'config/delete.php';
        }
    }

    include 'config/update.php';
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
        <h2 class="text-center mt-3">Halo Admin, <span><?php echo $_SESSION['nama_admin'] ?></span></h2>

        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header bg-info text-light">
                        <span><?= $vledit ?> DATA MAHASISWA</span>
                    </div>
                    <div class="card-body">

                        <form action="" method="POST">

                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Mahasiswa</label>
                                <input class="form-control" type="text" name="nama" value="<?= $vnama ?>" required placeholder="Masukkan Nama Lengkap">
                            </div>

                            <div class="mb-3">
                                <label for="nim" class="form-label">NIM Mahasiswa</label>
                                <input class="form-control" type="text" name="nim" value="<?= $vnim ?>" required placeholder="Masukkan NIM">
                            </div>

                            <div class="mb-3">
                                <label for="prodi" class="form-label">Prodi Mahasiswa</label>
                                <input class="form-control" type="text" name="prodi" value="<?= $vprodi ?>" required placeholder="Masukkan Prodi">
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label id="lpass" for="password" class="form-label">Password <?= $vlbpass ?></label>
                                        <input id="pass" class="form-control" type="password" name="password" <?= $required ?> placeholder="Masukkan Password <?= $vlbpass ?>">
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <label id="lcpass" for="cpassword" class="form-label">Konfirmasi Password <?= $vlbpass ?></label>
                                        <input id="cpass" class="form-control" type="password" name="cpassword" <?= $required ?> placeholder="Konfirmasi Password <?= $vlbpass ?>">
                                    </div>
                                </div>

                            </div>

                            <div class="mb-3">
                                <label for="tipe_pengguna" class="form-label">Pilih Pengguna</label>
                                <select class="form-select" name="tipe_pengguna">
                                    <option value="<?= $vpengguna ?>"><?= $vpengguna ?></option>
                                    <option value="mahasiswa">mahasiswa</option>
                                    <option value="admin">admin</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <hr>
                                <?php
                                if (isset($error)) {
                                    foreach ($error as $error) {
                                        echo '<span class="badge bg-danger text-light">' . $error . '</span>';
                                    };
                                }
                                ?>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary" name="btnsimpan" type="submit">Tambahkan</button>
                                <button class="btn btn-danger" name="btnreset" type="reset" onclick="location.href='index.php';">Kosongkan</button>
                            </div>

                        </form>

                    </div>
                    <div class="card-footer bg-info"></div>
                </div>
            </div>
        </div>

        <div class="card mt-4 mb-4">
            <div class="card-header bg-info text-light">
                DATA MAHASISWA
            </div>
            <div class="card-body">
                <div class="col-md-6 mx-auto">
                    <form action="" method="POST">
                        <div id="search" class="input-group mb-3">
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
                        <th>Tipe Pengguna</th>
                        <th>Edit Data</th>
                    </tr>

                    <?php
                    include 'config/read.php';
                    ?>

                </table>
            </div>
            <div class="card-footer bg-info"></div>
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