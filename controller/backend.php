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
function dashboardPost()
{
    require 'view/dashboardPostView.php';
}
function deconnexion()
{
    session_destroy();
    header("Location: index.php");
}