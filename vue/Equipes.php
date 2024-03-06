<?php
require "../model/CBDD.php";
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Equipes - AspireSport</title>
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
    <!--Insciption-->
    <main>
        <h2>Page des Equipes</h2>
        <form action="Equipes.php" method="get">
            <label for="nomEquipe">Nom de l'équipe:</label>
            <input type="text" id="nomEquipe" name="nomEquipe">
            <input type="submit" value="Rechercher">
        </form>
        <form action="../controller/inscription_equipe.php" method="post">
        <?php
        if (isset($_GET['nomEquipe'])) {
            require "../model/CBDD.php";
            $nomEquipe = $_GET['nomEquipe'] ?? '';
            $stmt = $pdo->prepare("SELECT * FROM equipe WHERE nom_groupe LIKE :nomEquipe");
            $stmt->bindValue(':nomEquipe', "%$nomEquipe%");
            $stmt->execute();
            $equipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($equipes as $equipe) {
                echo "<div><input type='checkbox' name='equipeId[]' value='" . $equipe['Id_Equipe'] . "'>" . htmlspecialchars($equipe['nom_groupe']) . "</div>";
            }
        }
        ?>
        <input type="submit" value="S'inscrire aux équipes sélectionnées">
        </form>
    </main>
    <!--Supp-->
    <main>
        <h2>Mes Equipes</h2>
        <form>
            <?php
                $utilisateurId = $_SESSION['user']['Id_Client'];

                $stmt = $pdo->prepare("SELECT e.Id_Equipe, e.nom_groupe FROM equipe e INNER JOIN appartient a ON e.Id_Equipe = a.Id_Equipe WHERE a.Id_Client = :utilisateurId");
                $stmt->execute(['utilisateurId' => $utilisateurId]);
                $equipesInscrites = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <?php foreach ($equipesInscrites as $equipe): ?>
                <div>
            <?php echo htmlspecialchars($equipe['nom_groupe']); ?>
                
                <a href="../controller/quitter_equipe.php?equipeId=<?php echo $equipe['Id_Equipe']; ?>">Quitter l'équipe </a>
                </div>
            <?php endforeach; ?>

        </form>
    </main>
    <!--Make-->
    <main>
        <h2>Créer une Equipe</h2>
        <form action="../controller/creer_equipe.php" method="post">
                <label for="nomEquipe">Nom de l'équipe:</label>
                <input type="text" id="nomEquipe" name="nomEquipe" required>
                <input type="submit" value="Créer l'équipe">
            <?php if (isset($_GET['erreur']) && $_GET['erreur'] == 'nomExistant'): ?>
                <p style="color: red;">Une équipe avec ce nom existe déjà. Veuillez choisir un autre nom.</p>
            <?php endif; ?>

        </form>
    </main>
</body>
</html>
