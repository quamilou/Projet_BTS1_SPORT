<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Error_login</title>
        <link rel="stylesheet" href="../assert/style.css">
    </head>
    <body>
        <main>
        <form class="alllogin" action="../vue/Home.php" method="POST"> 
            <h2>Error_login</h2>
<?php
session_start();
// Inclure le fichier de connexion à la base de données ici
require "../model/CBDD.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $mdp = $_POST['mdp'];
    
    // Validation basique
    if (empty($nom) || empty($mdp)) {
        die('Les champs nom d’utilisateur et mot de passe sont requis.');
    }

    // Préparation de la requête
    $stmt = $pdo->prepare("SELECT * FROM client WHERE nom = :nom AND mdp = :mdp");
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':mdp', $mdp);

    $stmt->execute();

    // Vérification des résultats
    if ($stmt->rowCount() > 0) {
        // Connexion réussie
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['user'] = $user;
        header('Location:../vue/Home.php');
        exit;
    } else {
        // Échec de la connexion

        header('Location: ../vue/testform.html');
        //echo "Mot de passe incorrect .";
    }
}
?>
            <button type="submit">Valider</button>
        </form>
        </main>
    </body>
</html>