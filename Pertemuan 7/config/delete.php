<?php

if (isset($_GET['id'])) {
    if (isset($_GET['hal'])) {
        if (isset($_GET['hal']) == "hapus") {
            $hapus = mysqli_query($conn, " DELETE FROM tb_pengguna WHERE id = '$_GET[id]' ");

            if ($hapus) {
                echo "<script> alert('Data Berhasil di Hapus!'); window.location.href = 'index.php'</script>";
            } else {
                echo "<script> alert('Data Gagal di Hapus!'); window.location.href = 'index.php'</script>";
            }
        }
    }
}


?>