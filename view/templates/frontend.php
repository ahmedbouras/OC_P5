<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Open+Sans:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/frontend.css">
    <link rel="stylesheet" href="<?= $css ?>">
    <title><?= $title ?></title>
</head>
<body>
    <div class="container-fluid">

        <header class="row">
            <nav class="col-12 navbar fixed-top navbar-expand-lg navbar-light bg-white">
                <a class="navbar-brand" href="index.php">
                <img src="public/images/AB_logo_rmbg.png" height="40" alt="logo du site">
                </a>

                <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=blog">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#contact-form">Contact</a>
                        </li>
                        <?php if(isset($_SESSION['id'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=dashboard">Tableau de bord</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=deconnexion">Se deconnecter</a>
                        </li>
                        <?php endif ?>
                    </ul>
                </div>
            </nav>
        </header>

        <?= $content ?>

        <footer class="row">
            <div class="col-md-6 align-self-center">
                <ul class="d-flex justify-content-center">
                    <li>
                        <a href="public/cv_ahmedbouras.pdf">Mon CV</a>
                    </li>
                    <li>
                        <a href="index.php?page=loginPage"> Interface Admin</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 align-self-center">
                <ul class="d-flex justify-content-center">
                    <li>Retrouvez-moi sur :</li>
                    <li>
                        <a href="https://www.linkedin.com/in/ahmed-bouras/" target="blank">Linkedin</a>
                    </li>
                    <li>
                        <a href="https://github.com/ahmedbrs" target="blank">Github</a>
                    </li>
                </ul>
            </div>
        </footer>
                
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>