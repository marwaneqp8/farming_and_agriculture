<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php include 'include/nav.php' ?>
    <div class="container">
        <H4>Ajoute utilisateur</H4>
        <?php 
            if(isset($_POST['ajouter'])){ //vérification de la création du mot de passe et du nom
                $login = $_POST['login'];
                $pswd  = $_POST['password'];

                if(!empty($login) && !empty($pswd)){
                    require_once 'include/database.php'; // Connexion avec la base de données
                    $date = date('Y-m-d'); //Afficher la date de création de utilisateur
                    $sqlState = $pdo ->prepare('INSERT INTO utilisateur VALUES(null,?,?,?)');
                    $sqlState->execute([$login, $pswd, $date]);
                    // Redirection
                    header(header: 'location: connexion.php');

                }else{
                    ?> 
                    <div class="alert alert-danger" role="alert">
                        logine , password sont obligatoires
                    </div>
                    <?php
                }
            }
        ?>
        <form method="post">
        <label  class="form-label">login</label>
        <input type="text" class="form-control" name="login">

        <label  class="form-label">Password</label>
        <input type="password" class="form-control" name="password">

        <input type="submit" value="Ajoute utilisateur" class="btn btn-primary my-2 " name="ajouter">
        </form>
    </div> 
</body>
</html>