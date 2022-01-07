<?php $pdo = new PDO('mysql:host=localhost;dbname=mon_carnet',  "root");
$requestvaccin = $pdo->prepare("SELECT * FROM `vaccin` JOIN utilisateur ON vaccin.utilisateur_id=utilisateur.id"); //Préparer
$requestvaccin->execute(); //Executer 
$vaccins = $requestvaccin->fetchAll();

session_start();

if (!empty($_POST["nom"]) && !empty($_POST["date"])) {
    $nom = $_POST["nom"];
    $date = $_POST["date"];
    $id = $_SESSION["id"];




    $insertvaccin = $pdo->prepare("INSERT INTO vaccin (nomvaccin,date,utilisateur_id) VALUES ('$nom','$date','$id')");
    $insertvaccin->execute();
    header('Location: carnet.php');
}
if (!empty($_POST['supprimer_x']) && !empty($_POST["idinput"])) {
    $idinput = $_POST["idinput"];


    $suppvaccin = $pdo->prepare("DELETE FROM vaccin WHERE idvaccin = '$idinput' ");
    $suppvaccin->execute();
    header('Location: carnet.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="carnet.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="footer.css">
    <title>Vaccina</title>
</head>

<body>
    <?php include("header.php") ?>


    <div class="carnet">
        <div class="infoperso">

            <h4 title="NOM"><?php echo $_SESSION["nom"] ?></h4>


            <h4 title="PRENOM"><?php echo $_SESSION["prenom"] ?></h4>


            <h4 title="E-MAIL"><?php echo $_SESSION["email"] ?></h4>

            <h4 title="DATE DE NAISSANCE"><?php echo $_SESSION["date_de_naissance"] ?></h4>

        </div>

        <div class="vaccin">
            <form action="" method="POST" class="ajoutvaccin">
                <div class="select">
                    <span class="fleche"></span>
                    <select name="nom" class="contour">
                        <option value="">Type de Vaccin</option>
                        <option value="Covid-19 BioNTech/Pfizer">Covid-19 BioNTech/Pfizer</option>
                        <option value="Covid-19 Moderna">Covid-19 Moderna</option>
                        <option value="Covid-19 AstraZeneca">Covid-19 AstraZeneca</option>
                        <option value="Covid-19 Johnson&Johnson">Covid-19 Johnson&Johnson</option>
                        <option value="Coqueluche DTCaPolio">Coqueluche DTCaPolio</option>
                        <option value="Rougeole/Rubéole/Oreillons Priorix">Rougeole/ Rubéole / Oreillons Priorix</option>
                        <option value="Rougeole/Rubéole/Oreillons Rvaxpro">Rougeole/ Rubéole / Oreillons Rvaxpro</option>
                        <option value="Hépatite B">Hépatite B</option>
                        <option value="Pneumocoque Prevenar 13">Pneumocoque Prevenar 13</option>
                        <option value="Pneumocoque Pneumovax ">Pneumocoque Pneumovax </option>
                        <option value="Méningocoque C Menjugate">Méningocoque C Menjugate</option>
                        <option value="Méningocoque C Neisvac">Méningocoque C Neisvac</option>
                        <option value="Méningocoque C Menveo">Méningocoque C Menveo</option>
                        <option value="Haemophilus Hexyon">Haemophilus Hexyon</option>
                    </select>
                </div>

                <div class="datevaccin  contour">

                    <input type="date" name="date" value="date du vaccin" title="Date du vaccin">
                </div>

                <input type="submit" class=" submit contour ajouter" value="Ajouter">

            </form>

            <div>
                <div class="tableau">
                    <?php

                    foreach ($vaccins as $vaccin) {
                        if ($_SESSION['id'] == $vaccin['utilisateur_id']) { ?>

                            <table>
                                <tr>
                                    <td>
                                        <div class="infovaccin">
                                            <p> <?php echo $vaccin['nomvaccin']; ?></p>
                                            <p> <?php echo $vaccin['date']; ?></p>
                                        </div>
                                        <div class="option-vaccin">
                                            <div class="button">
                                                <?php echo ("<a href='modifier.php?nomvaccin=" . $vaccin['nomvaccin'] . "&date=" . $vaccin['date'] . "&id=" . $vaccin['idvaccin'] . "'><img  src='SM_icons/modify.png'/></a>"); ?>
                                            </div>

                                            <form action="" method="POST">
                                                <input type="text" name="idinput" hidden value="<?php echo $vaccin['idvaccin'] ?>">
                                                <div class="button supprimer">
                                                    <input type="image" class="delete" name="supprimer" src="SM_icons/trash.png">
                                                </div>
                                            </form>
                                        </div>


                                    </td>
                                </tr>
                            </table>

                    <?php
                        }
                    }
                    ?>

                </div>
            </div>


        </div>
    </div>

    <?php include("footer.php") ?>

</body>

</html>