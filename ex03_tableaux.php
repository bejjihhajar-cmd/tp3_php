//exercice 3.1
<?php
$notes = [
    "Mohamed" => 16,
    "Ahmed" => 14,
    "Hind" => 13,
    "Aicha" => 15,
    "Samir" => 13,
    "Zakaria" => 13,
    "Rafik" => 10,
    "Ilham" => 9,
    "Hamza" => 7,
    "Sami" => 7,
    "Noura" => 14
];

$modules = ["PHP", "UML", "Linux"];

foreach ($modules as $module) {
    echo $module . "<br>";
}

echo $modules[0] . "<br>";
echo $modules[1] . "<br>";
echo $modules[2] . "<br>";
?>
//exercice 3.2
<?php
require "config.php";

function mention($note) {
    if ($note >= 16) {
        return "Très bien";
    } elseif ($note >= 14) {
        return "Bien";
    } elseif ($note >= 12) {
        return "Assez bien";
    } elseif ($note >= SEUIL) {
        return "Passable";
    } else {
        return "Ajourné";
    }
}

$notes = [
    "Mohamed" => 16,
    "Ahmed" => 14,
    "Hind" => 13,
    "Aicha" => 15,
    "Samir" => 13,
    "Zakaria" => 13,
    "Rafik" => 10,
    "Ilham" => 9,
    "Hamza" => 7,
    "Sami" => 7,
    "Noura" => 14
];

echo "<table border='1'>";
echo "<tr><th>Nom</th><th>Note</th><th>Mention</th></tr>";

foreach ($notes as $nom => $note) {
    $couleur = ($note < SEUIL) ? "red" : "black";

    echo "<tr style='color:$couleur'>";
    echo "<td>" . htmlspecialchars($nom) . "</td>";
    echo "<td>" . $note . "</td>";
    echo "<td>" . mention($note) . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
//exercice 3.3
<?php
require "config.php";

function Calculermention($note) {
    if ($note >= 16) {
        return "Très bien";
    } elseif ($note >= 14) {
        return "Bien";
    } elseif ($note >= 12) {
        return "Assez bien";
    }
}
$notes = [
    "Mohamed" => 16,
    "Ahmed" => 14,
    "Hind" => 13,
    "Aicha" => 15,
    "Samir" => 13,
    "Zakaria" => 13,
    "Rafik" => 10,
    "Ilham" => 9,
    "Hamza" => 7,
    "Sami" => 7,
    "Noura" => 14
];

$somme = 0;
$meilleure = -INF;
$faible = INF;
$effectifs = [];

foreach ($notes as $nom => $note) {
    $somme += $note;

    if ($note > $meilleure) {
        $meilleure = $note;
    }

    if ($note < $faible) {
        $faible = $note;
    }

    $m = mention($note);

    if (!isset($effectifs[$m])) {
        $effectifs[$m] = 0;
    }

    $effectifs[$m]++;
}

$moyenne = $somme / count($notes);

echo "Somme : $somme<br>";
echo "Moyenne : " . round($moyenne, 2) . "<br>";
echo "Meilleure note : $meilleure<br>";
echo "Plus faible note : $faible<br>";

echo "<h3>Effectifs par mention</h3>";

foreach ($effectifs as $mention => $nombre) {
    echo "$mention : $nombre<br>";
}

// Vérification
echo "<hr>";
echo "Somme de vérification : " . array_sum($notes) . "<br>";
echo "Nombre d'apprenants : " . count($notes) . "<br>";
echo "Maximum : " . max($notes) . "<br>";
echo "Minimum : " . min($notes) . "<br>";
?>
//exercice 3.4
<?php
$notes = [
    "Mohamed" => 16,
    "Ahmed" => 14,
    "Hind" => 13,
    "Aicha" => 15,
    "Samir" => 13,
    "Zakaria" => 13,
    "Rafik" => 10,
    "Ilham" => 9,
    "Hamza" => 7,
    "Sami" => 7,
    "Noura" => 14
];

function afficher($tab) {
    echo "<table border='1'>";
    echo "<tr><th>Nom</th><th>Note</th></tr>";

    foreach ($tab as $nom => $note) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars((string)$nom) . "</td>";
        echo "<td>$note</td>";
        echo "</tr>";
    }

    echo "</table><br>";
}

echo "<h3>Tableau trié par noms croissants</h3>";
ksort($notes);
afficher($notes);

echo "<h3>Tableau trié par notes décroissantes</h3>";
arsort($notes);
afficher($notes);

echo "<h3>Tableau trié par noms décroissants</h3>";
krsort($notes);
afficher($notes);

echo "<h3>Tableau trié par notes croissantes</h3>";
asort($notes);
afficher($notes);
?>
//exercice 3.5
<?php
$a = ["x" => 1, "y" => 2];
$b = ["y" => 2, "x" => 1];

var_dump($a + $b);
echo "<br>";

var_dump($a == $b);
echo "<br>";

var_dump($a === $b);
?>