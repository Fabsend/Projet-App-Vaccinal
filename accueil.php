<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="accueil.css">
    <title>Vaccina</title>
</head>

<body>
    <?php
    include("header.php") ?>
    <section>

        <div class="paragraph">
            <h1>Vaccina</h1>
            <p>

                <br>Gérez votre carnet vaccinale en toute sécurité
            </p>
            <img src="gettyimages.jpg" alt="">
        </div>



        <div>

            <form action="">
                <h1>Connexion</h1>
                <input type="text" placeholder="Adresse Mail" class="connex"> <br>
                <input type="password" name="password" placeholder="Mot de pass" class="connex"><br>
                <input type="submit" value="Valider" class="valider"> <br>
                <p> Vous n'avez pas un compte ? <a href="#">Créer un compte</a>
                </p>
            </form>
        </div>
    </section>
    <?php
    include("footer.php")
    ?>
</body>

</html>