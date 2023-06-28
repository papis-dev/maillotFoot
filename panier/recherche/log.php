<!DOCTYPE html>
<html>
<head>
	<title>testbdd</title>
</head>
<body>

<?php
    $serveur="localhost";
    $utilisateur="root";
	$mot_de_passe="";
	$base="maillotfoot";
	$lien=mysqli_connect($serveur, $utilisateur, $mot_de_passe);
	mysqli_select_db( $lien, $base);

    //On a pas réussi a se connecter
	if (!$lien) {
	    echo "Erreur: nous n'avons pas pu nous connecter à la base";
        ?>
        <form action="log.php" method="post">
            <input type="submit" value="Revenir à la page de connexion" />
        </form>
        <?php
	}
	else {
		/*foreach($lien->query('SELECT nom from Utilisateurs') as $row)
		{
			print_r($row);
		echo "okokok";
		}*/
	}
		?>
    

</body>
</html>
