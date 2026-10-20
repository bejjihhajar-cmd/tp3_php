<?php
require_once "config.php";

$fichier = __DIR__ . "/data/notes.csv";

if (!file_exists($fichier)) {
    exit("Le fichier notes.csv n'existe pas.");
}

$fp = fopen($fichier, "r");

if ($fp === false) {
    exit("Impossible d'ouvrir le fichier.");
}

$somme_moyennes = 0;
$nombre = 0;

echo "<table border='1'>";
echo "<tr>
        <th>Nom</th>
        <th>Info</th>
        <th>Math</th>
        <th>Moyenne</th>
        <th>Mention</th>
      </tr>";

while (($ligne = fgetcsv($fp, 0, ";")) !== false) {
    if (count($ligne) < 3) {
        continue;
    }

    $nom = $ligne[0];
    $info = (float)$ligne[1];
    $math = (float)$ligne[2];

    $moyenne = ($info + $math) / 2;

    if ($moyenne >= 16) {
        $mention = "Très bien";
    } elseif ($moyenne >= 14) {
        $mention = "Bien";
    } elseif ($moyenne >= 12) {
        $mention = "Assez bien";
    } elseif ($moyenne >= SEUIL) {
        $mention = "Passable";
    } else {
        $mention = "Ajourné";
    }

    echo "<tr>";
    echo "<td>" . htmlspecialchars($nom) . "</td>";
    echo "<td>$info</td>";
    echo "<td>$math</td>";
    echo "<td>" . number_format($moyenne, 2) . "</td>";
    echo "<td>$mention</td>";
    echo "</tr>";

    $somme_moyennes += $moyenne;
    $nombre++;
}

echo "</table>";

fclose($fp);

if ($nombre > 0) {
    echo "<p>Moyenne générale de la classe : "
        . number_format($somme_moyennes / $nombre, 2)
        . "</p>";
} else {
    echo "<p>Aucun apprenant enregistré.</p>";
}
?>