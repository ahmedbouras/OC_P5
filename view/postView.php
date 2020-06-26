<?php
$css = "public/css/post.css";
$title = $post['title'];
ob_start()
?>

<div class="row">
    <div id="bloc-title" class="col-12 d-flex align-items-center justify-content-center">
        <h1><?= $post['title'] ?></h1>
    </div>
    <div id="chapo" class="col-12 d-flex align-items-center justify-content-center">
        <p><?= $post['chapo'] ?></p>
    </div>
    <div class="col-md-10 offset-md-1">
        <p><?= nl2br($post['content']) ?></p>
        <p id="from-date">Ecrit par : <?= $post['author'] ?><br>
        Mis à jour le : <?= $post['latest_update_fr'] ?>
        </p>
    </div>
</div>
<section id="comment-form" class="row">
    <div class="col-md-8 offset-md-2 text-center">
        <form action="" method="post">
            <h3>Laisser un commentaire</h3>
            <input type="text" name="pseudo" class="form-control" placeholder="Nom" required>
            <textarea name="comment" class="form-control" cols="30" rows="5" placeholder="Commentaire" required></textarea>
            <button type="submit" class="btn btn-primary-custom btn-form">Envoyer</button>
        </form>
    </div>
</section>
<div id="bloc-comments" class="row">
    <div class="offset-md-2 col-md-8">
        <div class="comment">
            <h5>John Doe</h5>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam molestias accusamus. <br>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam molestias accusamus nobis quibusdam deleniti asperiores reiciendis.
            </p>
        </div>
        <div class="comment">
            <h5>John Doe</h5>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam molestias accusamus nobis quibusdam deleniti asperiores reiciendis.</p>
        </div>
        <div class="comment">
            <h5>John Doe</h5>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam molestias accusamus nobis quibusdam deleniti asperiores reiciendis.</p>
        </div>
        <div class="comment">
            <h5>John Doe</h5>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam molestias accusamus nobis quibusdam deleniti asperiores reiciendis.</p>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require 'templates/frontend.php';
?>