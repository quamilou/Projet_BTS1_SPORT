<?php
require '../model/CBDD.php'; // Connexion à CBDD

try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT Id_Client, mdp FROM client";
    $stmt = $pdo->query($sql);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id = $row['Id_Client'];
        $password = $row['mdp'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $updateSql = "UPDATE nom SET mdp = :hashedPassword WHERE Id_Client = :Id_Client";
        $updateStmt = $pdo->prepare($updateSql);
        $updateStmt->execute([':hashedPassword' => $hashedPassword, ':Id_Client' => $id]);
    }

    echo "Migration réussie.";
} catch (PDOException $e) {
    die("Erreur lors de la migration : " . $e->getMessage());
}
?>