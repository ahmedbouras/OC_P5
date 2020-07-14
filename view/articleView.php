<?php
$css = "public/css/article.css";
$title = $article->getTitle();
ob_start()
?>

<div class="row">
    <div id="bloc-title" class="col-12 d-flex align-items-center justify-content-center">
        <h1><?= $article->getTitle() ?></h1>
    </div>
    <div id="chapo" class="col-12 d-flex align-items-center justify-content-center">
        <p><?= $article->getChapo() ?></p>
    </div>
    <div class="col-md-10 offset-md-1">
        <p><?= nl2br($article->getContent()) ?></p>
        <p id="from-date">Ecrit par : <?= $article->getAuthor() ?><br>
        Mis à jour le : <?= $article->getLatest_update_fr() ?>
        </p>
    </div>
</div>
<section id="comment-form" class="row">
    <div class="col-md-8 offset-md-2 text-center">
        <form action="index.php?page=article&action=comment&id=<?= $article->getId() ?>#comment-form" method="post">
            <h3>Laisser un commentaire</h3>
            <?php if(isset($message)): ?>
            <div class="alert alert-<?= $alert ?>" role="alert"> <?= $message ?> </div>
            <?php endif ?>
            <input type="text" name="name" class="form-control" placeholder="Nom" required>
            <textarea name="comment" class="form-control" cols="30" rows="5" placeholder="Commentaire" required></textarea>
            <button type="submit" class="btn btn-primary-custom btn-form">Envoyer</button>
        </form>
    </div>
</section>
<div id="bloc-comments" class="row">
    <?php foreach($listCommentsArticleValid as $key => $comment): ?>
    <div class="offset-md-2 col-md-8">
        <div class="comment">
            <p><b><?= $comment->getName() ?></b><p>
            <p><?= nl2br($comment->getComment()) ?></p>
        </div>
    </div>
    <?php endforeach ?>
</div>

<?php
$content = ob_get_clean();
require 'templates/frontend.php';
?>