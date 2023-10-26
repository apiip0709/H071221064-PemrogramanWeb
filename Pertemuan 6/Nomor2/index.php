<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="box-card">
            <h1 class="title">Form</h1>
            <form class="form" method="post">
                <div class="input-box">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" autocomplete="off" required>
                </div>

                <div class="input-box">
                    <label for="usia">Usia</label>
                    <input type="number" id="usia" name="usia" autocomplete="off" required>
                </div>

                <div class="input-box">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" autocomplete="off" required>
                </div>

                <div class="input-box">
                    <label for="date">Tanggal Lahir</label>
                    <input type="date" id="date" name="date" required>
                </div>

                <div class="input-box">
                    <label for="gender">Jenis Kelamin</label>

                    <div class="baris">
                        <input type="radio" id="laki" name="gender" value="Laki-laki" checked>
                        <label for="laki">Laki-laki</label>

                        <input type="radio" id="perempuan" name="gender" value="Perempuan">
                        <label for="perempuan">Perempuan</label>
                    </div>
                </div>

                <div class="input-box">
                    <label for="skill">Bahasa yang Dikuasai</label>

                    <div class="baris">
                        <input type="checkbox" id="java" name="skill[]" value="Java">
                        <label for="java">Java</label>

                        <input type="checkbox" id="python" name="skill[]" value="Python">
                        <label for="python">Python</label>

                        <input type="checkbox" id="html" name="skill[]" value="HTML">
                        <label for="html">HTML</label>

                        <input type="checkbox" id="css" name="skill[]" value="CSS">
                        <label for="css">CSS</label>

                        <input type="checkbox" id="javascript" name="skill[]" value="JavaScript">
                        <label for="javascript">JavaScript</label>

                        <input type="checkbox" id="php" name="skill[]" value="PHP">
                        <label for="php">PHP</label>
                    </div>
                </div>
                <div class="submit-box">
                    <input type="submit" value="Submit" class="submit">
                </div>
            </form>
            <hr style="margin: 15px 0; border:1px solid black; width: 100%;">

            <p id="result" class="result">
                <?php
                // Mengambil data dari form
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // validasi data terisi atau tidak
                    $nama = isset($_POST["nama"]) ? $_POST["nama"] : "";
                    $usia = isset($_POST["usia"]) ? $_POST["usia"] : "";
                    $email = isset($_POST["email"]) ? $_POST["email"] : "";
                    $date = isset($_POST["date"]) ? $_POST["date"] : "";
                    $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
                    $skills = isset($_POST["skill"]) ? $_POST["skill"] : [];

                    // Validasi dari data 
                    if (!empty($nama) && !empty($usia)) {
                        echo "Halo! Perkenalkan nama saya $nama, saya berumur $usia tahun. ";
                    }
                    if (!empty($date) && !empty($gender)) {
                        $dateObj = date_create($date);
                        if ($dateObj !== false) {
                            $day = date_format($dateObj, 'd');
                            $month = date_format($dateObj, 'F');
                            $year = date_format($dateObj, 'Y');

                            echo "Saya lahir pada tanggal $day $month tahun $year. Saya berjenis kelamin $gender. ";
                        }
                    }
                    if (!empty($skills)) {
                        echo "Saat ini saya berhasil menguasai bahasa pemrograman ";
                        $lastIndex = count($skills) - 1;
                        foreach ($skills as $index => $skill) {
                            if ($index === $lastIndex) {
                                echo $skill . ".";
                            } else {
                                echo $skill . ", ";
                            }
                        }
                    } else {
                        echo "Saat ini saya belum menguasai bahasa pemrograman apapun.";
                    }
                }
                ?>
            </p>
        </div>
    </div>
</body>

</html>