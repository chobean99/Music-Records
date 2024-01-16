<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header>
        <div id="nav-menu">
            <div class="nav-item"><a href="home.php">Početna</a></div>
            <div class="nav-item"><a href="mojProfil.php">Moj profil</a></div>
            <div class="nav-item"><a href="logout.php">Odjavi se</a></div>
        </div>
    </header>
    <?php 
        $mysqli = new mysqli("localhost", "root", "");

        $cdb = "CREATE DATABASE IF NOT EXISTS albumi";
        $mysqli->query($cdb);

        $mysqli->select_db("albumi");

        $tableQuery = "CREATE TABLE IF NOT EXISTS album(
                       naziv VARCHAR(50) PRIMARY KEY,
                       autor VARCHAR(50) NOT NULL,
                       godina_izdanja DATE NOT NULL,
                       cena FLOAT NOT NULL,
                       stanje INT(5) NOT NULL
                       )";
        $mysqli->query($tableQuery);

        
            
        $sql = ("INSERT INTO album (naziv, autor, godina_izdanja, cena, stanje) VALUES ('other side of the moon', 'pink floyd', '1973', 6000.00, 20)");
        $mysqli->query($sql);   

        $sql = ("INSERT INTO album (naziv, autor, godina_izdanja, cena, stanje) VALUES ('strange trails', 'lord huron', '2015', 5000.00, 20)");
        $mysqli->query($sql);

        $sql = ("INSERT INTO album (naziv, autor, godina_izdanja, cena, stanje) VALUES ('foreplay', 'mild orange', '2018', 4500.00, 20)");
        $mysqli->query($sql);

        $imeAlbuma = $_GET['ime'];

        if($imeAlbuma == "other side of the moon") {
            echo"<img src='image1.jpg' class='image'><br><br>";
            $sql = ("SELECT * FROM album WHERE naziv='other side of the moon'");
            $result = $mysqli->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    echo "Naziv: " . $row['naziv'] . "<br>" . "Autor: " . $row["autor"] ."<br>" . "Godina izdanja: " . $row['godina_izdanja'] . '<br>' . "Cena: " . $row['cena'] . '<br>' . "Stanje: " . $row['stanje'];
                }
            }
            echo "<br><br><button onclick='updateDatabase()'>Naruci</button>
            <script>
                var naruceniAlbumi;

                function updateDatabase() {
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', 'update.php?ime=other side of the moon', true);
                    xhr.send();
                    location.reload();
                }
            </script>";
        }

        if($imeAlbuma == "strange trails") {
            echo"<img src='image2.jpg' class='image'><br><br>";
            $sql = ("SELECT * FROM album WHERE naziv='strange trails'");
            $result = $mysqli->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    echo "Naziv: " . $row['naziv'] . "<br>" . "Autor: " . $row["autor"] ."<br>" . "Godina izdanja: " . $row['godina_izdanja'] . '<br>' . "Cena: " . $row['cena'] . '<br>' . "Stanje: " . $row['stanje'];
                }
            }
            echo "<br><br><button onclick='updateDatabase()'>Naruci</button>
            <script>
                var naruceniAlbumi;

                function updateDatabase() {
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', 'update.php?ime=strange trails', true);
                    xhr.send();
                    location.reload();
                }
            </script>";
        }

        if($imeAlbuma == "foreplay") {
            echo"<img src='image3.jpg' class='image'><br><br>";
            $sql = ("SELECT * FROM album WHERE naziv='foreplay'");
            $result = $mysqli->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    echo "Naziv: " . $row['naziv'] . "<br>" . "Autor: " . $row["autor"] ."<br>" . "Godina izdanja: " . $row['godina_izdanja'] . '<br>' . "Cena: " . $row['cena'] . '<br>' . "Stanje: " . $row['stanje'];
                }
            }
            echo "<br><br><button onclick='updateDatabase()'>Naruci</button>
            <script>
                var naruceniAlbumi;

                function updateDatabase() {
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', 'update.php?ime=foreplay', true);
                    xhr.send();
                    location.reload();
                }
            </script>";
        }
    ?>
</body>
</html>