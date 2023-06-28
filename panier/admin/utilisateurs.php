<?php
  $host = 'localhost';
  $dbname = 'maillotfoot';
  $username = 'root';
  $password = '';
    
  $dsn = "mysql:host=$host;dbname=$dbname"; 
  // récupérer tous les utilisateurs
  $sql = "SELECT * FROM utilisateur";
   
  try{
   $pdo = new PDO($dsn, $username, $password);
   $stmt = $pdo->query($sql);
   
   if($stmt === false){
    die("Erreur");
   }
   
  }catch (PDOException $e){
    echo $e->getMessage();
  }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style1.css">
    <title>VenteDeMaillot</title>
</head>
<body>
    <div class="promo">
        <span>ADMIN</span>
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
                    <div class="top">
                        <span class="fermer">fermer<i class='bx bx-x'></i></span>    
                    </div>
                    <ul class="nav_list d-flex">
                        <li class="nav-item">
                            <a href="index1.html" class="nav-link">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://localhost/ProjetEvaluation/panier/index.php?page=produitAdmin" class="nav-link">Boutique</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://localhost/ProjetEvaluation/panier/membres/membres.php" class="nav-link">Utilisateurs</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Les commandes</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="icons d-flex">
                    <div><i class='bx bx-search'></i></div>
                    <div>
                        <a href="http://localhost/connexion/login.php">
                            <i class='bx bx-user' title="Déconnexion"></i>
                        </a>
                    </div>
                    <div><i class='bx bx-heart'></i></div>
                    <div>
                        <a href="http://localhost/ProjetEvaluation/panier/index.php?page=panier">
                            <i class='bx bx-shopping-bag'></i>
                        </a>
                    </div>
                </div>
            </div>
        </nav>

 <h1>Liste des utilisateurs</h1>
 <table>
   <thead>
     <tr>
       <th>Nom</th>
       <th>Mot de passe</th>
     </tr>
   </thead>
   <tbody>
     <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
     <tr>
       <td><?php echo htmlspecialchars($row['nomUtilisateur']); ?></td>
       <td><?php echo htmlspecialchars($row['motDePasse']); ?></td>
     </tr>
     <?php endwhile; ?>
   </tbody>
 </table>
</body>
</html>