<?php

$to = $affprofil[0]["email"];
$subjet = "Notification Vaccin - Vaccina";
$message = "Bonjour " . $affprofil[0]["prenom"] . " " . $affprofil[0]["nom"] . ", " . "vous aurez votre prochain vaccin" . " (" . $nom . ")" . ", le " . date('d/m/Y', strtotime($date));;
$headers = "From : vaccina.nfs@gmail.com";


if (mail($to, $subjet, $message, $headers)) {
    echo 'envoyer !';
} else
    echo 'erreur';
