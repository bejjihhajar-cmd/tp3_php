<?php
$nom = htmlspecialchars($_GET["nom"] ?? "");
$prenom = htmlspecialchars($_GET["prenom"] ?? "");
$sexe = $_GET["sexe"] ?? "";

if ($sexe === "M") {
    $civilite = "Monsieur";
} elseif ($sexe === "F") {
    $civilite = "Madame";
} else {
    exit("Sexe invalide.");
}

echo "Bonjour $civilite $prenom $nom";
?>