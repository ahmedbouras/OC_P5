<?php
function attemptConnexion($login, $pwd)
{
    DBManager::dbconnect();
    AdminManager::setId($login);
    if(AdminManager::getId())
    {
        if(password_verify($pwd, AdminManager::getPwd($login)))
        {
            $_SESSION['id'] = AdminManager::getId();
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
    DBManager::dbconnect();
    $listPosts = PostManager::getPosts();
    $listCommentsNoValid = CommentManager::getCommentsNoValid();
    require 'view/dashboardView.php';
}
function validComment($idComment)
{
    DBManager::dbConnect();
    CommentManager::validateComment($idComment);
    header("Location: index.php?page=dashboard");
}
function deleteComment($idComment)
{
    DBManager::dbConnect();
    CommentManager::deleteComment($idComment);
    header("Location: index.php?page=dashboard");
}
function dashboardPost($alert = null, $message = null, $modification = false, $idPost = null)
{
    if($modification)
    {
        DBManager::dbconnect();
        if(PostManager::existingId($idPost))
        {
            $post = PostManager::getPost($idPost);
        }
        else
        {
            header("Location: index.php?page=dashboardPost");
        }
    }
    require 'view/dashboardPostView.php';
}
function createPost($title, $author, $chapo, $content)
{
    DBManager::dbconnect();
    PostManager::createPost($title, $author, $chapo, $content);
    header("Location: index.php?page=dashboardPost&result=created");
}
function modifyPost($idPost, $title, $author, $chapo, $content)
{
    DBManager::dbconnect();
    if(PostManager::existingId($idPost))
    {
        PostManager::modifyPost($idPost, $title, $author, $chapo, $content);
        header("Location: index.php?page=dashboardPost&result=modified");
    }
    else
    {
        header("Location: index.php?page=dashboardPost");
    }
}
function deletePost($idPost)
{
    DBManager::dbconnect();
    if(PostManager::existingId($idPost))
    {
        PostManager::deletePost($idPost);
        CommentManager::deleteCommentsPost($idPost);
    }
    header("Location: index.php?page=dashboard");
}
function deconnexion()
{
    session_destroy();
    header("Location: index.php");
}