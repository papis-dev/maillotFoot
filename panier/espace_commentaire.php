<!DOCTYPE html>
<?php
    require_once 'log.php';
    session_start();
    if(isset($_GET['id']) AND !empty($_GET['id']))
    {      
        $getId=htmlspecialchars($_GET['id']);
        $sql="SELECT * FROM produits WHERE id = '$getId'";
        $result=mysqli_query($lien,$sql);

        $sql="SELECT * FROM commentaires WHERE id_produits='$getId'";
        $commentaires=mysqli_query($lien, $sql);
        
        if($_POST['submit_commentaires'])
        {
            if(isset($_POST['pseudo']) AND isset($_POST['commentaires']) AND !empty($_POST['pseudo']) AND !empty($_POST['commentaires']))
            {
                $pseudo=htmlspecialchars($_POST['pseudo']);
                $commentaires=htmlspecialchars($_POST['commentaires']);
                if(strlen($pseudo)<25)
                {
                    $sql="INSERT INTO commentairess (pseudo, commentaires, id_produits) VALUES ('$pseudo',''$commentaires','$getId'";
                    $insert=mysqli_query($lien, $sql);
                    echo" Votre message à bien été envoyé";
                }
                else
                {
                    echo"Le pseudo doit faire moins de 25 caractères"; 
                }
            }
        }
    }
    else 
    {
        echo"Tous les champs doivent être complétés";
    }
    
?>


<h2>Comment section</h2>
        
<form method="POST">
    <input type="text" name="pseudo" placeholder="Votre pseudo"><br />
    <div style="overflow: scroll; width: 380px; height: 100px;">
        <textarea name="commentaires" placeholder="Votre commentaires..." style="font-size: 14pt; height: 300px; width:680px; "></textarea>
    </div>
    <input type="submit" placeholder="ecrivez votre commentaires" value="Poster votre commentaires" name="submit-commentaires"></button>
</form>

<?php if(isset($c_erreur)) {echo "Erreur ! ".$c_erreur;}?>
<br />
<?php while($row = mysqli_fetch_assoc($commentaires))
{
   ?>
    <b><?= $row['pseudo'] ?>:<b> <?= $row['commentaires'] ?><br />
    <?php } ?>


