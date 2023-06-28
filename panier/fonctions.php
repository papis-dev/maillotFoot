	<?php
	 session_start();
	function pdo_connect_mysql(){
	    // Mettez à jour les détails ci-dessous avec les données de votre base de données MySQL.
	    $DATABASE_HOST = 'localhost';
	    $DATABASE_USER = 'root';
	    $DATABASE_PASS = '';
	    $DATABASE_NAME = 'maillotfoot';
	    try {
	 return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
	    } catch (PDOException $exception) {
	   // S'il y a une erreur de connexion, arrêtez le script et affichez le message erreur.
	      exit('Echec de la connexion à la base de données !');
	    }
	}
	// Template de l'entete de notre page, vous pouvez le personnaliser.
	function template_header($title) {
	// Obtenez le nombre de produits dans le panier, il sera affiché dans l'en-tête.
	$num_items_in_panier = isset($_SESSION['panier'])? count($_SESSION['panier']) : 0;
	echo <<<EOT
	<!DOCTYPE html>
	<html lang="fr">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="style1.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="./style/style-projet2022.css" />   
	
	<script src="scripts/projet2022.js"></script>

	</head>
	<body>
		<div class="promo">
			<span>50% de réduction sur le deuxième article</span>
		</div>
		<header>
			<nav class="nav container">
				<div class="navigation d-flex">
					<div class="icon1">
						<i class='bx bx-menu'></i>
					</div>
					<div class="logo">
						<a href="index1.html">MaillotFoot</a>
					</div>
					<div class="menu">
							<a href="index1.html" class="nav-link" style="padding: 15px;">Accueil</a>			
							<a href="boutique.html" "nav-link" style="padding: 15px;">Boutique</a>
							<a href="http://localhost/ProjetEvaluation/panier/index.php?page=produits" style="padding: 15px;">Maillots Disponibles</a>
							<a href="#" "nav-link" style="padding: 15px;">Mes commandes</a>
					</div>
					<div class="icons d-flex">
						<div><i class="bx bx-search"></i></div>
						<div>
							<a href="http://localhost/ProjetEvaluation/panier/connexion/login.php">
								<i class='bx bx-user'></i>
							</a>
						</div>
						<div><i class="bx bx-heart"></i></div>
						
					</div>
				</div>
			</nav>
		</header>	
	</body>
	        <main>
	EOT;
	}
	function template_header_admin($title) {
		// Obtenez le nombre de produits dans le panier, il sera affiché dans l'en-tête.
		echo <<<EOT
		<!DOCTYPE html>
		<html lang="fr">
		<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="style1.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="./style/style-projet2022.css" />   
		
		<script src="scripts/projet2022.js"></script>
	
		</head>
		<body>
			<div class="promo">
				<span>50% de réduction sur le deuxième article</span>
			</div>
			<header>
				<nav class="nav container">
					<div class="navigation d-flex">
						<div class="icon1">
							<i class='bx bx-menu'></i>
						</div>
						<div class="logo">
							<a href="http://localhost/ProjetEvaluation/panier/admin/adminIndex.html">MaillotFoot</a>
						</div>
						<div class="menu">
								<a href="http://localhost/ProjetEvaluation/panier/admin/adminIndex.html" class="nav-link" style="padding: 15px;">Accueil</a>			
								<a href="http://localhost/ProjetEvaluation/panier/index.php?page=produitAdmin" "nav-link" style="padding: 15px;">Boutique</a>
								<a href="http://localhost/ProjetEvaluation/panier/membres/membres.php" style="padding: 15px;">Utilisateurs</a>
								<a href="#" "nav-link" style="padding: 15px;">Mes commandes</a>
						</div>
						<div class="icons d-flex">
							<div><i class="bx bx-search"></i></div>
							<div>
								<a href="http://localhost/connexion/login.php">
									<i class='bx bx-user'></i>
								</a>
							</div>
							<div><i class="bx bx-heart"></i></div>
							
						</div>
					</div>
				</nav>
			</header>	
		</body>
				<main>
		EOT;
		}
		
	// Template pied de page
	function template_footer() {
	    $year = date('Y');
	    echo <<<EOT
	        </main>
	        <footer>
	            <div class="content-wrapper">
	                <p>&copy; $year, Système de panier d'achats</p>
	            </div>
	        </footer>
	    </body>
	</html>
	EOT;
	}
?>
	
