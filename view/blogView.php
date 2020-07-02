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
        <?php while($data = $listPosts->fetch()): ?>
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title"><?= $data['title'] ?></h5>
                <p class="card-text"><?= $data['chapo'] ?></p>
                <a href="index.php?post&id=<?= $data['id'] ?>" class="btn btn-primary-custom">Voir l'article</a>
            </div>
            <div class="card-footer text-muted">
                Mis à jour le <?= $data['latest_update_fr'] ?></div>
        </div>
        <?php endwhile ?>
    </div>
</div>


<?php
$content = ob_get_clean();
require 'templates/frontend.php';
?>