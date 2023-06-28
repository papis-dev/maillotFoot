<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=maillotfoot;charset=utf8', 'root', '');
if(isset($_GET['type']) AND $_GET['type'] == 'membre') {
   if(isset($_GET['confirme']) AND !empty($_GET['confirme'])) {
      $confirme = (int) $_GET['confirme'];
      $req = $bdd->prepare('UPDATE utilisateur SET confirme = 1 WHERE nomUtilisateur = ?');
      $req->execute(array($confirme));
   }
   if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
      $supprime = (int) $_GET['supprime'];
      $req = $bdd->prepare('DELETE FROM utilisateur WHERE nomUtilisateur = ?');
      $req->execute(array($supprime));
   }
}
$utilisateur = $bdd->query('SELECT * FROM utilisateur ORDER BY nomUtilisateur ');
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8" />
   <title>Administration</title>
</head>
<body>
   <ul>
      <?php while($m = $utilisateur->fetch()) { ?>
      <li><?= $m[''] ?> : <?= $m['nomUtilisateur'] ?><?php if($m['confirme'] == 0) { ?> - <a href="index.php?type=membre&confirme=<?= $m['nomUtilisateur'] ?>">Confirmer</a><?php } ?> - <a href="index.php?type=membre&supprime=<?= $m['nomUtilisateur'] ?>">Supprimer</a></li>
      <?php } ?>
   </ul>
   <br /><br />
</body>
</html>