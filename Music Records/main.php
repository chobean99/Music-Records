<?php
abstract class Osoba {
    public $ime;
    public $prezime;
    public $pol;

    public function __construct($ime, $prezime, $pol) {
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->pol = $pol;
    }
    public function ispis() {
        echo"Ime: {$this->ime}<br>Prezime: {$this->prezime} ";
    }

 }

class Korisnik extends Osoba {
    public $pol;
    public $email;
    public $tel;
    public $adresa;
    public $sifra;

    public function __construct($ime, $prezime, $pol, $email, $tel, $adresa, $sifra) {
        parent::__construct($ime, $prezime, $pol); 
        $this->email = $email;
        $this->tel = $tel;
        $this->adresa = $adresa;
        $this->sifra = $sifra; 
    }

    public function korisnickiPodaci() {
        echo"<br>Pol: " . $this->pol . "<br>email: " . $this->email . "<br>Broj telefona: " . $this->tel . "<br>Adresa: " . "<br>Sifra: " . $this->sifra;
    }
 }

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $ime = htmlspecialchars($_POST['ime']);
    $prezime = htmlspecialchars($_POST['prezime']);
    $pol = htmlspecialchars($_POST['pol']);
    $email = htmlspecialchars($_POST['email']);
    $tel = htmlspecialchars($_POST['tel']);
    $adresa = htmlspecialchars($_POST['adresa']);
    $sifra = htmlspecialchars($_POST['sifra']);

    if(!ctype_alpha($ime) || !ctype_alpha($prezime)) {
        echo "First and last name cant contain numbers.";
        exit;
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Incorrect E-mail adress!";
        exit;
    }

    $mysqli = new mysqli("localhost", "root", "");
    if($mysqli->connect_errno) {
        echo "Error connecting.";
        exit;
    }

    $cdb = "CREATE DATABASE IF NOT EXISTS korisnik";
    $mysqli->query($cdb);

    $mysqli->select_db("korisnik");

    $tableQuery = "CREATE TABLE IF NOT EXISTS podaci(
                   ID INT AUTO_INCREMENT PRIMARY KEY,
                   ime VARCHAR(30) NOT NULL,
                   prezime VARCHAR(30) NOT NULL,
                   pol CHAR(1) NOT NULL,
                   email VARCHAR(50) NOT NULL,
                   tel VARCHAR(20) NOT NULL,
                   adresa VARCHAR (40) NOT NULL,
                   sifra VARCHAR (30) NOT NULL
                   )";

    $mysqli->query($tableQuery);
    $sql = "INSERT INTO podaci (ime, prezime, pol, email, tel, adresa, sifra)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sssssss",$ime, $prezime, $pol, $email, $tel, $adresa, $sifra);
    $stmt->execute();
    if($stmt->affected_rows > 0) {
        $korisnik = new Korisnik($ime, $prezime, $pol, $email, $tel, $adresa, $sifra);
        echo "<script>alert('Account created successfully!')</script>";
        echo $korisnik->ispis();
        echo $korisnik->korisnickiPodaci();
        echo "<br><br><a href='index.php'><input type='button'></a>";
    } else  {
        echo "<script>alert('Something went wrong.');</script>";
    }
    $mysqli->close();
}
?>