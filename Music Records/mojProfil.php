<?php 
include("main.php"); 
session_start();      
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moj profil</title>
</head>
<body>
    <header>
        <div id="nav-menu">
            <div class="nav-item"><a href="home.php">Početna</a></div>
            <div class="nav-item"><a href="mojProfil.php">Moj profil</a></div>
            <div class="nav-item"><a href="logout.php">Odjavi se</a></div>
        </div>
    </header>
    <section>
        <?php
            $mysqli = new mysqli("localhost", "root", "", "korisnik");

            $query="SELECT * FROM podaci WHERE ID='$_SESSION[userID]'";
            $result = $mysqli->query($query);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $currentUser = new Korisnik($row['ime'], $row['prezime'], $row['pol'], $row['email'], $row['tel'], $row['adresa'], $row['sifra']);
                    $currentUser->ispis();
                    $currentUser->korisnickiPodaci();
                }
            }
        ?>
    </section>
    
</body>
</html>