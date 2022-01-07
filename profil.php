<?php
$pdo = new PDO('mysql:host=localhost;dbname=mon_carnet', "root", "root");
session_start();
$recu_info = $pdo->prepare("SELECT * FROM utilisateur WHERE id=" . $_SESSION['id']);
$recu_info->execute();
$recu_info = $recu_info->fetch();
?>


<?php


if (!empty($_POST)) {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $id = $_SESSION["id"];
    $req = $pdo->prepare("UPDATE `utilisateur` SET `nom` = '$nom', `prenom` = '$prenom' WHERE `utilisateur`.`id` = '$id' ");
    $req->execute();
    header('Location: carnet.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="profil.css">
    <title>Document</title>
</head>

<body>
    <?php
    include("header.php") ?>
    <h2>Modifiez votre profil</h2><br>
    <form action="#" method="POST">

        <label for="prenom">Prénom:</label>
        <input type="prenom" name="prenom" value="<?php
                                                    echo ($recu_info['prenom']);
                                                    ?>">

        <label for="prenom">Nom:</label>
        <input type="nom" name="nom" value="<?php
                                            echo ($recu_info['nom']);
                                            ?>">


        <input class="submit-button" type="submit" value="Modifier">

    </form>

    <?php
    include("footer.php")
    ?>
</body>

</html>