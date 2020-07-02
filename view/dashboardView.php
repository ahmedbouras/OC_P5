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
                <p>Nombre d'articles dans mon blog : <?= PostManager::getNbPosts() ?></p>
                <p>Nombre de commentaires en attentes de validation : <?= CommentManager::getNbCommentsNoValid() ?></p>
            </div>
            <div class="tab-pane fade" id="nav-articles" role="tabpanel" aria-labelledby="nav-articles-tab">
                <a href="index.php?dashboardPost" class="btn btn-outline-primary-custom">Créer un article</a>
                <?php while($data = $listPosts->fetch()): ?>
                <div class="bloc-data">
                    <p><strong><?= $data['title'] ?></strong></p>
                    <a href="index.php?dashboardPost&id=<?= $data['id'] ?>" class="modify">Modifier</a>
                    <a href="index.php?deletePost&id=<?= $data['id'] ?>" class="delete">Supprimer</a>
                </div>
                <?php endwhile ?>
            </div>
            <div class="tab-pane fade" id="nav-commentaires" role="tabpanel" aria-labelledby="nav-commentaires-tab">
            <?php while($data = $listCommentsNoValid->fetch()): ?>
                <div class="bloc-data">
                    <p><?= $data['comment'] ?></p>
                    <a href="index.php?validComment&id=<?= $data['id'] ?>" class="modify">Valider</a>
                    <a href="index.php?deleteComment&id=<?= $data['id'] ?>" class="delete">Supprimer</a>
                </div>
                <?php endwhile ?>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require 'templates/backend.php';
?>