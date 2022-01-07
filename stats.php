<?php
function debug($tableau)
{
    echo '<pre style="height:200px;overflow: scroll; font-size: .8em;padding: 10px;font-family: Consolas, Monospace; background-color: #000;color:#fff;">';
    print_r($tableau);
    echo '</pre>';
}

session_start();
$pdo = new PDO('mysql:host=localhost;dbname=mon_carnet', "root", "root");

$req = $pdo->prepare("SELECT role, COUNT(*) FROM utilisateur GROUP BY role");
$req->execute();
$nbrusers = $req->fetchAll();

$req2 = $pdo->prepare("SELECT nomvaccin, COUNT(*) FROM vaccin GROUP BY nomvaccin");
$req2->execute();
$nbrvaccins = $req2->fetchAll();

$req3 = $pdo->prepare("SELECT date_de_naissance, COUNT(*) FROM utilisateur GROUP BY date_de_naissance");
$req3->execute();
$age = $req3->fetchAll();

$requser = $pdo->prepare("SELECT * FROM utilisateur");
$requser->execute();
$ageuser = $requser->fetchAll();

$req4 = $pdo->prepare("SELECT * FROM utilisateur WHERE DATEDIFF(NOW(),date_de_naissance) < '6935.75'");
$req4->execute();
$age2 = $req4->fetchAll();

$req5 = $pdo->prepare("SELECT * FROM utilisateur WHERE DATEDIFF(NOW(),date_de_naissance) >= '6935.75' AND DATEDIFF(NOW(),date_de_naissance) < '14975.25'");
$req5->execute();
$age3 = $req5->fetchAll();

$req6 = $pdo->prepare("SELECT * FROM utilisateur WHERE DATEDIFF(NOW(),date_de_naissance) >= '14975.25' AND DATEDIFF(NOW(),date_de_naissance) < '22280.25'");
$req6->execute();
$age4 = $req6->fetchAll();

$req7 = $pdo->prepare("SELECT * FROM utilisateur WHERE DATEDIFF(NOW(),date_de_naissance) >= '22280.25'");
$req7->execute();
$age5 = $req7->fetchAll();

$req8 = $pdo->prepare("SELECT ROUND(AVG(DATEDIFF(NOW(), date_de_naissance)/365.25)) FROM utilisateur");
$req8->execute();
$age6 = $req8->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stats.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="footer.css">
    <title>Document</title>
</head>
<body>
    <?php 
    include("header.php");
    ?>
    <br><br>
    <table>
        <tr>
            <th></th>
            <th>Moins de 18 ans</th>
            <th>19 à 40 ans</th>
            <th>41 à 60 ans</th>
            <th>61 ans ou plus</th>
            <th>Total</th>
        </tr>
        <tr>
            <td>Nombre d'utilisateurs</td>
            <td><?php echo(count($age2))?></td>
            <td><?php echo(count($age3))?></td>
            <td><?php echo(count($age4))?></td>
            <td><?php echo(count($age5))?></td>
            <td><?php echo(count($age2)+count($age3)+count($age4)+count($age5))?></td>
        </tr>
        <tr>
            <td>Nombre d'utilisateurs en %</td>
            <td><?php echo(round((count($age2)*100/(count($ageuser))),2)) ?></td>
            <td><?php echo(round((count($age3)*100/(count($ageuser))),2)) ?></td>
            <td><?php echo(round((count($age4)*100/(count($ageuser))),2)) ?></td>
            <td><?php echo(round((count($age5)*100/(count($ageuser))),2)) ?></td>
            <td>100</td>
        </tr>
    </table><br><br>
    <table>
        <tr>
            <td></td>
            <?php
            foreach ($nbrvaccins as $nbrvaccin) {
                echo ("<td>" . $nbrvaccin['nomvaccin'] . "</td>");    
            }
            ?>
            <td>Total</td>
        </tr>
        <tr>
            <td>Nombre de vaccins renseignés</td>
            <?php
            foreach ($nbrvaccins as $nbrvaccin) {
                echo ("<td>" . $nbrvaccin['COUNT(*)'] . "</td>");    
            }
            ?>
            <td>
            <?php
            echo(array_sum(array_column($nbrvaccins,'COUNT(*)')));
            ?>
            </td>
        </tr>
        <tr>
            <td>Nombre de vaccins renseignés en %</td>
            <?php
            foreach ($nbrvaccins as $nbrvaccin) {
                echo ("<td>" . round($nbrvaccin['COUNT(*)']*100/(array_sum(array_column($nbrvaccins,'COUNT(*)'))),2) . "</td>");    
            }
            ?>
            <td>100</td>
        </tr>
    </table><br><br>
    <?php
    foreach ($nbrusers as $nbruser) {
        echo ("Il y a " . $nbruser['COUNT(*)'] . " compte(s) avec le role " . $nbruser['role'] . " dans la base de données.<br>"); 
        echo (round($nbruser['COUNT(*)']*100/(array_sum(array_column($nbrusers,'COUNT(*)'))),2) . "% des comptes ont le role " . $nbruser['role'] . " dans la base de données.<br><br>");       
    }

    foreach ($nbrvaccins as $nbrvaccin) {
        echo ("Il y a " . $nbrvaccin['COUNT(*)'] . " utilisateur(s) ayant le vaccin " . $nbrvaccin['nomvaccin'] . " dans leur carnet.<br>");    
        echo ($nbrvaccin['nomvaccin'] . " correspond à " . round($nbrvaccin['COUNT(*)']*100/(array_sum(array_column($nbrvaccins,'COUNT(*)'))),2) . "% des vaccins renseignés dans les différents carnets.<br><br>");    
    }

    foreach ($age as $agecle) {
        $birthDate = $agecle['date_de_naissance'];
        $currentDate = date("Y-m-d");
        $age = date_diff(date_create($birthDate), date_create($currentDate));
        echo ("Il y a " . $agecle['COUNT(*)'] . " utilisateur(s) ayant " . $age->format("%y") . " ans.<br>");    
    }
    echo("<br>Il y a " . count($age2) . " utilisateur(s) de moins de 18 ans.<br>");
    echo(round((count($age2)*100/(count($ageuser))),2) . "% des utilisateurs ont moins de 18 ans.<br>");
    echo("Il y a " . count($age3) . " utilisateur(s) entre 21 et 39 ans.<br>");
    echo(round((count($age3)*100/(count($ageuser))),2) . "% des utilisateurs ont  entre 21 et 40 ans.<br>");
    echo("Il y a " . count($age4) . " utilisateur(s) entre 41 et 60 ans.<br>");
    echo(round((count($age4)*100/(count($ageuser))),2) . "% des utilisateurs ont entre 41 et 60 ans.<br>");
    echo("Il y a " . count($age5) . " utilisateur(s) de plus de 61 ans.<br>");
    echo(round((count($age5)*100/(count($ageuser))),2) . "% des utilisateurs ont plus de 61 ans.<br><br>");

    echo("L'âge moyen des utilisateurs est de " . $age6[0][0] . " ans.<br>");

    debug($nbrvaccins);
    ?>
    <?php
    include("footer.php")
    ?>
</body>
</html>