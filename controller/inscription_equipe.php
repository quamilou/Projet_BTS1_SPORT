<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Error_inscription</title>
        <link rel="stylesheet" href="../assert/style.css">
    </head>
    <body>
        <main>
        <form class="alllogin" action="../vue/Home.php" method="POST"> 
            <h2>Error_inscription</h2>
<?php
require "../model/CBDD.php";
session_start();

// Vérifie si des équipes ont été sélectionnées
if (!empty($_POST['equipeId']) && is_array($_POST['equipeId'])) {
    $utilisateurId = $_SESSION['user']['Id_Client'];
    
    foreach ($_POST['equipeId'] as $equipeId) {
        // Vérifier si l'utilisateur est déjà inscrit à l'équipe dans la table `appartient`
        $checkInscription = $pdo->prepare("SELECT COUNT(*) FROM appartient WHERE Id_Client = :utilisateurId AND Id_Equipe = :equipeId");
        $checkInscription->execute(['utilisateurId' => $utilisateurId, 'equipeId' => $equipeId]);
        
        if ($checkInscription->fetchColumn() == 0) {
            // Inscrire l'utilisateur à l'équipe si non déjà inscrit
            $stmt = $pdo->prepare("INSERT INTO appartient (Id_Client, Id_Equipe) VALUES (:utilisateurId, :equipeId)");
            $stmt->execute(['utilisateurId' => $utilisateurId, 'equipeId' => $equipeId]);
        }
    }

    // Redirection avec un message de succès
    header("Location: ../vue/Equipes.php?success=1");
    exit;
} else {
    // Gérer le cas où aucune équipe n'est sélectionnée avec une redirection et message d'erreur
    //header("Location: ../vue/Equipes.php?error=1");
    //exit;
    echo "Aucune équipe n'est sélectionnée";
}
?>
