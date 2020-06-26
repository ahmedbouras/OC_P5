<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Open+Sans:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/backend.css">
    <link rel="stylesheet" href="<?= $css ?>">
    <title><?= $title ?></title>
</head>
<body>
    <div class="container-fluid">

        <header class="row">
            <nav id="nav-backend" class="col-12">
                <div class="row">
                    <div class="col-6 d-flex justify-content-end">
                        <a href="index.php" class="btn btn-primary-custom" role="button">Voir mon site</a>
                    </div>
                    <div class="col-6 d-flex justify-content-start">
                        <a href="index.php?deconnexion" class="btn btn-danger" role="button">Se déconnecter</a>
                    </div>
                </div>
            </nav>
        </header>

        <?= $content ?>
                
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>