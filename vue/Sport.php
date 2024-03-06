<?php
require "../model/CBDD.php";
session_start();
?>
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
    <main>
        <h2>Page des Sports</h2>
        <form action="Sport.php" method="get">
            <input type="text" name="recherche" placeholder="Rechercher un sport...">
            <input type="submit" value="Rechercher">
        </form>
        <form action="../controller/inscription_sport.php" method="post">
            <?php
            require "../model/CBDD.php";

            $recherche = isset($_GET['recherche']) ? $_GET['recherche'] : '';

            $sql = "SELECT * FROM sport WHERE nom_sport LIKE :recherche OR :recherche = ''";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':recherche', '%' . $recherche . '%');
            $stmt->execute();
            $sports = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach($sports as $sport) {
                echo "<div><input type='checkbox' name='idSport[]' value='" . $sport['Id_Sport'] . "'>" . htmlspecialchars($sport['nom_sport']) . "</div>";
            }
            ?>
         <input type="submit" value="S'inscrire aux sports sélectionnés">
        </form>
    </main>
    <main>
        <h2>Mes Sports</h2>    
        <?php
        $idClient = $_SESSION['user']['Id_Client'];
        $stmt = $pdo->prepare("SELECT s.Id_Sport, s.nom_sport FROM sport s INNER JOIN pratique p ON s.Id_Sport = p.Id_Sport WHERE p.Id_Client = :idClient");
        $stmt->execute(['idClient' => $idClient]);
        $mesSports = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($mesSports) {
            echo "<ul>";
            foreach ($mesSports as $monSport) {
                echo "<main>" . htmlspecialchars($monSport['nom_sport']) . "</main>";
            }
            echo "</ul>";
        }
        ?>
        <main>
        <form action="../controller/desinscription_sport.php" method="post">
            <?php
            $idClient = $_SESSION['user']['Id_Client'];
            $stmt = $pdo->prepare("SELECT s.Id_Sport, s.nom_sport FROM sport s INNER JOIN pratique p ON s.Id_Sport = p.Id_Sport WHERE p.Id_Client = :idClient");
            $stmt->execute(['idClient' => $idClient]);
            $mesSports = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($mesSports) {
                foreach ($mesSports as $monSport) {
                    echo "<div><input type='checkbox' name='idSport[]' value='" . $monSport['Id_Sport'] . "'>" . htmlspecialchars($monSport['nom_sport']) . "</div>";
                }
                echo "<input type='submit' value='Se désinscrire des sports sélectionnés'>";
            } else {
                echo "<p>Vous n'êtes inscrit à aucun sport.</p>";
            }
            ?>
        </form>
        </main>
    </main>
</body>
</html>