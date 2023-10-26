<?php
include 'connection/connect.php';

$no = 1;
$isAdmin = false; // Diinisialisasi sebagai bukan admin

// Periksa apakah pengguna masuk sebagai admin
if (isset($_SESSION['pengguna'])) {
    if ($_SESSION['pengguna'] === 'admin') {
        $isAdmin = true;
    } else if ($_SESSION['pengguna'] === 'mahasiswa') {
        $isAdmin = false;
    }
}

if ($isAdmin) {
    if (isset($_POST['bcari'])) {
        $keyword = $_POST['tcari'];
        $read = mysqli_query($conn, " SELECT * FROM tb_pengguna WHERE nim LIKE '%$keyword%' or 
                                                                    nama LIKE '%$keyword%' or 
                                                                    prodi LIKE '%$keyword%' or 
                                                                    tipe_pengguna LIKE '%$keyword%' ORDER BY nim");
    } else {
        $read = mysqli_query($conn, "SELECT * FROM tb_pengguna ORDER BY tipe_pengguna, nim");
    }
} else {
    if (isset($_POST['bcari'])) {
        $keyword = $_POST['tcari'];
        $read = mysqli_query($conn, " SELECT * FROM tb_pengguna WHERE tipe_pengguna = 'mahasiswa' and nim LIKE '%$keyword%' or
                                                                    tipe_pengguna = 'mahasiswa' and nama LIKE '%$keyword%' or 
                                                                    tipe_pengguna = 'mahasiswa' and prodi LIKE '%$keyword%' ORDER BY nim"); 
    } else {
        $read = mysqli_query($conn, "SELECT * FROM tb_pengguna WHERE tipe_pengguna = 'mahasiswa' ORDER BY nim");
    }
}

while ($data = mysqli_fetch_array($read)) {
    // Bagian ini akan diulang untuk setiap baris data
    $nama = $data['nama'];
    $nim = $data['nim'];
    $prodi = $data['prodi'];
    $id = $data['id'];

    echo "<tr>";
    echo "<td> $no </td>";
    echo "<td> $nama </td>";
    echo "<td> $nim </td>";
    echo "<td> $prodi </td>";
    if ($isAdmin) {
        echo "<td>" . $data['tipe_pengguna'] . "</td>";
        echo "<td>";
        echo "<a href='index.php?hal=edit&id=$id' class='btn btn-warning'>Edit</a>" . " ";
        echo "<a href='index.php?hal=hapus&id=$id' class='btn btn-danger'
            onclick=\"return confirm('Apakah anda Yakin akan Hapus Data ini?')\">Hapus</a>";
        echo "</td>";
    }
    echo "</tr>";

    $no++; // Menambah nomor urutan
}

// Tutup koneksi database
mysqli_close($conn);
