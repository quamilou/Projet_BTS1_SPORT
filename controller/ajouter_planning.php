<?php
require "../model/CBDD.php";
session_start();

$utilisateurId = $_SESSION['user']['Id_Client'];
$stmt = ("SELECT * FROM client");
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
