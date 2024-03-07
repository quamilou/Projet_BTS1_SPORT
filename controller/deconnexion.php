<?php
session_start(); // Démarre la session

// Détruit toute la session
session_destroy();

// Redirige vers la page de connexion ou la page d'accueil
header('Location: ../vue/index.html');
exit;
?>
