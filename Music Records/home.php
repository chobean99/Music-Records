<?php 
session_start();

if (isset($_SESSION["userEmail"]) && isset($_SESSION["userID"])) {

?>
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
    <h1>Diskografska kuca Music Records</h1><br>
    <h2>Dobrodosli, <?php echo $_SESSION['username'];?>.
    <div id="wrapper">
        <a href="korpa.php?ime=other side of the moon"><img src="image1.jpg" class="image"></a>
        <a href="korpa.php?ime=strange trails"><img src="image2.jpg" class="image"></a>
        <a href="korpa.php?ime=foreplay"><img src="image3.jpg" class="image"></a>
    </div>

</body>
</html>

<?php
} else {
    header("Location:index.php");
    exit;
} 
?>