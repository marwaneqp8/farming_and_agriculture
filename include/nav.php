 <?php
  session_start(); //Fonction qui stocke des données
    $connecte = false;
    if (isset($_SESSION['utilisateur'])) {
      $connecte = true;
     }
 ?>
 <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Farming and Agriculture</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Ajouter utilisateur</a>
        </li>
        <?php
          if($connecte){
            ?>
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="ajouter_categorie.php">Ajouter catégorie</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="ajouter_produit.php">Ajouter produit</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="deconnexion.php">Déconnexion</a>
            </li>
            <?php
          }else{
            ?> 
            <li class="nav-item">
              <a class="nav-link" href="connexion.php">connexion</a>
            </li>
            <?php
          }
        ?>
        
      </ul>
    </div>
  </div>
</nav>