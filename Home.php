<?php
require "CBDD.php";
session_start();

if (!isset($_SESSION['user'])) {
    // redirige vers la page connexion
    header('Location: index.html');
    exit;
}

$utilisateur = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>AspireSport</title>
    <link rel="stylesheet" href="assert/style.css">
</head>
<body>
    <header>
        <h1>AspireSport</h1>
        <nav>
            <ul>
            <li><a href="Home.php">Menu</a></li>
            <li><a href="Personnel.php">Personnel</a></li>
            <li><a href="Equipes.php">Equipes</a></li>
            <li><a href="Planning.php">Planning</a></li>
            <li><a href="Sport.php">Sports</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Menu</h2>
        <section>
            <p>Age: <?php echo htmlspecialchars($utilisateur['age']); ?></p>
            <p>Poids: <?php echo htmlspecialchars($utilisateur['poids']); ?></p>
            <p>Taille: <?php echo htmlspecialchars($utilisateur['taille']); ?></p>
            <p>Sexe: <?php echo htmlspecialchars($utilisateur['sexe']); ?></p>
            <p>IMC: <?php echo htmlspecialchars($utilisateur['IMC']); ?></p>
        </section>
    </main>
</body>
</html>
