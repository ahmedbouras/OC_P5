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
    require 'view/dashboardView.php';
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