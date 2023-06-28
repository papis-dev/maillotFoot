<?php
	require_once 'log.php';
	session_start();
	$mail_admin="admin@maillotfoot.fr";
	$mdp_admin="admin1234";
	if(isset($_POST['submit']))
	{
		if(isset($_POST['mail']) AND isset($_POST['mdp']))
		{
			$mail=htmlspecialchars($_POST['mail']);
			$mdp=htmlspecialchars($_POST['mdp']);
			echo $mail; echo $mail_admin; echo $mdp; echo $mdp_admin;
			if(($mail = $mail_admin) AND ($mdp = $mdp_admin))
			{
				$_SESSION['mdp']=$mdp_admin;
				echo"ok vous êtes l'admin";
				header('Location: http://localhost/ProjetEvaluation/panier/admin/adminIndex.html');
			}
			else
			{
				$request="SELECT * from Utilisateurs WHERE mail='$mail'";
				$result=mysqli_query($lien,$request);
				if(mysqli_num_rows($result)>0)
				{
					echo "<script>alert(\"Vous êtes connectés !\")</script>";
				}
				else
				{
					echo "<script>alert(\"Vous n'avez pas de compte... Voulez-vous en créer un ?\")</script>";
				}
			}
			
		}
	}
?>







