<?php
$css = "public/css/dashboard.css";
$title = "Tableau de bord";
ob_start()
?>

<div id="bloc-dashboard" class="row">
    <div class="offset-1 col-10">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-general-tab" data-toggle="tab" href="#nav-general" role="tab" aria-controls="nav-general" aria-selected="true">Général</a>
                <a class="nav-item nav-link" id="nav-articles-tab" data-toggle="tab" href="#nav-articles" role="tab" aria-controls="nav-articles" aria-selected="false">Articles</a>
                <a class="nav-item nav-link" id="nav-commentaires-tab" data-toggle="tab" href="#nav-commentaires" role="tab" aria-controls="nav-commentaires" aria-selected="false">Comentaires</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-general" role="tabpanel" aria-labelledby="nav-general-tab">
                <p>Nombre d'articles dans mon blog : </p>
                <p>Nombre de commentaires en attentes de validation : </p>
            </div>
            <div class="tab-pane fade" id="nav-articles" role="tabpanel" aria-labelledby="nav-articles-tab">
                <a href="index.php?dashboardPost" class="btn btn-outline-primary-custom">Créer un article</a>
                <div class="bloc-data">
                    <p> <strong>Titre article</strong></p>
                    <a href="index.php?dashboardPost" class="modify">Modifier</a>
                    <a href="index.php?deletePost" class="delete">Supprimer</a>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-commentaires" role="tabpanel" aria-labelledby="nav-commentaires-tab">
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