<?php
require "../model/CBDD.php";
session_start();
$year = date('Y'); // Année courante
$month = date('m'); // Mois courant
$daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year); // Nombre de jours dans le mois
$startDayOfMonth = date('w', mktime(0, 0, 0, $month, 1, $year)); // Jour de la semaine du premier jour du mois

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
        <table>
            <tr>
                <th>Dim</th><th>Lun</th><th>Mar</th><th>Mer</th>
                <th>Jeu</th><th>Ven</th><th>Sam</th>
            </tr>
            <?php
            $day = 1;
            $blank = $startDayOfMonth;
            while ($day <= $daysInMonth) {
                echo "<tr>";
                for ($i = 0; $i < 7; $i++) {
                    if ($blank > 0) {
                        echo "<td></td>";
                        $blank--;
                    } elseif ($day <= $daysInMonth) {
                        echo "<td>$day</td>";
                        $day++;
                    }
                }
                echo "</tr>";
            }
            ?>
        </table>
    </main>
    <main>
        <h2>Page de Planning Equipes</h2>
        
    </main>
</body>
</html>
