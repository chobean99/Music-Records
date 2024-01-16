<?php
session_start();

try {
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $sifra = $_POST["sifra"];

    $mysqli = new mysqli("localhost", "root", "", "korisnik");
    if($mysqli->connect_errno) {
        echo "<script>alert('Error connecting.')</script>";
        exit;
    }

    $tableQuery = "SELECT * FROM podaci WHERE email='$email' AND sifra='$sifra'";
    $result = $mysqli->query($tableQuery);
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            echo "Ime: " . $row['ime'] . "<br>" . "Prezime: " . $row["prezime"] ."<br>" . "Adresa: " . $row['adresa'] . '<br>' . "Broj telefona: " . $row['tel'] . '<br>' . "Pol: " . $row['pol'];
            $_SESSION['userID'] = $row['ID'];
            $_SESSION['userEmail'] = $row['email'];
            $_SESSION['username'] = $row['ime'];
            $_SESSION['userlastname'] = $row['prezime'];
            header('Location:home.php');
            exit;
        }
    } 
    $mysqli->close();
} 
} catch (Exception $e) {
    echo "". $e->getMessage();
}  
?>