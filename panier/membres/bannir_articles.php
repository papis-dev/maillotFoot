<?php
    session_start();
    require_once 'log.php';
    if(isset($_GET['id']) AND !empty($_GET['id']))
    {
        $getId=$_GET['id'];
        $sql="SELECT id FROM produits WHERE id='$getId'";
        $result=mysqli_query($lien, $sql);
        if(mysqli_num_rows($result) > 0)
        {
            echo $getId;
            $banniruser="DELETE FROM produits WHERE id='$getId'";
            $resultban=mysqli_query($lien,$banniruser);
            header('Location: http://localhost/ProjetEvaluation/panier/index.php?page=produitAdmins');
        }
        else
        {
            echo "L'identifiant n'a pas été récupéré";
        }
    }
    else
    {
        echo "Membre non trouvé";
    }
?>