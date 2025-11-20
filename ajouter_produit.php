<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Ajoute produit</title>
</head>
<body>
    <?php include_once 'include/database.php'; 
    include 'include/nav.php' ?>
    <div class="container">
        <H4>Ajoute produit</H4>
        <?php 
            if(isset($_POST['ajouter'])){
                $libelle = $_POST['libelle'];
                $prix = $_POST['prix'];
                $discount = $_POST['discount'];
                $categorie = $_POST['categorie'];
                $date = date('Y-m-d');

                if (!empty($libelle) && !empty($prix) && !empty($discount) && !empty($categorie)) {
                    $sqlState = $pdo->prepare('INSERT INTO produit VALUES(NULL,?, ?, ?, ?, ?)');
                    $inserted = $sqlState->execute([$libelle, $prix, $discount, $categorie, $date]);
                    if($inserted) {
                         ?>
                        <div class="alert alert-success" role="alert">
                            le produit <?php echo $libelle ?> est bien ajoutée.
                        </div>
                        <?php
                    }
                    else {
                        ?>
                        <div class="alert alert-success" role="alert">
                            Database Error
                        </div>
                        <?php
                    }

                }else {
                    ?>
                    <div class="alert alert-danger" role="alert">
                            libelle , prix , discount , categorie sont obligatoires.
                    </div>
                    <?php
                }
            }

        ?>
        <form method="post">
        <label  class="form-label">libelle</label>
        <input type="text" class="form-control" name="libelle">

        <label class="form-label">Prix</label> 
        <input type="number" class="form-control" step="0.01" name="prix" min="0">

        <label  class="form-label">discount</label>
        <input type="text" class="form-control" name="discount" min="0" max="90">

        <?php 
            $categories = $pdo->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC);
 
        ?>

        <label  class="form-label">Catégorie</label>
        <select name="categorie" class="form-control">
            <option value="">choisissez une catégorie</option>
            <?php 
                foreach ($categories as $categorie) {
                    echo "<option value='".$categorie['id']."'>".$categorie['libelle']."</option>";
                }
            ?>
            
        </select>
        <input type="submit" value="Ajoute produit" class="btn btn-primary my-2 " name="ajouter">
        </form>
        
    </div> 
</body>
</html>