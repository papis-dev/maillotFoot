<?php 
	require_once 'log.php';
	/* Determiner le nombre de produits à afficher sur chaque page*/
	$nbr_produits_sur_chaque_page = 16;
	/* La page actuelle, apparaîtra dans l'URL  comme index.php?page=produits&p=1 ou p=2 ce signifié la page 1 l& page 2 etc...*/
	$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
	/* Sélectionnez les produits commandés par la date ajoutée*/
	$stmt = $pdo->prepare('SELECT * FROM produits ORDER BY date_ajou DESC LIMIT ?,?');
	/* bindValue nous permettra d'utiliser des entiers dans la déclaration SQL, que nous devons utiliser pour LIMIT.*/
	$stmt->bindValue(1, ($current_page - 1) * $nbr_produits_sur_chaque_page, PDO::PARAM_INT);
	$stmt->bindValue(2, $nbr_produits_sur_chaque_page, PDO::PARAM_INT);
	$stmt->execute();
	/* récupérer les produits de la base de données et retourner le résultat sous la forme d'un tableau.*/
	$produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	// Obtenir le nombre total de produits
	$total_produits = $pdo->query('SELECT * FROM produits')->rowCount();
	?>
	
	<?=template_header('produits')?>
	<div id="boutique">
	    <div id="produits-wrapper"><tr>
	        <?php foreach ($produits as $produit): ?>
	        <td><a href="index.php?page=produit&id=<?=$produit['id']?>" class="produit">            <img src="imgs/<?=$produit['img']?>" width="200" height="200" alt="<?=$produit['nom']?>"><br>
	            <span class="nom"><?=$produit['nom']?></span><br>
	            <span class="price">
	                &dollar;<?=$produit['prix']?>
	                <?php if ($produit['prix_Réel'] > 0): ?>  
	               <span class="prix_Réel">&dollar;<?=$produit['prix_Réel']?></span>
	                <?php endif; ?>
	            </span>
	        </a></td>
	        <?php endforeach; ?>
	               </tr>
	    </div>
		<form method="POST" action="http://localhost/ProjetEvaluation/panier/recherche/recherche.php">
			<input type="search" name="recherche" placeholder="Rechercher un maillot">
			<button type="submit" name="send">send</button>
		</form>
	    
	</div>
	
</div>

  	</div>
	<?=template_footer()?>
	
