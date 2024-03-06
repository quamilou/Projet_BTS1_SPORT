<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Error_creation</title>
        <link rel="stylesheet" href="../assert/style.css">
    </head>
    <body>
        <main>
        <form class="alllogin" action="../vue/Home.php" method="POST"> 
            <h2>Error_creation</h2>
<?php
require "../model/CBDD.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['nomEquipe'])) {
    $nomEquipe = $_POST['nomEquipe'];
    $utilisateurId = $_SESSION['user']['Id_Client'];

    // Obtient la date actuelle au format YYYY-MM-DD
    $dateCreation = date('Y-m-d');

    // Création de l'équipe
    $stmt = $pdo->prepare("INSERT INTO equipe (nom_groupe, date_creation) VALUES (:nomEquipe, :dateCreation)");
    if ($stmt->execute(['nomEquipe' => $nomEquipe, 'dateCreation' => $dateCreation])) {
        // Récupère l'ID de l'équipe créée
        $equipeId = $pdo->lastInsertId();
        
        // Inscrire l'utilisateur à l'équipe
        $stmt = $pdo->prepare("INSERT INTO appartient (Id_Client, Id_Equipe) VALUES (:utilisateurId, :equipeId)");
        if (!$stmt->execute(['utilisateurId' => $utilisateurId, 'equipeId' => $equipeId])) {
            echo "Erreur lors de l'inscription à l'équipe.";
        } else {
            echo "Équipe créée et inscription réussie.";
            // Rediriger vers une page de confirmation ou vers la page de l'équipe
            header("Location: ../vue/Equipes.php");
        }
    } else {
        echo "Erreur lors de la création de l'équipe.";
    }
}
?>
