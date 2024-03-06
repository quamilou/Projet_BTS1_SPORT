<?php
require "../model/CBDD.php";
session_start();

//$year = date('Y'); // Année courante
//$month = date('m'); // Mois courant
//$daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year); // Nombre de jours dans le mois
//$startDayOfMonth = date('w', mktime(0, 0, 0, $month, 1, $year)); // Jour de la semaine du premier jour du mois

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Planning - AspireSport</title>
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
        <h2>Page de Planning Personnel</h2>
        <?php
            $idClient = $_SESSION['user']['Id_Client'];
            $stmt = $pdo->prepare("SELECT * FROM planning WHERE Id_Client = :idClient ORDER BY date_heure ASC");
            $stmt->execute(['idClient' => $idClient]);
            $plannings = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($plannings) {
                echo "<ul>";
                foreach ($plannings as $planning) {
                    echo "<li>" . htmlspecialchars($planning['titre']) . " - " . htmlspecialchars($planning['nom_planning']) . " le " . htmlspecialchars($planning['date_heure']) . " pour " . htmlspecialchars($planning['durée']) . " min</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>Aucun planning personnel trouvé.</p>";
            }
        ?>
        <main>
        <h2>Ajouter un Planning Personnel</h2>
            <form action="../controller/ajouter_planning.php" method="post">
                <label for="titre">Titre:</label>
                <input type="text" id="titre" name="titre" required><br>

                <label for="nom_planning">Nom du Planning:</label>
                <input type="text" id="nom_planning" name="nom_planning" required><br>

                <label for="date_heure">Date et Heure:</label>
                <input type="datetime-local" id="date_heure" name="date_heure" required><br>

                <label for="durée">Durée (en minutes):</label>
                <input type="number" id="durée" name="durée" required min="1"><br>

                <input type="submit" value="Ajouter le Planning">
            </form>
        </main>

       <!--<table>
           <tr>
               <th>Dim</th><th>Lun</th><th>Mar</th><th>Mer</th>
               <th>Jeu</th><th>Ven</th><th>Sam</th>
           </tr>
           //<?php
           //$day = 1;
           //$blank = $startDayOfMonth;
           //while ($day <= $daysInMonth) {
           //    echo "<tr>";
           //    for ($i = 0; $i < 7; $i++) {
           //        if ($blank > 0) {
           //            echo "<td></td>";
           //            $blank--;
           //        } elseif ($day <= $daysInMonth) {
           //            echo "<td>$day</td>";
           //            $day++;
           //        }
           //    }
           //    echo "</tr>";
           //}
           //?>
       </table>
        -->
    </main>
    <main>
        <h2>Page de Planning Equipes</h2>
        
    </main>
</body>
</html>
