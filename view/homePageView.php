<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Open+Sans:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/homePage.css">
    <title>Accueil</title>
</head>
<body>
    <div class="container-fluid">

        <?php include 'view/header.php'; ?>

        <div id="hero-image" class="row">
            <div class="col-12 align-self-center">
                <div id="hero-text">
                    <h1>Besoin d'un<br>site internet ?</h1>
                    <h2>Ahmed Bouras</h2>
                    <h2>Développeur Web</h2>
                    <a class="btn btn-primary-custom" href="#" role="button">Me contacter</a>
                </div>
            </div>
        </div>

        <section id="first-section" class="row">
            <div class="col-6 text-center align-self-center">
                <img src="public/images/client-and-i-resized.png" alt="">
            </div>
            <div class="col-5 text-center align-self-center">
                <h3>Votre site selon vos envies</h3>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, 
                sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, 
                sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>
            </div>
        </section>
        <section id="second-section" class="row">
            <div class="offset-1 col-5 text-center align-self-center">
                <h3>Accessible sur tous types d'écran</h3>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, 
                sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, 
                sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>
            </div>
            <div class="col-6 text-center align-self-center">
                <img src="public/images/multiple-devices-resized.png" alt="">
            </div>
        </section>

        <section id="contact-form" class="row">
            <div class="offset-4 col-4 text-center">
                <form action="" method="post">
                    <h3>Contactez-moi</h3>
                    <input type="text" name="name" class="form-control" placeholder="Nom" required>
                    <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                    <textarea name="message" class="form-control" cols="30" rows="5" placeholder="Message" required></textarea>
                    <button type="submit" class="btn btn-primary-custom btn-form">Envoyer</button>
                </form>
            </div>
        </section>

        <?php include 'view/footer.php'; ?>
                
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>