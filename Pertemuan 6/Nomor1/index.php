<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jualan Kaki Lima</title>

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Box Icons -->
    <script src="https://kit.fontawesome.com/d8e82aa8d9.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <div class="sidehead">
                <div class="dots">
                    <i class='fas fa-circle'></i>
                    <i class='fas fa-circle' style="color: #333"></i>
                    <i class='fas fa-circle'></i>
                </div>
                <div>
                    <a href="index.php">
                        <i class="fas fa-house"></i>
                    </a>
                </div>
            </div>
            <hr style="margin: 15px; border: 1px solid #eee;">
            <div class="sidebody" style="height: 69vh;">
                <div class="searchbar">
                    <form method="get">
                        <input id="searchbar" type="text" name="value" placeholder="Search..." autocomplete="off" required>
                        <button type="submit" class="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="sidefoot">
                <hr style="margin: 15px 0; border:1px solid #eee;">
                <div class="social-icons">
                    <a href="https://www.instagram.com/apiip.s" target="_blank">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="https://www.facebook.com/AndiApiip" target="_blank">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                    <a href="https://github.com/apiip0709" target="_blank">
                        <i class="fa-brands fa-github"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="data">
            <div class="header">
                <p>SELAMAT MELIHAT</p>
            </div>
            <div class="body">
                <div class="root">
                    <?php
                    // mengambil data dari file berbeda
                    include 'data.php';

                    // Menerima dan memproses data 
                    if ($_SERVER["REQUEST_METHOD"] == "GET") {
                        // mengambil nilai inputan dan dicocokkan dengan function search
                        $searchValue = isset($_GET["value"]) ? $_GET["value"] : "";
                        $searchResults = search($data, $searchValue);

                        // menampilkan data yang sesuai dengan search
                        if (!empty($searchValue)) {
                            if (!empty($searchResults)) {
                                addData($searchResults);
                            } else {
                                echo "Hasil Pencarian tidak Ditemukan";
                            }
                        } else {
                            addData($data);
                        }
                    }

                    // Untuk Mencocokkan data yang ada dan inputan yang diinginkan
                    function search($data, $value)
                    {
                        $results = [];
                        $value = strtolower($value);
                        foreach ($data as $item) {
                            foreach ($item as $content) {
                                $content = strtolower($content);
                                if ($content == $value) {
                                    $results[] = $item;
                                    break;
                                }
                            }
                        }
                        return $results;
                    }

                    // Untuk menampilkan data
                    function addData($data)
                    {
                        foreach ($data as $item) {
                            echo "<div class='box'>";
                            echo "<div class='img-box'>";
                            echo "<img class='images' src=" . $item["img"] . "></img>";
                            echo "</div>";
                            echo "<div class='bottom'>";
                            echo "<p>Nama Barang: " . $item["nama_barang"] . "</p>";
                            echo "<p>Harga: " . $item["harga"] . "</p>";
                            echo "<p>Stok: " . $item["stok"] . "</p>";
                            echo "<p>Jenis: " . $item["jenis"] . "</p>";
                            echo "</div>";
                            echo "</div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>