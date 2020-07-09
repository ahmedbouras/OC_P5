<?php
$css = "public/css/dashboardPost.css";
$title = "Article";
ob_start()
?>

<div id="bloc-dashboard" class="row">
    <div class="offset-sm-1 col-sm-10">
        <a href="index.php?page=dashboard"><< Revenir sur le tableau de bord</a>
    </div class="row">
        <form   <?php if($modification): ?>
        action="index.php?page=dashboardPost&action=modification&id=<?= $post['id'] ?>"
                <?php else: ?>
        action="index.php?page=dashboardPost&action=creation"
                <?php endif ?>
        method="post" class="offset-sm-1 col-sm-10 offset-md-2 col-md-8">
            <?php if(isset($message)): ?>
            <div class="alert alert-<?= $alert ?>" role="alert"> <?= $message ?> </div>
            <?php endif ?>
            <div class="form-row">
                <div class="col form-group">
                    <label>Titre de l'article</label>
                    <input type="text" class="form-control" name="title"
                        <?php if($modification): ?>
                        value="<?= $post['title'] ?>"
                        <?php endif ?>
                    required>
                </div>
                <div class="col form-group">
                    <label>Auteur</label>
                    <input type="text" class="form-control" name="author" 
                        <?php if($modification): ?>
                        value="<?= $post['author'] ?>"
                        <?php endif ?>
                    required>
                </div>
            </div>
            <div class="form-group">
                <label>Chapô</label>
                <textarea class="form-control" rows="2" name="chapo" required><?php if($modification):
                    echo $post['chapo']; 
                    endif ?>
                </textarea>
            </div>
            <div class="form-group">
                <label>Contenu de l'article</label>
                <div class="form-group">
                <textarea class="form-control" rows="30" name="content" required><?php if($modification):
                    echo $post['content']; 
                    endif ?>
                </textarea>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-primary-custom btn-lg offset-1 col-10">Envoyer</button>
            </div>
        </form>
</div>

<?php
$content = ob_get_clean();
require 'templates/backend.php';
?>