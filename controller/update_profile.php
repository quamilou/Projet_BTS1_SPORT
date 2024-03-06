<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Error_profil</title>
        <link rel="stylesheet" href="../assert/style.css">
    </head>
    <body>
        <main>
        <form class="alllogin" action="../vue/Home.php" method="POST"> 
            <h2>Error_profil</h2>
<?php
require "../model/CBDD.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $poids = $_POST['poids'];
    $taille = $_POST['taille'];
    $sexe = $_POST['sexe'];
    $IMC = $_POST['IMC'];
    $mdp = $_POST['mdp'];

    // Validation du sexe
    if (!in_array($sexe, ['1', '2'])) {
        die("Le sexe spécifié est invalide.");
    }

    // Validation de la date de naissance
    $dateObj = DateTime::createFromFormat('Y-m-d', $age);
    if (!$dateObj || $dateObj->format('Y-m-d') !== $age) {
        die("Le format de la date de naissance est invalide. Utilisez le format YYYY-MM-DD.");
    }

    // Mise à jour de la base de données
    $stmt = $pdo->prepare("UPDATE client SET nom = :nom, prenom = :prenom, 
    age = :age, poids = :poids, taille = :taille, sexe = :sexe, IMC = :IMC, mdp = :mdp 
    WHERE Id_Client = :Id_Client");

    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':poids', $poids);
    $stmt->bindParam(':taille', $taille);
    $stmt->bindParam(':sexe', $sexe);
    $stmt->bindParam(':IMC', $IMC);
    $stmt->bindParam(':mdp', $mdp);
    $stmt->bindParam(':Id_Client', $_SESSION['user']['Id_Client']);
    
    if ($stmt->execute()) {
        // Met à jour les informations de l'utilisateur dans la session
        $_SESSION['user']['nom'] = $nom;
        $_SESSION['user']['prenom'] = $prenom;
        $_SESSION['user']['age'] = $age;
        $_SESSION['user']['poids'] = $poids;
        $_SESSION['user']['taille'] = $taille;
        $_SESSION['user']['sexe'] = $sexe;
        $_SESSION['user']['IMC'] = $IMC;
        $_SESSION['user']['mdp'] = $mdp;
        
        // Redirige l'utilisateur vers la page de profil avec un message de succès
        header("Location: ../vue/Personnel.php?message=Profil mis à jour avec succès");
    } else {
        // Gérer l'erreur
        echo "Une erreur s'est produite lors de la mise à jour.";
    }
}
?>
