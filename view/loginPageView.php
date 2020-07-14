<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Open+Sans:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/loginPage.css">
    <title>Se connecter</title>
</head>
<body>

    <div class="container-fluid text-center">
        <div class="row">
            <div id="bloc-logo" class="col-12 d-flex align-items-end justify-content-center">
                <a href="index.php">
                <img src="public/images/AB_logo_rmbg.png" height="40" alt="logo du site">
                </a>
            </div>
            <div id="bloc-connexion" class="col-12 d-flex align-items-center justify-content-center">
                <form action="index.php?page=attemptConnexion" method="post" class="card">
                    <div class="form-group">
                        <?php if(isset($message)): ?>
                        <div class="alert alert-<?= $alert ?>" role="alert"> <?= $message ?> </div>
                        <?php endif ?>
                        <label for="login">Login</label>
                        <input type="text" class="form-control" id="login" name="login" required>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Mot de Passe</label>
                        <input type="password" class="form-control" id="pwd" name="pwd" required>
                    </div>
                    <button type="submit" class="btn btn-primary-custom">Submit</button>
                </form>
            </div>
            
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>