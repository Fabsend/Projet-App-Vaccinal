<?php $pdo = new PDO('mysql:host=localhost;dbname=mon_carnet', "root", "root");
$requestvaccin = $pdo->prepare("SELECT * FROM `vaccin`"); //Préparer
$requestvaccin->execute(); //Executer 
$vaccins = $requestvaccin->fetchAll();
session_start();



if (!empty($_POST["nom"]) && !empty($_POST["date"])) {
    $nom = $_POST["nom"];
    $date = $_POST["date"];


    $insertvaccin = $pdo->prepare("INSERT INTO vaccin (nom,date) VALUES ('$nom','$date')");
    $insertvaccin->execute();
    header('Location: carnet.php');
}
if (!empty($_POST["supprimer"]) && !empty($_POST["idinput"])) {
    $id = $_POST["idinput"];
    $suppvaccin = $pdo->prepare("DELETE FROM vaccin WHERE id = '$id' ");
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
    <title>Vaccina</title>
</head>

<body>
    <div>
        <div>
            <h4>nom</h4>
        </div>
        <div>
            <h4>prenom</h4>
        </div>
        <div>
            <h4>email</h4>
        </div>
        <div>
            <h4>date_de_naissance</h4>
        </div>
    </div>

    <div>
        <form action="" method="POST">
            <select name="nom">
                <option value="">Type de Vaccin</option>
                <option value="Covid-19 BioNTech/Pfizer">Covid-19 BioNTech/Pfizer</option>
                <option value="Covid-19 Moderna">Covid-19 Moderna</option>
                <option value="Covid-19 AstraZeneca">Covid-19 AstraZeneca</option>
                <option value="Covid-19 Johnson&Johnson">Covid-19 Johnson&Johnson</option>
                <option value="Coqueluche DTCaPolio">Coqueluche DTCaPolio</option>
                <option value="Rougeole/Rubéole/Oreillons Priorix">Rougeole/Rubéole/Oreillons Priorix</option>
                <option value="Rougeole/Rubéole/Oreillons Rvaxpro">Rougeole/Rubéole/Oreillons Rvaxpro</option>
                <option value="Hépatite B">Hépatite B</option>
                <option value="Pneumocoque Prevenar 13">Pneumocoque Prevenar 13</option>
                <option value="Pneumocoque Pneumovax ">Pneumocoque Pneumovax </option>
                <option value="Méningocoque C Menjugate">Méningocoque C Menjugate</option>
                <option value="Méningocoque C Neisvac">Méningocoque C Neisvac</option>
                <option value="Méningocoque C Menveo">Méningocoque C Menveo</option>
                <option value="Haemophilus Hexyon">Haemophilus Hexyon</option>
            </select>


            <label for="date">Date du Vaccin</label>
            <input type="date" name="date">

            <input type="submit" value="Ajouter">

        </form>

        <div>
            <div>
                <?php foreach ($vaccins as $vaccin) { ?>
                    <table>
                        <tr>
                            <td>

                                <p> <?php echo $vaccin['nom']; ?></p>
                                <p> <?php echo $vaccin['date']; ?></p>
                                <a href="#">Modifier</a>
                                <form action="" method="POST">
                                    <input type="text" name="idinput" hidden value="<?php echo $vaccin['id'] ?>">
                                    <input type="submit" name="supprimer" value="Supprimer">
                                </form>


                            </td>
                        </tr>
                    </table>

                <?php
                }
                ?>

            </div>
        </div>


    </div>



</body>

</html>