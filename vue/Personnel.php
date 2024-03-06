<?php
require "../model/CBDD.php";
session_start();

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
        <h2>Profil de <?php echo htmlspecialchars($utilisateur['nom']); ?> <?php echo htmlspecialchars($utilisateur['prenom']); ?></h2>
        <form action="../controller/update_profile.php" method="post">
            <label for="nom">Nom:</label><br>
            <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($utilisateur['nom']); ?>" required><br>

            <label for="prenom">Prénom:</label><br>
            <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($utilisateur['prenom']); ?>" required><br>

            <label for="age">Age:</label><br>
            <input type="text" id="age" name="age" value="<?php echo htmlspecialchars($utilisateur['age']); ?>" required><br>

            <label for="poids">Poids:</label><br>
            <input type="text" id="poids" name="poids" value="<?php echo htmlspecialchars($utilisateur['poids']); ?>" required><br>

            <label for="taille">Taille:</label><br>
            <input type="text" id="taille" name="taille" value="<?php echo htmlspecialchars($utilisateur['taille']); ?>" required><br>

            <label for="sexe">Sexe:</label><br>
            <input type="text" id="sexe" name="sexe" value="<?php echo htmlspecialchars($utilisateur['sexe']); ?>" required><br>

            <label for="IMC">IMC:</label><br>
            <input type="text" id="IMC" name="IMC" value="<?php echo htmlspecialchars($utilisateur['IMC']); ?>" required><br>

            <label for="mdp">Mot de passe:</label><br>
            <input type="password" id="mdp" name="mdp" value="<?php echo htmlspecialchars($utilisateur['mdp']); ?>" required><br>
            
            <input type="submit" value="Mettre à jour">
        </form>
    </main>
</body>
</html>
