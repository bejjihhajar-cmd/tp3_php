//exercice 1.1
<?php
$a = 10;
$A = 20;

echo $a . "<br>";
echo $A;
?>
//exercice 1.2
<?php
const ETABLISSEMENT = "FSSM";

define("NOTE_MIN", 0);
define("NOTE_MAX", 20);
define("SEUIL", 10);
?>
//exercice 1.3
<?php
$prix_ht = 60;
$tva = 20;

$prix_ttc = $prix_ht + ($prix_ht * $tva / 100);

echo "Le prix TTC du produit est de " . $prix_ttc . " €.";
?>
//exercice 1.4
<?php
$test = 42;
$test = (string) $test;

var_dump($test);
?>
//exercice 1.5
<?php
$traitees = "égales à";
$ici = 2;

echo "Ahmed a dit : \"J'ai réussi\"<br>";
echo "Voulez-vous supprimer C:\\*.*?<br>";
echo 'Ceci n\'affichera pas \n de nouvelle ligne<br>';
echo 'Les variables ne seront pas $traitees $ici<br>';
echo "Les variables seront $traitees $ici<br>";

$texte = "*Bonjour les développeurs*";
$texte = trim($texte, "*");

echo $texte . "<br>";

for ($i = 0; $i < strlen($texte); $i++) {
    echo $texte[$i] . "<br>";
}
?>