<?php
require "../model/CBDD.php";
$client = $_POST['nom'];
$_SESSION['user'] = $_POST['nom'];

if (!isset($_SESSION['user'])) {
    // redirige vers la page connexion
    header('Location: ../vue/testform.html');
    exit;
}


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
            </ul>
        </nav>
    </header>
    <main>
        <h2>Menu</h2>
        <section>
            <p>Age: <?php echo $client; ?></p>
            <p>Poids: <?php echo htmlspecialchars($client); ?></p>
            <p>Taille: <?php echo htmlspecialchars($client); ?></p>
            <p>Sexe: <?php echo htmlspecialchars($client); ?></p>
            <p>IMC: <?php echo htmlspecialchars($client); ?></p>
            <p>mdp: <?php echo htmlspecialchars($client); ?></p>
        </section>
    </main>
</body>
</html>
