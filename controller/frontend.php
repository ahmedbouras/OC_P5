<?php

function home($alert = null, $message = null)
{
    require 'view/homeView.php';
}
function sendMessage(array $post)
{
    $to = 'ahmed.bouras@outlook.fr';
    $subject = $post['name'];
    $message = $post['message'];
    $headers = ['From' => $post['email'], 'Reply-To' => $post['email']];
    mail($to, $subject, $message, $headers);
    header('Location: index.php?page=home&result=success');
}
function blog()
{
    $articleManager = new ArticleManager;
    $listArticles = $articleManager->getAllArticles();
    require 'view/blogView.php';
}
function article($idArticle, $alert = null, $message = null)
{
    $articleManager = new ArticleManager;
    if($article = $articleManager->getArticle($idArticle))
    {
        $commentManager = new CommentManager;
        $listCommentsArticleValid = $commentManager->getCommentsArticleValid($idArticle);
        require 'view/articleView.php';
    }
    else
    {
        header("Location: index.php?page=error404");
    }
}
function comment($idArticle, array $post)
{
    $articleManager = new ArticleManager;
    if($article = $articleManager->getArticle($idArticle))
    {
        $post['article_id'] = $article->getId();
        $comment = new Comment($post);
        $commentManager = new CommentManager;
        $commentManager->sendComment($comment);
        header("Location: index.php?page=article&id=$idArticle&action=commentSent");
    }
    else
    {
        header("Location: index.php?error404");
    }
}
function loginPage($alert = null, $message = null)
{
    require 'view/loginPageView.php';
}
function error404()
{
    require 'view/error404View.php';
}
function error403()
{
    require 'view/error403View.php';
}