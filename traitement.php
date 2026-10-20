<?php
require_once "config.php";

if (
    !isset($_POST["nom"], $_POST["note_info"], $_POST["note_math"])
    || trim($_POST["nom"]) === ""
    || $_POST["note_info"] === ""
    || $_POST["note_math"] === ""
) {
    exit("Erreur : tous les champs sont obligatoires.");
}

$nom = trim($_POST["nom"]);

$note_info = filter_var($_POST["note_info"], FILTER_VALIDATE_FLOAT);
$note_math = filter_var($_POST["note_math"], FILTER_VALIDATE_FLOAT);

if (
    $note_info === false ||
    $note_math === false ||
    $note_info < NOTE_MIN ||
    $note_info > NOTE_MAX ||
    $note_math < NOTE_MIN ||
    $note_math > NOTE_MAX
) {
    exit("Erreur : les notes doivent être comprises entre 0 et 20.");
}

echo "<h2>Récapitulatif</h2>";
echo "Nom : " . htmlspecialchars($nom) . "<br>";
echo "Note Informatique : " . $note_info . "<br>";
echo "Note Mathématiques : " . $note_math . "<br>";

$moyenne = ($note_info + $note_math) / 2;
echo "Moyenne : " . number_format($moyenne, 2, ",", " ");
?>
<?php
// Les variables $nom, $note_info et $note_math
// ont déjà été vérifiées.

$dossier = __DIR__ . "/data";

if (!is_dir($dossier)) {
    mkdir($dossier, 0777, true);
}

$fichier = fopen($dossier . "/notes.csv", "a");

if ($fichier === false) {
    exit("Erreur lors de l'ouverture du fichier.");
}

fputcsv(
    $fichier,
    [$nom, $note_info, $note_math],
    ";"
);

fclose($fichier);

echo "<p>Les notes ont été enregistrées avec succès.</p>";
?>