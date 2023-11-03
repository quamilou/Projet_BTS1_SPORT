<html>
    <head>
    <link rel="stylesheet" href="assert/style.css">
  <body>
    <header>
      <h1>AspireSport</h1>
      <nav>
        <ul>
          <li><a href= >Menu</a></li>
          <li><a href= >Personnel</a></li>
          <li><a href= >Equipes</a></li>
          <li><a href= >Planning</a></li>
          <li><a href= >Sports</a></li>
        </ul>
      </nav>
    </header>
        <body>
            <main>
                <section>
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
                        
            echo '<section><h2> Bienvenue '.$utilisateur['nom'].' '. $utilisateur['prenom'].'</h2></section>'.
            '<main><p>'.$utilisateur['age'].'</p></main>'.
            '<p>'.$utilisateur['poids'].'</p>'.
            '<p>'.$utilisateur['taille'].'</p>'.
            '<p>'.$utilisateur['sexe'].'</p>'.
            '<p>'.$utilisateur['IMC'].'</p>';
        }else{
            echo 'Le nom '.$nom.' ou mot de passe NOT CORRECT '.'</br>';
        }
    }
?>  

                    </section>
                </main>
            </body>
</html>