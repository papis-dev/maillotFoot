<?php
    session_start();
    require_once 'log.php';
    if(!$_SESSION['mdp']){
        header('Location: connexion.php');
    }

?>
<DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utd-8">
    <head>
<body>
    <a href="membres.php">Afficher tous les membres</a>
    <a href="bannir_membre.php">Afficher tous les membres</a>
</body>
</html>