<?php
	require_once 'log.php';
    
	if(isset($_POST['submit']))
    {
		if (isset($_POST['nomUtilisateur']) AND isset($_POST['motDePasse'])) 
		{
			$nomUtilisateur=htmlspecialchars($_POST['nomUtilisateur']);
			$motDePasse=htmlspecialchars($_POST['motDePasse']);
			$mdp_retype=htmlspecialchars($_POST['mdp_retype']);
			
			if(!mysqli_num_rows($result) > 0)
            {
                if(strlen($nomUtilisateur<=100))
                {
                    if($motDePasse == $mdp_retype)
                    {
                        
                        $req="INSERT INTO utilisateur (nomUtilisateur, motDePasse) VALUES ('$nomUtilisateur','$motDePasse')";
                        $res=mysqli_query($lien, $req);
						echo "<script>alert(\"Compte crée avec succès (Redirection à faire)\")</script>";
                        
                    }
                    else{  echo "<script>alert(\"Re-tapez le même mot de passe\")</script>";  }
                }
                else{  echo "<script>alert(\"nomtropgrand\")</script>";  }
            }
            else{echo 'incorrect';}
		}
		else 
		{}
        header("location: login.php");
    }
	else
	{
		header("location:inscription.php");
		exit();
	}
?>