<?php
require "../model/CBDD.php";
session_start();

if (!empty($_POST['idSport']) && is_array($_POST['idSport'])) {
    $idClient = $_SESSION['user']['Id_Client'];

    foreach ($_POST['idSport'] as $idSport) {
        // Supprime l'inscription de l'utilisateur aux sports sélectionnés
        $stmt = $pdo->prepare("DELETE FROM pratique WHERE Id_Client = :idClient AND Id_Sport = :idSport");
        $stmt->execute(['idClient' => $idClient, 'idSport' => $idSport]);
    }

    header("Location: ../vue/Sport.php?desinscription=1");
    exit;
} else {
    //header("Location: Sport.php?erreur=1");
    //exit;
    echo "Oulalala :/";
}
?>
