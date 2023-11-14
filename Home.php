<?php //1-
require "CBDD.php";
?>
<html>
    <head>
    <link rel="stylesheet" href="assert/style.css">
  <body>
    <header>
      <h1>AspireSport</h1>
      <nav>
        <ul>
          <li><a href=#>Menu</a></li>
          <li><a href=>Personnel</a></li>
          <li><a href= >Equipes</a></li>
          <li><a href= >Planning</a></li>
          <li><a href=Sport.php>Sports</a></li>
        </ul>
      </nav>
    </header>
        <body>
            <main>
<?php //2-
session_start();
  foreach ($resultats as $utilisateur) {  

    if($nom == $utilisateur['nom'] && $mdp == $utilisateur['mdp'] ){
                    
        echo '<h2> Bienvenue '.$utilisateur['nom'].' '. $utilisateur['prenom'].'</h2>';
    }else{
        echo 'Le nom et/ou mot de passe "NOT CORRECT" ';
    }
  }
?>
          <section>
<?php //3-
?>
          </section>
            </main>
<?php //4-
    foreach ($resultats as $utilisateur) {  

        if($nom == $utilisateur['nom'] && $mdp == $utilisateur['mdp'] ){
    
            echo '<main><p>'.$utilisateur['age'].'</p>'.
            '<p>'.$utilisateur['poids'].'</p>'.
            '<p>'.$utilisateur['taille'].'</p>'.
            '<p>'.$utilisateur['sexe'].'</p>'.
            '<p>'.$utilisateur['IMC'].'</p></main>';
        }
    }
?>  


            </body>
</html>