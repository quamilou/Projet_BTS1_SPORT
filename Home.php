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
                <li><a href="home.php">Menu</a></li>
                <li><a href="personnel.php">Personnel</a></li>
                <li><a href="equipes.php">Equipes</a></li>
                <li><a href="planning.php">Planning</a></li>
                <li><a href="sport.php">Sports</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Bienvenue <?php echo htmlspecialchars($utilisateur['nom']); ?> <?php echo htmlspecialchars($utilisateur['prenom']); ?></h2>
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
