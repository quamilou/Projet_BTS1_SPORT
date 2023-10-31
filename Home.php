<html>
    <head>
    <link rel="stylesheet" href="assert/style.css">
  <body>
    <header>
      <h1>Mon Portfolio</h1>
      <nav>
        <ul>
          <li><a href= >Accueil</a></li>
          <li><a href= >Epreuve E4</a></li>
          <li><a href= >Epreuve E5</a></li>
        </ul>
      </nav>
    </header>
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

        if($nom == $utilisateur['nom'] && $mdp == $utilisateur['mdp'] ){
                        
            echo $utilisateur['nom'].'</br>';
            echo $utilisateur['prenom'].'</br>';
            echo $utilisateur['age'].'</br>';
            echo $utilisateur['poids'].'</br>';
            echo $utilisateur['taille'].'</br>';
            echo $utilisateur['sexe'].'</br>';
            echo $utilisateur['IMC'].'</br>';
        }else{
            echo 'Le nom '.$nom.' ou mot de passe NOT CORRECT '.'</br>';
        }
    }
?>  



    </body>
</html>