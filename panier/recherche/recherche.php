
<h1>Search page</h1>

	<?php
		require_once 'log.php';
		if(isset($_POST['send']))
		{
			$search=mysqli_real_escape_string($lien, $_POST['recherche']);
			$sql="SELECT nom,img FROM produits WHERE nom LIKE '$search'";
			$result=mysqli_query($lien,$sql);
			$queryResult=mysqli_num_rows($result);
			if($queryResult>0)
			{
				echo "There are ".$queryResult." results!";
				while($row=mysqli_fetch_assoc($result))
				{
					echo "<div>
					<h3>".$row['nom']."</h3>
					<h3>".$row['img']."</h3>

					</div>";
				}
			}
			else
			{
				echo "There are no results matching your search!";
			}	
		}
		else
		{
			echo "ouf";
		}
	?>
	