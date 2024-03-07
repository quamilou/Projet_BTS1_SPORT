<?php
require "../model/CBDD.php";
session_start();

// Assure-toi que seul l'admin peut accéder à cette page
if ($_SESSION['user']['type'] != 3) {
    header('Location: ../vue/Home.php');
    exit;
}

//formulaire d'ajout de sport
if (isset($_POST['ajouterSport']) && !empty($_POST['nomSport'])) {
    $nomSport = $_POST['nomSport'];

    // Prépare la requête d'insertion
    $stmt = $pdo->prepare("INSERT INTO sport (nom_sport) VALUES (:nomSport)");

    // Lie les paramètres et exécute la requête
    $stmt->bindParam(':nomSport', $nomSport, PDO::PARAM_STR);

    if ($stmt->execute()) {
        $message = "Sport ajouté avec succès !";
    } else {
        $message = "Erreur lors de l'ajout du sport.";
    }
} else if (isset($_POST['ajouterSport'])) {
    $message = "Le nom du sport ne peut pas être vide.";
}

//formulaire de suppression de sport
if (isset($_POST['supprimerSport']) && !empty($_POST['idSport'])) {
    $idSport = $_POST['idSport'];

    // Prépare la requête de suppression
    $stmt = $pdo->prepare("DELETE FROM sport WHERE Id_Sport = :idSport");

    // Lie les paramètres et exécute la requête
    $stmt->bindParam(':idSport', $idSport, PDO::PARAM_INT);

    if ($stmt->execute()) {
        $message = "Sport supprimé avec succès !";
    } else {
        $message = "Erreur lors de la suppression du sport.";
    }
} else if (isset($_POST['supprimerSport'])) {
    $message = "Veuillez sélectionner un sport à supprimer.";
}

//formulaire de création d'utilisateur
if (isset($_POST['creerUtilisateur'])) {
    // Récupère les informations du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $poids = $_POST['poids'];
    $taille = $_POST['taille'];
    $sexe = $_POST['sexe'];
    $IMC = $_POST['IMC'];
    //$mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT); // Hash le mot de passe
    $mdp = $_POST['mdp'];
    $type = $_POST['type'];

    // Insère le nouvel utilisateur dans la base de données
    $stmt = $pdo->prepare("INSERT INTO client (nom, prenom, age, poids, taille, sexe, IMC, mdp, type) VALUES (:nom, :prenom, :age, :poids, :taille, :sexe, :IMC, :mdp, :type)");
    $stmt->execute([
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':age' => $age,
        ':poids' => $poids,
        ':taille' => $taille,
        ':sexe' => $sexe,
        ':IMC' => $IMC,
        ':mdp' => $mdp,
        ':type' => $type
    ]);

    if ($stmt) {
        $message = "Utilisateur créé avec succès.";
    } else {
        $message = "Erreur lors de la création de l'utilisateur.";
    }
}


//modification d'utilisateur
if (isset($_POST['modifierUtilisateur'])) {
    $idUtilisateur = $_POST['Id_Client'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $poids = $_POST['poids'];
    $taille = $_POST['taille'];
    $sexe = $_POST['sexe'];
    $IMC = $_POST['IMC'];
    $mdp = !empty($_POST['mdp']) ? password_hash($_POST['mdp'], PASSWORD_DEFAULT) : null; // Ne change le mot de passe que s'il est fourni
    $type = $_POST['type'];

    // Met à jour l'utilisateur dans la base de données
    $sql = "UPDATE client SET nom = :nom, prenom = :prenom, age = :age, poids = :poids, taille = :taille, sexe = :sexe, IMC = :IMC, type = :type";
    if ($mdp) $sql .= ", mdp = :mdp";
    $sql .= " WHERE id = :Id_Client";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':poids', $poids);
    $stmt->bindParam(':taille', $taille);
    $stmt->bindParam(':sexe', $sexe);
    $stmt->bindParam(':IMC', $IMC);
    if ($mdp) $stmt->bindParam(':mdp', $mdp);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':Id_Client', $idUtilisateur);

    if ($stmt->execute()) {
        echo "L'utilisateur a été mis à jour avec succès.";
    } else {
        echo "Erreur lors de la mise à jour de l'utilisateur.";
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Administration - AspireSport</title>
    <link rel="stylesheet" href="../assert/style.css">
</head>
<body>
    <header>
        <h1>AspireSport - Administration</h1>
    </header>
    <main>
        <h2>Ajouter un Sport</h2>
        <form method="post">
            <input type="text" name="nomSport" required placeholder="Nom du sport">
            <input type="submit" name="ajouterSport" value="Ajouter">
        </form>

        <h2>Supprimer un Sport</h2>
        <form method="post">
            <select name="idSport" required>
                <option value="">Sélectionnez un sport</option>
                <?php
                    $stmt = $pdo->query("SELECT Id_Sport, nom_sport FROM sport ORDER BY nom_sport ASC");
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value=\"{$row['Id_Sport']}\">" . htmlspecialchars($row['nom_sport']) . "</option>";
                    }
                ?>
            </select>
            <input type="submit" name="supprimerSport" value="Supprimer">
        </form>

        <h2>Créer un Utilisateur</h2>
        <form method="post">
            <input type="text" name="nom" placeholder="Nom" required><br>
            <input type="text" name="prenom" placeholder="Prénom" required><br>
            <input type="date" name="age" placeholder="Âge" required><br>
            <input type="number" step="any" name="poids" placeholder="Poids" required><br>
            <input type="number" step="any" name="taille" placeholder="Taille en cm (ex: 175)" required><br>
            <select name="sexe" required>
                <option value="">Sélectionnez le sexe</option>
                <option value="1">Homme</option>
                <option value="2">Femme</option>
            </select><br>
            <input type="text" name="IMC" placeholder="IMC" required><br>
            <input type="password" name="mdp" placeholder="Mot de passe" required><br>
            <select name="type" required>
                <option value="">Sélectionnez un type</option>
                <option value="1">Utilisateur</option>
                <option value="2">Gestionnaire</option>
                <option value="3">Administrateur</option>
            </select><br>
            <input type="submit" name="creerUtilisateur" value="Créer">
        </form>

        <!--<h2>Modifier le Type d'Utilisateur</h2>
        <form method="post">
            
        </form>-->
    </main>
    <?php if (isset($message)) echo "<p>$message</p>"; ?>
</body>
</html>
