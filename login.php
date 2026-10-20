<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login = trim($_POST["login"] ?? "");

    if ($login === "") {
        $erreur = "Veuillez saisir votre login.";
    } else {
        $_SESSION["login"] = $login;

        header("Location: profil.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>

<h2>Connexion</h2>

<?php
if (isset($erreur)) {
    echo "<p>" . htmlspecialchars($erreur) . "</p>";
}
?>

<form method="POST" action="login.php">
    <label>Login :</label>
    <input type="text" name="login" required>
    <button type="submit">Se connecter</button>
</form>

</body>
</html>