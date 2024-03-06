<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Error_Equipe</title>
        <link rel="stylesheet" href="../assert/style.css">
    </head>
    <body>
        <main>
        <form class="alllogin" action="../vue/Home.php" method="POST"> 
            <h2>Error_Equipe</h2>
<?php
require "../model/CBDD.php";
session_start();

$utilisateurId = $_SESSION['user']['Id_Client'];
$equipeId = $_GET['equipeId'] ?? null;

if ($equipeId) {
    $stmt = $pdo->prepare("DELETE FROM appartient WHERE Id_Client = :utilisateurId AND Id_Equipe = :equipeId");
    $stmt->execute(['utilisateurId' => $utilisateurId, 'equipeId' => $equipeId]);

    // Redirection avec message de succès
    header("Location: ../vue/Equipes.php?success=2");
    exit;
} else {
    //Erreur
    //header("Location: Equipes.php?error=2");
    //exit;
    echo "Erreur l'équipe n'as pas était quitter";
}
?>
