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

if ($_SESSION['user']['type'] < 2 ) {
    header('Location: ../vue/Home.php');
    exit;
}

if (isset($_POST['creerUtilisateur'])) {
    // Récupère les informations du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $poids = $_POST['poids'];
    $taille = $_POST['taille'];
    $sexe = $_POST['sexe'];
    $IMC = $_POST['IMC'];
    $type = $_POST['type'];
    $mdp = $_POST[ 'mdp' ];

    // Insère le nouvel utilisateur dans la base de données
    $stmt = $pdo->prepare("INSERT INTO client (nom, prenom, age, poids, taille, sexe, IMC, mdp, type) VALUES (:nom, :prenom, :age, :poids, :taille, :sexe, :IMC, :mdp, :type)");
    if($stmt->execute([
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':age' => $age,
        ':poids' => $poids,
        ':taille' => $taille,
        ':sexe' => $sexe,
        ':IMC' => $IMC,
        ':mdp' => $mdp,
        ':type' => $type
    ]))
    {
        header("Location: ../vue/Ajoute_sport");
    }else{
        echo "Erreur lors de la creation du participant.";
    }
}
?>