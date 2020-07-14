<?php
function attemptConnexion($login, $pwd)
{
    $userManager = new UserManager;
    if($admin = $userManager->getUser($login))
    {
        if(password_verify($pwd, $admin->getPasswd()))
        {
            $_SESSION['id'] = $admin->getId();
            header("Location: index.php?page=dashboard");
        }
        else
        {
            header("Location: index.php?page=loginPage&result=error");
        }
    }
    else
    {
        header("Location: index.php?page=loginPage&result=error");
    }
}
function dashboard()
{
    $articleManager = new ArticleManager;
    $commentManager = new CommentManager;
    $listArticles = $articleManager->getAllArticles();
    $commentsNoValidWTitleArticle = $commentManager->getCommentsNoValidWTitleArticle();
    require 'view/dashboardView.php';
}
function validateComment($idComment)
{
    $commentManager = new CommentManager;
    if($comment = $commentManager->getComment($idComment))
    {
        $commentManager->validateComment($comment->getId());
    }
    header("Location: index.php?page=dashboard");
}
function deleteComment($idComment)
{
    $commentManager = new CommentManager;
    if($comment = $commentManager->getComment($idComment))
    {
        $commentManager->deleteComment($comment->getId());
    }
    header("Location: index.php?page=dashboard");
}
function dashboardArticle($alert = null, $message = null, $modification = false, $idArticle = null)
{
    if($modification)
    {
        $articleManager = new ArticleManager;
        if(!$article = $articleManager->getArticle($idArticle))
        {
            header("Location: index.php?page=dashboardArticle&action=creation");
        }
    }
    require 'view/dashboardArticleView.php';
}
function createArticle(array $post)
{
    $article = new Article($post);
    $articleManager = new ArticleManager;
    $articleManager->createArticle($article);
    header("Location: index.php?page=dashboardArticle&result=created");
}
function updateArticle($idArticle, array $post)
{
    $articleManager = new ArticleManager;
    if($currentArticle = $articleManager->getArticle($idArticle))
    {
        $article = new Article($post);
        $articleManager->updateArticle($idArticle, $article);
        header("Location: index.php?page=dashboardArticle&result=modified");
    }
    else
    {
        header("Location: index.php?page=dashboardArticle");
    }
}
function deleteArticle($idArticle)
{
    $articleManager = new ArticleManager;
    if($article = $articleManager->getArticle($idArticle))
    {
        $commentManager = new CommentManager;
        $articleManager->deleteArticle($article->getId());
        $commentsArticle = $commentManager->getCommentsArticle($article->getId());
        foreach($commentsArticle as $key => $comment)
        {
            $commentManager->deleteComment($comment->getId());
        }
    }
    header("Location: index.php?page=dashboard");
}
function deconnexion()
{
    session_destroy();
    header("Location: index.php");
}