<?php
require "../model/CBDD.php";
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../vue/index.html');
    exit;
}
$utilisateur = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Personnel - AspireSport</title>
    <link rel="stylesheet" href="../assert/style.css">
</head>
<body>
    <header>
        <h1>AspireSport</h1>
        <nav>
            <ul>
                <li><a href="../vue/Home.php">Menu</a></li>
                <li><a href="../vue/Personnel.php">Personnel</a></li>
                <li><a href="../vue/Equipes.php">Equipes</a></li>
                <li><a href="../vue/Planning.php">Planning</a></li>
                <li><a href="../vue/Sport.php">Sports</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2><?php echo htmlspecialchars($utilisateur['nom']); ?> <?php echo htmlspecialchars($utilisateur['prenom']); ?></h2>
    
    </main>
</body>
</html>
