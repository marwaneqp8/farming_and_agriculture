<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Connexion</title>
</head>
<body>
    <?php include 'include/nav.php' ?>
    <div class="container">
        <?php 
            if(isset($_POST['connexion'])){ //vérification de la création du mot de passe et du nom
                $login = $_POST['login'];
                $pswd  = $_POST['password'];

                if(!empty($login) && !empty($pswd)){
                    require_once 'include/database.php'; // Connexion avec la base de données
                    $sqlState = $pdo ->prepare(query: 'SELECT * FROM utilisateur
                                                        WHERE login=?
                                                        AND password=? ');
                    $sqlState->execute([$login, $pswd]);
                    if ($sqlState->rowCount()>=1 ) {
                        $_SESSION['utilisateur'] = $sqlState->fetch();
                        header(header:'location: admin.php');
                    }else {
                        ?> 
                        <div class="alert alert-danger" role="alert">
                            logine , password sont obligatoires
                        </div>
                        <?php
                    }
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

        <input type="submit" value="connexion" class="btn btn-primary my-2 " name="connexion">
        </form>
    </div> 
</body>
</html>