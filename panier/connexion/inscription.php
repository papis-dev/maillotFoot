<html>
	<head>
		<meta charset="UTF-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    	<title>Inscription</title>
  	</head>
  	<body>
	  <div id="container">  
		<form method="POST" action="verifinscription.php">
			<h1>S'inscrire</h1>
			<label><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="nomUtilisateur" required>
            <label><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="motDePasse" required>
			<label><b>Re-tapez le mot de passe</b></label>
			<input type="password" name="mdp_retype" placeholder="Re-tapez votre mot de passe" autocomplete="off" required>
			<input type="submit" name='submit' value='INSCRIPTION' >
			
			
		</form>
	  </div>	
  	</body>
</html>


