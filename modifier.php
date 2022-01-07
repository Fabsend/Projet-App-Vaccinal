<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="modifier.css">
    <title>Document</title>
</head>

<body>
    <?php
    include("header.php") ?>
    <section class="main">
       
        <form action="" method="POST"> <h2>Modifiez le vaccin sur votre carnet</h2><br>
            <label for="date">Type du Vaccin</label>

            <select name="nom">
                <option value="">Type de Vaccin</option>
                <option value="Covid-19 BioNTech/Pfizer" <?php if ($_GET['nomvaccin'] == "Covid-19 BioNTech/Pfizer") echo "selected"; ?>>Covid-19 BioNTech/Pfizer</option>
                <option value="Covid-19 Moderna" <?php if ($_GET['nomvaccin'] == "Covid-19 Moderna") echo "selected"; ?>>Covid-19 Moderna</option>
                <option value="Covid-19 AstraZeneca" <?php if ($_GET['nomvaccin'] == "Covid-19 AstraZeneca") echo "selected"; ?>>Covid-19 AstraZeneca</option>
                <option value="Covid-19 Johnson&Johnson" <?php if ($_GET['nomvaccin'] == "Covid-19 Johnson&Johnson") echo "selected"; ?>>Covid-19 Johnson&Johnson</option>
                <option value="Coqueluche DTCaPolio" <?php if ($_GET['nomvaccin'] == "Coqueluche DTCaPolio") echo "selected"; ?>>Coqueluche DTCaPolio</option>
                <option value="Rougeole/Rubéole/Oreillons Priorix" <?php if ($_GET['nomvaccin'] == "Rougeole/Rubéole/Oreillons Priorix") echo "selected"; ?>>Rougeole/ Rubéole/ Oreillons Priorix</option>
                <option value="Rougeole/Rubéole/Oreillons Rvaxpro" <?php if ($_GET['nomvaccin'] == "Rougeole/Rubéole/Oreillons Rvaxpro") echo "selected"; ?>>Rougeole/ Rubéole/ Oreillons Rvaxpro</option>
                <option value="Hépatite B" <?php if ($_GET['nomvaccin'] == "Hépatite B") echo "selected"; ?>>Hépatite B</option>
                <option value="Pneumocoque Prevenar 13" <?php if ($_GET['nomvaccin'] == "Pneumocoque Prevenar 13") echo "selected"; ?>>Pneumocoque Prevenar 13</option>
                <option value="Pneumocoque Pneumovax " <?php if ($_GET['nomvaccin'] == "Pneumocoque Pneumovax") echo "selected"; ?>>Pneumocoque Pneumovax</option>
                <option value="Méningocoque C Menjugate" <?php if ($_GET['nomvaccin'] == "Méningocoque C Menjugate") echo "selected"; ?>>Méningocoque C Menjugate</option>
                <option value="Méningocoque C Neisvac" <?php if ($_GET['nomvaccin'] == "Méningocoque C Neisvac") echo "selected"; ?>>Méningocoque C Neisvac</option>
                <option value="Méningocoque C Menveo" <?php if ($_GET['nomvaccin'] == "Méningocoque C Menveo") echo "selected"; ?>>Méningocoque C Menveo</option>
                <option value="Haemophilus Hexyon" <?php if ($_GET['nomvaccin'] == "Haemophilus Hexyon") echo "selected"; ?>>Haemophilus Hexyon</option>
            </select>
            <p>&thinsp;</p>
            <label for="date">Date du Vaccin</label>
            <input type="date" name="date" value="<?php
                                                    echo ($_GET['date']);
                                                    ?>">
            &thinsp;
            <input class="submit-button" type="submit" value="Modifier">
            <input type="hidden" name="id" value="<?php echo ($_GET['id']) ?>">
        </form>

        <?php
        session_start();
        $pdo = new PDO('mysql:host=localhost;dbname=mon_carnet',  "root");
        if (!empty($_POST)) {
            $nom = $_POST['nom'];
            $date = $_POST['date'];
            $id = $_POST['id'];
            $req = $pdo->prepare("UPDATE `vaccin` SET `nomvaccin` = '$nom', `date` = '$date' WHERE `vaccin`.`idvaccin` = '$id' ");
            $req->execute();
            header('Location: carnet.php');
        }
        ?>
    </section>
    <?php
    include("footer.php")
    ?>
</body>

</html>