<?php
	// Obtenez les 4 produits récemment ajoutés 
	$stmt = $pdo->prepare('SELECT * FROM produits ORDER BY date_ajou ');
	$stmt->execute();
	$recently_added_produits = $stmt->fetchAll(PDO::FETCH_ASSOC);?>	
	
	<?=template_header_admin('produits')?>
	<div class="featured">
	</div>
	<div id="boutique">
	    <div id="produits-wrapper">
	    <div class="produits" width="100%"><tr>
	        <?php foreach ($recently_added_produits as $produit): ?>
	        <td><a href="index.php?page=produit&id=<?=$produit['id']?>" class="produit">            <img src="imgs/<?=$produit['img']?>" width="150" height="150" alt="<?=$produit['nom']?>"><br>
	            <span class="name"><?=$produit['nom']?></span><br>
				
	            <span class="price">
	                &dollar;<?=$produit['prix']?>
	                <?php if ($produit['prix_Réel'] > 0): ?>
	                <span class="prix_Réel">&dollar;<?=$produit['prix_Réel']?></span>                <?php endif; ?>
	            </span>
	        </a>
			<br>
			quantité=<span class="quantité"><?=$produit['quantité']?></span><br><br>
			</td>
			
			<button onclick="window.location.href = 'http://localhost/ProjetEvaluation/panier/membres/ajouterArticles.php?id=<?= $produit['id']; ?>';">Ajouter</button>
			<button onclick="window.location.href = 'http://localhost/ProjetEvaluation/panier/membres/bannir_articles.php?id=<?= $produit['id']; ?>';">Supprimer</button>
	        <?php endforeach; ?>
	               </tr>
	    </div></div></div>
	<?=template_footer()?>
	
