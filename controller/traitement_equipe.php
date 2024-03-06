<?php
require "../model/CBDD.php";
session_start();

// Récupère le nom de l'équipe à partir du formulaire
$nomEquipe = $_POST['nom_groupe'];

// Vérifie si une équipe avec le même nom existe déjà
$stmt = $pdo->prepare("SELECT COUNT(*) FROM equipe WHERE nom_groupe = :nom_groupe");
$stmt->execute(['nom_groupe' => $nomEquipe]);
$equipeExistante = $stmt->fetchColumn();

if ($equipeExistante > 0) {
    // Si une équipe existe déjà avec ce nom, redirige avec un message d'erreur
    header("Location: ../controller/creer_equipe.php?erreur=nomExistant");
    exit;
} else {
    // Sinon, crée l'équipe dans la base de données
    $stmt = $pdo->prepare("INSERT INTO equipe (nom_groupe) VALUES (:nom_groupe)");
    $stmt->execute(['nom_groupe' => $nomEquipe]);

    // Récupère l'ID de l'équipe créée
    $equipeId = $pdo->lastInsertId();

    // Récupère l'ID de l'utilisateur à partir de la session
    $utilisateurId = $_SESSION['user']['Id_Client'];

    // Inscrire l'utilisateur à l'équipe automatiquement
    $stmt = $pdo->prepare("INSERT INTO appartient (Id_Client, Id_Equipe) VALUES (:utilisateurId, :equipeId)");
    $stmt->execute(['utilisateurId' => $utilisateurId, 'equipeId' => $equipeId]);

    // Rediriger vers une page de confirmation ou de gestion d'équipe
    header("Location: ../vue/Equipes.php?success=creation");
    exit;
}
?>
