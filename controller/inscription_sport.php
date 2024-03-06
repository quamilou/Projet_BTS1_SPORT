<?php
require "../model/CBDD.php";
session_start();

$idClient = $_SESSION['user']['Id_Client'];
$idSport = $_POST['idSport'];

// Vérifie si l'ID du sport et l'ID de l'utilisateur sont disponibles
if (isset($_POST['idSport']) && isset($_SESSION['user']['Id_Client'])) {
    $idSport = $_POST['idSport'];
    $idClient = $_SESSION['user']['Id_Client'];

    // Vérifier si l'utilisateur est déjà inscrit à ce sport
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM pratique WHERE Id_Client = :idClient AND Id_Sport = :idSport");
    $stmt->execute(['idClient' => $idClient, 'idSport' => $idSport]);
    $dejaInscrit = $stmt->fetchColumn() > 0;

    // Insérer l'inscription dans la table pratique
    $stmt = $pdo->prepare("INSERT INTO pratique (Id_Client, Id_Sport) VALUES (:idClient, :idSport)");
    $stmt->execute(['idClient' => $idClient, 'idSport' => $idSport]);


    if (!$dejaInscrit) {
        // Inscrire l'utilisateur au sport
        $stmt = $pdo->prepare("INSERT INTO pratique (Id_Client, Id_Sport) VALUES (:idClient, :idSport)");
        $stmt->execute(['idClient' => $idClient, 'idSport' => $idSport]);
        // Rediriger vers la page des sports avec un message de succès
        header("Location: ../vue/Sport.php?inscriptionReussie=1");
    } else {
        // L'utilisateur est déjà inscrit à ce sport, gérer cette situation
        header("Location: ../vue/Sport.php?dejaInscrit=1");
    }
} else {
    // Rediriger vers la page des sports avec un message d'erreur
    header("Location: ../vue/Sport.php?erreurInscription=1");
}
exit;
?>
