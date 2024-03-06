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

if (!empty($_POST['idSport']) && is_array($_POST['idSport'])) {
    $idClient = $_SESSION['user']['Id_Client'];
    
    foreach ($_POST['idSport'] as $idSport) {
        $checkInscription = $pdo->prepare("SELECT COUNT(*) FROM pratique WHERE Id_Client = :idClient AND Id_Sport = :idSport");
        $checkInscription->execute(['idClient' => $idClient, 'idSport' => $idSport]);
        
        if ($checkInscription->fetchColumn() == 0) {
            $stmt = $pdo->prepare("INSERT INTO pratique (Id_Client, Id_Sport) VALUES (:idClient, :idSport)");
            $stmt->execute(['idClient' => $idClient, 'idSport' => $idSport]);
        }
    }

    header("Location: ../vue/Sport.php?success=1");
    exit;
} else {
    //header("Location: Sport.php?error=1");
    //exit;
    echo "Aucune sport n'est sélectionnée";
}
?>

