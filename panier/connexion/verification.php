<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
    $db_username = 'papis';
    $db_password = 'motdepasse';
    $db_name     = 'maillotfoot';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
                   
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    $admin="admin";
    $adminpassword="admin";

    if($admin == $username && $adminpassword == $password){
      $_SESSION['password']=$adminpassword;
			echo"ok vous êtes l'admin";
			header('Location: http://localhost/ProjetEvaluation/panier/admin/adminIndex.html');
    }
    
    elseif($username !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM utilisateur where 
              nomUtilisateur = '".$username."' and motDePasse = '".$password."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['username'] = $username;
           header('Location: principale.php');
        }
        else
        {
           header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: login.php');
}
mysqli_close($db); // fermer la connexion
?>