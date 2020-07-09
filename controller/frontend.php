<?php

function home($alert = null, $message = null)
{
    require 'view/homeView.php';
}
function sendMessage($name, $message)
{
    mail('ahmed.bouras@outlook.fr', 'message-P5', $message, $name);
    header('Location: index.php?page=home&result=success');
}
function blog()
{
    DBManager::dbconnect();
    $listPosts = PostManager::getPosts();
    require 'view/blogView.php';
}
function post($idPost, $alert = null, $message = null)
{
    DBManager::dbconnect();
    if(PostManager::existingId($idPost))
    {
        $post = PostManager::getPost($idPost);
        $commentsPost = CommentManager::getCommentsPost($idPost);
        require 'view/postView.php';
    }
    else
    {
        header("Location: index.php?page=error404");
    }
}
function comment($idPost, $name, $comment)
{
    DBManager::dbconnect();
    if(PostManager::existingId($idPost))
    {
        CommentManager::sentComment($idPost, $name, $comment);
        header("Location: index.php?page=post&id=$idPost&action=comment&result=success");
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