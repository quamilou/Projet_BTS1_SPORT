<?php
session_start();


?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>AspireSport</title>
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
                <li><a href="../controller/deconnexion.php">Déconnexion</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Menu</h2>
        <section>
            <p>Age:     <?php echo $_SESSION['user']['age']; ?></p>
            <p>Poids:   <?php echo $_SESSION['user']['poids']; ?></p>
            <p>Taille:  <?php echo $_SESSION['user']['taille']; ?></p>
            <p>Sexe:    <?php echo $_SESSION['user']['sexe']; ?></p>
            <p>IMC:     <?php echo $_SESSION['user']['IMC']; ?></p>
        </section>
    </main>
</body>
</html>
