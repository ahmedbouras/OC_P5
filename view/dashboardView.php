<?php
$css = "public/css/dashboard.css";
$title = "Tableau de bord";
ob_start()
?>

<div id="bloc-dashboard" class="row">
    <div class="offset-1 col-10">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Général</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Articles</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Comentaires</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <p>Nombre d'articles dans mon blog : </p>
                <p>Nombre de commentaires en attentes de validation : </p>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <a href="index.php?createPost" class="btn btn-outline-primary-custom">Créer un article</a>
                <div class="bloc-data">
                    <p> <strong>Titre article</strong></p>
                    <a href="index.php?modifyPost" class="modify">Modifier</a>
                    <a href="index.php?deletePost" class="delete">Supprimer</a>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="bloc-data">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae et suscipit amet minima exercitationem ea ducimus cupiditate magnam. Earum impedit exercitationem, incidunt repellendus aspernatur quos praesentium aperiam veniam velit voluptatem.</p>
                    <a href="index.php?validComment" class="modify">Valider</a>
                    <a href="index.php?deleteComment" class="delete">Supprimer</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require 'templates/backend.php';
?>