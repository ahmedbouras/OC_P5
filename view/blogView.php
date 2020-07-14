<?php
$css = "public/css/blog.css";
$title = "Blog";
ob_start()
?>

<div class="row">
    <div id="bloc-title" class="col-12 d-flex align-items-center justify-content-center">
        <h1>Blog</h1>
    </div>
</div>
<div class="row">
    <div id="bloc-posts" class="col-md-10 offset-md-1">
        <?php foreach($listArticles as $key => $article): ?>
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title"><?= $article->getTitle() ?></h5>
                <p class="card-text"><?= $article->getChapo() ?></p>
                <a href="index.php?page=article&id=<?= $article->getId() ?>" class="btn btn-primary-custom">Voir l'article</a>
            </div>
            <div class="card-footer text-muted">
                Mis à jour le <?= $article->getLatest_update_fr() ?></div>
        </div>
        <?php endforeach ?>
    </div>
</div>


<?php
$content = ob_get_clean();
require 'templates/frontend.php';
?>