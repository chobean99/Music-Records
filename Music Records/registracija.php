<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div id="nav-menu">
            <div class="nav-item"><a href="index.php">Početna</a></div>
            <div class="nav-item"><a href="uloguj se.php">Uloguj se</a></div>
            <div class="nav-item"><a href="registracija.php">Registracija</a></div>
        </div>
    </header>
    <form action="main.php" method="POST">
        <label for="ime">Ime:</label><br>
        <input type="text" id="ime" name="ime" required><br><br>

        <label for="prezime">Prezime:</label><br>
        <input type="text" id="prezime" name="prezime" required><br><br>

        <label for="email">E-mail:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="pol">Pol:</label><br>
        <input type="radio" name="pol" value="M" required> M <br>
        <input type="radio" name="pol" value="Ž" required> Ž <br><br>

        <label for="tel">Broj telefona:</label><br>
        <input type="text" name="tel" required><br><br>

        <label for="adresa">Adresa:</label><br>
        <input type="text" id="adresa" name="adresa" required><br><br>

        <label for="sifra">Šifra:</label><br>
        <input type="password" id="sifra" name="sifra" required><br><br>

        <input type="submit" value="submit">
    </form>
</body>
</html>