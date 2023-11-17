<?php
require "CBDD.php";
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: index.html');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Equipes - AspireSport</title>
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
        <h2>Page des Equipes</h2>
        
    </main>
</body>
</html>
