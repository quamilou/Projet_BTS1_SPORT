<?php
$serveur = "localhost";
$utilisateur = "root";
$motDePasse = "";
$baseDeDonnees = "aspiresport_bdd";

session_start();

$nom = $_SESSION['user'];
$mdp = $_POST['mdp'];

try {
        $connexion = new PDO("mysql:host=$serveur;dbname=$baseDeDonnees",$utilisateur,$motDePasse);
    } catch (PDOException $e) 
    {
        die ("pas connecter :" . $e->getMessage());
    }
    $requete = $connexion->prepare("SELECT * FROM client WHERE nom = '$nom' AND mdp = '$mdp'");
    $requete->execute();
    
    $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);

?>