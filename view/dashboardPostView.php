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
                    <label for="">Titre de l'article</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="col form-group">
                    <label for="">Auteur</label>
                    <input type="text" class="form-control" name="author">
                </div>
            </div>
            <div class="form-group">
                <label for="">Chapô</label>
                <textarea class="form-control" id="" rows="2" name="chapo"></textarea>
            </div>
            <div class="form-group">
                <label for="">Contenu de l'article</label>
                <div class="form-group">
                <textarea class="form-control" id="" rows="30" name="content"></textarea>
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