<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>list des catégories</title>
</head>
<body>
    <?php include 'include/nav.php' ?>
    <div class="container">
        <h2>list des catégories</h2>
        <a href="ajouter_categorie.php" class="btn btn-primary">ajouter categorie</a>
        <table class="table table-striped table-hover">
            <tr>
                <thead>
                    <th>#ID</th>
                    <th>libelle</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Opération</th>
                </thead>
                <tbody>
                <?php 
                include_once 'include/database.php';
                $cateegories = $pdo ->query('SELECT * FROM categorie')->fetchALL(PDO::FETCH_ASSOC);
                foreach($cateegories as $cateegorie){
                ?>
                <tr>
                    <td><?php echo $cateegorie['id'] ?></td>
                    <td><?php echo $cateegorie['libelle'] ?></td>
                    <td><?php echo $cateegorie['description'] ?></td>
                    <td><?php echo $cateegorie['date_creation'] ?></td>
                    <td>
                        <input type="submit" class="btn btn-primary bnt-sm" value="Modifier">
                        <input type="submit" class="btn btn-danger bnt-sm" value="Supprimer">

                    </td>
                </tr>

                <?php

            }
            ?>
                </tbody>
            </tr>
        </table>
    </div> 
</body>
</html>