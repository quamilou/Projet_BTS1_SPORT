<html>
    <head>
        <h1>Home</h1>
    </head>
    <body>
        <h3>Hello !!!</h3>
<?php
$serveur = "localhost";
$utilisateur = "root";
$motDePasse = "";
$baseDeDonnees = "aspiresport_bdd";

$nom = $_POST['nom'];
$mdp = $_POST['mdp'];

try {
        $connexion = new PDO("mysql:host=$serveur;dbname=$baseDeDonnees",$utilisateur,$motDePasse);
    
    } catch (PDOException $e) {
        die ("pas connecter :" . $e->getMessage());
    }
    
    $requete = $connexion->prepare("SELECT * FROM client WHERE nom = '$nom' AND mdp = '$mdp'");
    $requete->execute();
    $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);

    foreach ($resultats as $utilisateur) {  
          
        echo $utilisateur['nom'].'</br>';
        echo $utilisateur['prenom'].'</br>';
        echo $utilisateur['age'].'</br>';
        echo $utilisateur['poids'].'</br>';
        echo $utilisateur['taille'].'</br>';
        echo $utilisateur['sexe'].'</br>';
        echo $utilisateur['IMC'].'</br>';
       
    }
?>  



    </body>
</html>