<?php
function attemptConnexion($login, $pwd)
{
    DBManager::dbconnect();
    AdminManager::setId($login);
    if(AdminManager::getId())
    {
        if(password_verify($pwd, AdminManager::getPwd($login)))
        {
            require 'view/adminInterfaceView.php';
            $_SESSION['id'] = AdminManager::getId();
            header("Location: index.php?dashboard");
        }
        else
        {
            header("Location: index.php?attemptConnexion=error");
        }
    }
    else
    {
        header("Location: index.php?attemptConnexion=error");
    }
}
function dashboard()
{
    DBManager::dbconnect();
    $listPosts = PostManager::getPosts();
    $listCommentsNoValid = CommentManager::getCommentsNoValid();
    require 'view/dashboardView.php';
}
function validComment($idComment)
{
    DBManager::dbConnect();
    CommentManager::validateComment($idComment);
    header("Location: index.php?dashboard");
}
function deleteComment($idComment)
{
    DBManager::dbConnect();
    CommentManager::deleteComment($idComment);
    header("Location: index.php?dashboard");
}
function dashboardPost($alert = null, $message = null)
{
    require 'view/dashboardPostView.php';
}
function createPost($title, $author, $chapo, $content)
{
    DBManager::dbconnect();
    PostManager::createPost($title, $author, $chapo, $content);
    header("Location: index.php?dashboardPost&created");
}
function deletePost($idPost)
{
    DBManager::dbconnect();
    if(PostManager::existingId($idPost))
    {
        PostManager::deletePost($idPost);
        CommentManager::deleteCommentsPost($idPost);
    }
    header("Location: index.php?dashboard");
}
function deconnexion()
{
    session_destroy();
    header("Location: index.php");
}