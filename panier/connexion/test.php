<?php

$source = "mysql:host=localhost;dbname=maillotfoot";
$login = "papis";
$mdp = "motdepasse";

try{
    $db = new PDO($source, $login, $mdp);
    echo "vous êtes connecté";
}

catch(PDOException $e){
    $error_message = $e->getMessage();
    echo $error_message;
    exit();
}
?>