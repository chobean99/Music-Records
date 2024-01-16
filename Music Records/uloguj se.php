<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uloguj se</title>
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
    <form action="login.php" method="post">
        <label for="ime">E-mail:</label><br>
        <input type="email" name="email"><br><br>
        <label for="sifra">Šifra:</label><br>
        <input type="password" name="sifra"><br><br>
        <input type="submit" value="submit">
    </form>
</body>
</html>