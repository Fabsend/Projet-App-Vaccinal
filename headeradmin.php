<?php
$id = $_SESSION["id"];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="headeradmin.css">


    <title>Document</title>
</head>

<body>
    <header>
        <div>

            <a href="carnet.php"><img src="vaccina logo.png" alt="logo"></a>
        </div>
        <div class="buttons">
            <button class="gestionuser"><a href="gestion.php">Gestion des vaccins</a></button>
            <button class="profil"><a href="stats.php">Statistique</a></button>
            <button><a href="Deconnection.php">Déconnexion</a></button>
        </div>

    </header>
</body>

</html>