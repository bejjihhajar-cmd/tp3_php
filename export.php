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

$resultats = [];

while (($ligne = fgetcsv($fp, 0, ";")) !== false) {
    if (count($ligne) < 3) {
        continue;
    }

    $nom = $ligne[0];
    $info = (float)$ligne[1];
    $math = (float)$ligne[2];

    $resultats[] = [
        "nom" => $nom,
        "notes" => [
            "info" => $info,
            "math" => $math
        ],
        "moyenne" => ($info + $math) / 2
    ];
}

fclose($fp);

$json = json_encode(
    $resultats,
    JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
);

if ($json === false) {
    exit("Erreur de conversion JSON.");
}

file_put_contents(__DIR__ . "/data/notes.json", $json);

$contenu = file_get_contents(__DIR__ . "/data/notes.json");

$donnees = json_decode($contenu, true);

echo "<pre>";
print_r($donnees);
echo "</pre>";

echo "<h3>Résultat de serialize()</h3>";
echo "<pre>";
echo htmlspecialchars(serialize($resultats));
echo "</pre>";
?>