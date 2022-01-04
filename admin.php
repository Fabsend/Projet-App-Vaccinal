<?php
include("pdo.php");


if ($_POST) {
    $prenom = "";


    if (!empty($_POST['prenom'])) {
        $prenom =  $_POST['prenom'];
    }
    $recherche = $pdo->prepare(
        "SELECT * FROM utilisateur WHERE prenom LIKE '$prenom%'"
    );



    $recherche->execute();
    $recherche = $recherche->fetchAll();
    var_dump($recherche);

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stylepageadmin.css">
    <title>Document</title>

    <head>



    </head>

<body>
    <div class="titre-container">
        <h1 class="titre"></h1>
        <h1 class="titrebas"></h1>
    </div>

    <fieldset class="container">
        <form action="" method="POST">


            <input name="prenom" type="text" placeholder="Rechercher un patient " class="st-default-search-input field" />
            <div class="icons-container">
                <div class="icon-search"></div>
                <div class="icon-close">
                    <div class="x-up"></div>
                    <div class="x-down"></div>
                </div>
            </div>
    </fieldset>
    <div class="btn-search">
        <input class="favorite styled" type="submit" value="Rechercher">
    </div>
    </form>
</body>

</html>