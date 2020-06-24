<?php
$css = "public/css/post.css";
$title;
ob_start()
?>

<div class="row">
    <div id="bloc-title" class="col-12 d-flex align-items-center justify-content-center">
        <h1>Titre de l'article</h1>
    </div>
    <div id="chapo" class="col-12 d-flex align-items-center justify-content-center">
        <p>Ceci est le chapo de l'article. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
    </div>
    <div class="col-md-10 offset-md-1">
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consectetur odit unde sunt cum in molestias officiis molestiae, quam asperiores ratione placeat necessitatibus est natus esse sequi dignissimos deserunt corporis! Sit.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Non perspiciatis maiores autem delectus consequatur facilis quas iure architecto cupiditate ex quis voluptates natus praesentium sequi esse, atque perferendis. Ad, molestiae!
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sequi fugit aperiam omnis earum natus maxime numquam delectus cupiditate minus incidunt voluptas explicabo ducimus nemo voluptate, beatae, tenetur doloribus voluptates reiciendis.
        </p>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
        <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem exercitationem aperiam magni at eligendi quisquam aliquam a omnis! Suscipit obcaecati a quibusdam aliquid soluta id mollitia aperiam magnam laudantium esse.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur a perferendis iusto soluta magnam, officia possimus porro. Voluptatem iste doloribus nihil molestiae, minima quaerat, temporibus laboriosam magni unde voluptate minus.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab sed quaerat optio nihil ipsum, maiores eius ad illum sapiente asperiores praesentium, quasi iste dolore soluta delectus commodi illo natus voluptatum!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt asperiores suscipit tempore perspiciatis delectus alias voluptatum cum sunt ut minus cupiditate laborum iure iusto consequatur sequi facere, ad est molestias.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi earum praesentium architecto. At voluptatibus id tempora voluptas harum a repudiandae, ex obcaecati eligendi possimus voluptatem. Enim pariatur ullam saepe porro.
        </p>
        <p id="from-date">Ecrit par : Ahmed Bouras<br>
        Mis à jour le : 15/06/2020
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