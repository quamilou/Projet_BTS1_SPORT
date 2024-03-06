<?php
$serveur = "localhost";
$utilisateur = "root";
$motDePasse = "";
$baseDeDonnees = "aspiresport_bdd";

try {
        $pdo = new PDO("mysql:host=$serveur;dbname=$baseDeDonnees",$utilisateur,$motDePasse);
        // Pour gérer correctement les erreurs (voir php doc)
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) 
    {
        die ("Impossible de se connecter à la base de données : " . $e->getMessage());
    }
?>