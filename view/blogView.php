<?php
$css = "public/css/blog.css";
$title = "Blog";
ob_start()
?>

<div class="row">
    <div id="bloc-title" class="col-12 d-flex align-items-center justify-content-center">
        <h1 class="">Blog</h1>
    </div>
</div>
<div class="row">
    <div id="bloc-posts" class="col-md-10 offset-md-1">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Titre de l'article</h5>
                <p class="card-text">Ceci est le chapô de mon article.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
                <a href="#" class="btn btn-primary-custom">Voir l'article</a>
            </div>
            <div class="card-footer text-muted">
                Mis à jour le 10/05/2019
            </div>
        </div>
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Titre de l'article</h5>
                <p class="card-text">Ceci est le chapô de mon article.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
                <a href="#" class="btn btn-primary-custom">Voir l'article</a>
            </div>
            <div class="card-footer text-muted">
                Mis à jour le 10/05/2019
            </div>
        </div>
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Titre de l'article</h5>
                <p class="card-text">Ceci est le chapô de mon article.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
                <a href="#" class="btn btn-primary-custom">Voir l'article</a>
            </div>
            <div class="card-footer text-muted">
                Mis à jour le 10/05/2019
            </div>
        </div>
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Titre de l'article</h5>
                <p class="card-text">Ceci est le chapô de mon article.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
                <a href="#" class="btn btn-primary-custom">Voir l'article</a>
            </div>
            <div class="card-footer text-muted">
                Mis à jour le 10/05/2019
            </div>
        </div>
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Titre de l'article</h5>
                <p class="card-text">Ceci est le chapô de mon article.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
                <a href="#" class="btn btn-primary-custom">Voir l'article</a>
            </div>
            <div class="card-footer text-muted">
                Mis à jour le 10/05/2019
            </div>
        </div>
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Titre de l'article</h5>
                <p class="card-text">Ceci est le chapô de mon article.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
                <a href="#" class="btn btn-primary-custom">Voir l'article</a>
            </div>
            <div class="card-footer text-muted">
                Mis à jour le 10/05/2019
            </div>
        </div>
    </div>
</div>


<?php
$content = ob_get_clean();
require 'templates/frontend.php';
?>