<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Ajoute categorie</title>
</head>
<body>
    <?php include 'include/nav.php' ?>
    <div class="container">
        <H4>Ajoute categorie</H4>
        <?php 
            if (isset($_POST['ajouter'])) {
                $libelle = $_POST['libelle'];
                $description = $_POST['description'];
                $date = date('Y-m-d');


                if (!empty($libelle) && !empty($description)) {
                    require_once 'include/database.php';
                    $sqlState = $pdo->prepare(query: 'INSERT INTO categorie( libelle, description , date_creation) VALUES(?,?,?)');
                    $sqlState ->execute([$libelle,$description,$date]);
                    ?>
                    <div class="alert alert-success" role="alert">
                        la catégorie <?php echo $libelle ?> est bien ajoutée.
                    </div>
                    <?php
                }else{
                    ?>
                    <div class="alert alert-danger" role="alert">
                        libelle , description sont obligatoires
                    </div>
                    <?php
                }
            }
        ?>
        <form method="post">
        <label  class="form-label">libelle</label>
        <input type="text" class="form-control" name="libelle">

        <label  class="form-label">Description</label>
        <textarea class="form-control" name="description"></textarea>

        <input type="submit" value="Ajoute catégorie" class="btn btn-primary my-2 " name="ajouter">
        </form>
        
    </div> 
</body>
</html>