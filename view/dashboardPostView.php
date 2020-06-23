<?php
$css = "public/css/dashboardPost.css";
$title = "Article";
ob_start()
?>

<div id="bloc-dashboard" class="row">
    <div class="offset-sm-1 col-sm-10">
        <a href="index.php?dashboard"><< Revenir sur le tableau de bord</a>
    </div class="row">
        <form action="index.php?dashboardPost" method="post" class="offset-sm-1 col-sm-10 offset-md-2 col-md-8">
            <div class="form-row">
                <div class="col form-group">
                    <label>Titre de l'article</label>
                    <input type="text" class="form-control" name="title" required>
                </div>
                <div class="col form-group">
                    <label>Auteur</label>
                    <input type="text" class="form-control" name="author" required>
                </div>
            </div>
            <div class="form-group">
                <label>Chapô</label>
                <textarea class="form-control" rows="2" name="chapo" required></textarea>
            </div>
            <div class="form-group">
                <label>Contenu de l'article</label>
                <div class="form-group">
                <textarea class="form-control" rows="30" name="content" required></textarea>
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