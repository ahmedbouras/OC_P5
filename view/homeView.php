<?php
$css = "public/css/home.css";
$title = "Accueil";
ob_start()
?>

<div id="hero-image" class="row">
    <div class="col-md-12 align-self-center">
        <div id="hero-text">
            <h1>Besoin d'un<br>site internet ?</h1>
            <h2>Ahmed Bouras</h2>
            <h2>Développeur Web</h2>
            <a class="btn btn-primary-custom" href="index.php#contact-form" role="button">Me contacter</a>
        </div>
    </div>
</div>

<section id="first-section" class="row">
    <div class="d-none d-md-block col-md-6 text-center align-self-center">
        <img src="public/images/client-and-i-resized.png" alt="">
    </div>
    <div class="offset-md-0 col-md-5 offset-sm-2 col-sm-8 text-center align-self-center">
        <h3>Votre site selon vos envies</h3>
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, 
        sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, 
        sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>
    </div>
</section>
<section id="second-section" class="row">
    <div class="offset-md-1 col-md-5 offset-sm-2 col-sm-8 text-center align-self-center">
        <h3>Accessible sur tous types d'écran</h3>
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, 
        sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, 
        sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>
    </div>
    <div class="d-none d-md-block col-md-6 text-center align-self-center">
        <img src="public/images/multiple-devices-resized.png" alt="">
    </div>
</section>

<section id="contact-form" class="row">
    <div class="offset-md-3 col-md-6 offset-sm-1 col-sm-10 text-center">
        <form action="index.php?page=home#contact-form" method="post">
            <h3>Contactez-moi</h3>
            <?php if(isset($message)): ?>
            <div class="alert alert-<?= $alert ?>" role="alert"> <?= $message ?> </div>
            <?php endif ?>
            <input type="text" name="name" class="form-control" placeholder="Nom" required>
            <input type="email" name="email" class="form-control" placeholder="E-mail" required>
            <textarea name="message" class="form-control" cols="30" rows="5" placeholder="Message" required></textarea>
            <button type="submit" class="btn btn-primary-custom btn-form">Envoyer</button>
        </form>
    </div>
</section>

<?php
$content = ob_get_clean();
require 'templates/frontend.php';
?>