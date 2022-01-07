<?php $pdo = new PDO('mysql:host=localhost;dbname=mon_carnet', "root", "root");
$requestvaccintype = $pdo->prepare("SELECT * FROM `type_vaccin`"); //Préparer
$requestvaccintype->execute(); //Executer 
$vaccinstype = $requestvaccintype->fetchAll();
session_start();

if (!empty($_POST["nom"])) {
    $nom = $_POST["nom"];

    $insertvaccin = $pdo->prepare("INSERT INTO type_vaccin (nom_vaccin) VALUES ('$nom')");
    $insertvaccin->execute();
    header('Location: gestion.php');
}

if (!empty($_POST['supprimer_x']) && !empty($_POST["idinput"])) {
    $idinput = $_POST["idinput"];


    $suppvaccin = $pdo->prepare("DELETE FROM type_vaccin WHERE id = '$idinput' ");
    $suppvaccin->execute();
    header('Location: gestion.php');
}

if (!empty($_POST["ajouter_modif"])) {
    $idinputmodif = $_POST["idinputmodif"];
    $nom = $_POST['nom_modif'];
    $req = $pdo->prepare("UPDATE `type_vaccin` SET `nom_vaccin` = '$nom' WHERE id='$idinputmodif' ");
    $req->execute();
    header('Location: gestion.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="footer.css">
    <title>Document</title>
</head>

<body>
    <?php include("header.php") ?>

    <div class="vaccin">
        <form action="" method="POST" class="ajoutvaccin">
            <p>Nom du vaccin</p>
            <input type="text" name="nom">
            <input type="submit" class=" submit contour" value="Ajouter">

        </form>
    </div>


    <h1>Gestion des Vaccins</h1>
    <div class="tableau">

        <?php foreach ($vaccinstype as $vaccintype) { ?>
            <table>
                <tr><?php echo $vaccintype["nom_vaccin"] ?>
                    <div class="option-vaccin">
                        <form action="" method="POST">
                            <input type="text" name="idinput" hidden value="<?php echo $vaccintype['id'] ?>">
                            <input type="submit" class="modif" name="modifier" src="SM_icons/modify.png">
                            <input type="image" class="delete" name="supprimer" src="SM_icons/trash.png">
                        </form>
                    </div>
                </tr>
            </table>

        <?php } ?>
    </div>
    <?php

    if (!empty($_POST['modifier']) && !empty($_POST["idinput"])) {
        $idinput = $_POST["idinput"];

        $requestvaccinmodif = $pdo->prepare("SELECT * FROM `type_vaccin` WHERE id = '$idinput'");
        $requestvaccinmodif->execute();
        $vaccinmodif = $requestvaccinmodif->fetch();
    ?>
        <form action="" method="POST">
            <input class="modifier" type="text" name="nom_modif" value="<?php echo $vaccinmodif['nom_vaccin'] ?>">
            <input type="text" name="idinputmodif" hidden value="<?php echo $vaccinmodif['id'] ?>">
            <input class=" submit" type="submit" name="ajouter_modif" value=" Ajouter">
        </form>

    <?php } ?>



    <?php include("footer.php") ?>
</body>

</html>