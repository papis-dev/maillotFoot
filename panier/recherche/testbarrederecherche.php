<?php
	require_once 'log.php';
?>	

<form method="POST" action="recherche.php">
	<input type="search" name="recherche" placeholder="Rechercher un utilisateur">
	<button type="submit" name="send"></button>
</form>

<h1>Front pages</h1>
<h2>All articles</h2>


<div class="article-container">
	<?php
		$sql="SELECT * FROM produits";
		$result=mysqli_query($lien, $sql);
		if(mysqli_num_rows($result)>0)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				echo "<div>
					<h3>".$row['nom']."</h3>
					</div>";
			}
		}
		else
		{
			echo "erreur";
		}
	?>
</div>

