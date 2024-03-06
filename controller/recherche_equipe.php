<?php
require "../model/CBDD.php";
session_start();

$nomEquipe = $_GET['nomEquipe'] ?? '';

$stmt = $pdo->prepare("SELECT * FROM equipe WHERE nom_groupe LIKE :nomEquipe");
$stmt->bindValue(':nomEquipe', "%$nomEquipe%");
$stmt->execute();

$equipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($equipes as $equipe) {
    echo "<div>" . htmlspecialchars($equipe['nom_groupe']) . "</div>";
}
?>
