<?php
include 'connection/connect.php';

if (isset($_GET['id'])) {
    $tampil = mysqli_query($conn, " SELECT * FROM tb_pengguna WHERE id = '$_GET[id]' ");
    $data = mysqli_fetch_array($tampil);

    if ($data) {
        $vnama = $data['nama'];
        $vnim = $data['nim'];
        $vprodi = $data['prodi'];
        $vpassword = $data['password'];
        $vpengguna = $data['tipe_pengguna'];

        $vledit = "EDIT";
        $vlbpass = "Baru";
        $required = "";
    }

    if (isset($_POST['btnsimpan'])) {
        if (isset($_GET['hal']) == "edit") {
            $nama = mysqli_real_escape_string($conn, $_POST['nama']);
            $nim = mysqli_real_escape_string($conn, $_POST['nim']);
            $prodi = mysqli_real_escape_string($conn, $_POST['prodi']);
            $bpass = isset($_POST['password']) ? $_POST['password'] : "";
            $lpass = isset($_POST['cpassword']) ? $_POST['cpassword'] : "";
            $tipe_pengguna = $_POST['tipe_pengguna'];

            // Kondisi apabila 
            if (empty($bpass) && empty($lpass)) {
                $edit = mysqli_query($conn, "UPDATE tb_pengguna SET 
                    nama = '$nama', nim = '$nim', prodi = '$prodi', tipe_pengguna = '$tipe_pengguna' 
                    WHERE id = '$_GET[id]'");

                if ($edit) {
                    echo "<script>alert('Data Berhasil di Edit!'); window.location.href = 'index.php';</script>";
                } else {
                    $error[] = 'Gagal memperbarui data pengguna!';
                }
            } else {
                if (mysqli_num_rows($tampil) > 0) {
                    // Kata sandi lama cocok, Anda dapat menjalankan perubahan
                    if (!empty($bpass) && !empty($lpass)) {
                        if ($lpass != $bpass) {
                            $error[] = 'kata sandi tidak sesuai!';
                        } else {
                            $bpass = password_hash($bpass, PASSWORD_DEFAULT);
                            $edit = mysqli_query($conn, "UPDATE tb_pengguna SET 
                                nama = '$nama', nim = '$nim', prodi = '$prodi', password = '$bpass', tipe_pengguna = '$tipe_pengguna' 
                                WHERE id = '$_GET[id]'");
    
                            if ($edit) {
                                echo "<script>alert('Data Berhasil di Edit!'); window.location.href = 'index.php';</script>";
                            } else {
                                $error[] = 'Gagal memperbarui data pengguna!';
                            }
                        }
                    } else {
                        $error[] = 'Masukkan Password Baru';
                    }
                } else {
                    $error[] = 'Kata sandi lama tidak cocok!';
                }
            }
        }
    }
}

mysqli_close($conn);
