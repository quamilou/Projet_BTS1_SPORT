<?php
session_start();

if ($_SESSION['user']['type'] < 2) {
    header('Location: ../vue/Home.php');
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
                <li><a href="../vue/Sport.php">Sport</a></li>
                <li><a href="../controller/deconnexion.php">Déconnexion</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Ajoute un participant</h2>
        <section>
        <form action="../controller/ajoute_sport.php" method="post">
            <input type="text" name="nom" placeholder="Nom" required><br>
            <input type="text" name="prenom" placeholder="Prénom" required><br>
            <input type="date" name="age" placeholder="Âge" required><br>
            <input type="number" step="any" name="poids" placeholder="Poids" required><br>
            <input type="number" step="any" name="taille" placeholder="Taille en cm (ex: 175)" required><br>
            <select name="sexe" required>
                <option value="">Sélectionnez le sexe</option>
                <option value="1">Homme</option>
                <option value="2">Femme</option>
            </select><br>
            <input type="text" name="IMC" placeholder="IMC" required><br>
            <input type="text" name="mdp" placeholder="Mot de passe" required><br>
            <select name="type" required>
                <option value="">Sélectionnez un type</option>
                <option value="1">Utilisateur</option>
                <option value="2">Gestionnaire</option>
                <option value="3">Administrateur</option>
            </select><br>
            <input type="submit" name="creerUtilisateur" value="Créer">
        </form>
        </section>
    </main>
</body>
</html>
