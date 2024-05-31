<?php
require "../model/CBDD.php";
session_start();

// Vérifie si l'ID du client est défini dans la session
if (isset($_SESSION['user']['Id_Client'])) {
    $idClient = $_SESSION['user']['Id_Client'];
} else {
    die('Erreur : l\'ID du client n\'est pas défini.');
}

$titre = $_POST['titre'];
$nom_planning = $_POST['nom_planning'];
$date_heure = $_POST['date_heure'];
$duree = $_POST['duree'];

$stmt = $pdo->prepare("INSERT INTO planning (titre, date_heure, nom_planning, durée, Id_Client) VALUES (:titre, :date_heure, :nom_planning, :duree, :idClient)");
$stmt->execute(['titre' => $titre, 'date_heure' => $date_heure, 'nom_planning' => $nom_planning, 'duree' => $duree, 'idClient' => $idClient]);

// Redirection vers la page de planning avec un message de confirmation
header("Location: ../vue/Planning.php?success=1");
exit;
?>
