<?php
session_start();
spl_autoload_register(function ($className)
{
    require "model/$className.php";
});
require 'controller/frontend.php';
require 'controller/backend.php';
$check = new VerifData($_GET, $_POST, $_SESSION);
$myGET = $check->getGET();
$myPOST = $check->getPOST();
$mySESSION = $check->getSESSION();

if($check->verifFields($myGET, ['page']) === 'complete')
{
    if($myGET['page'] === 'home')
    {
        if($check->verifFields($myGET, ['result']) === 'complete' && $myGET['result'] === 'success')
        {
            home('success', Message::messageSent());
        }
        else
        {
            if($check->verifFields($myPOST, ['name', 'email', 'message']) === 'complete')
            {
                if($check->verifEmail($myPOST['email']))
                {
                    sendMessage($myPOST['name'], $myPOST['message']);
                }
                else
                {
                    home('danger', Message::errorEmail());
                }
            }
            elseif($check->verifFields($myPOST, ['name', 'email', 'message']) === 'empty')
            {
                home('warning', Message::emptyFields());
            }
            else
            {
                home();
            }
        }
    }
    elseif($myGET['page'] === 'blog')
    {
        blog();
    }
    elseif($myGET['page'] === 'post')
    {
        if($check->verifFields($myGET, ['id']) === 'complete' && $check->positiveInt($myGET['id']))
        {
            if($check->verifFields($myGET, ['action']) === 'complete' && $myGET['action'] === 'comment')
            {
                if($check->verifFields($myGET, ['result']) === 'complete' && $myGET['result'] === 'success')
                {
                    post($myGET['id'], 'success', Message::commentSent());
                }
                else
                {
                    if($check->verifFields($myPOST, ['name', 'comment']) === 'complete')
                    {
                        comment($myGET['id'], $myPOST['name'], $myPOST['comment']);
                    }
                    elseif($check->verifFields($myPOST, ['name', 'comment']) === 'empty')
                    {
                        post($myGET['id'], 'warning', Message::emptyFields());
                    }
                    else
                    {
                        post($myGET['id']);
                    }
                }
            }
            else
            {
                post($myGET['id']);
            }
        }
        else
        {
            error404();
        }
    }
    elseif($myGET['page'] === 'loginPage')
    {
        if($check->verifFields($myGET, ['result']) === 'complete' && $myGET['result'] === 'error')
        {
            loginPage('danger', Message::errorId());
        }
        else
        {
            loginPage();
        }
    }
    elseif($myGET['page'] === 'attemptConnexion')
    {
        if($check->verifFields($myPOST, ['login', 'pwd']) === 'complete')
            {
                attemptConnexion($myPOST['login'], $myPOST['pwd']);
            }
            elseif($check->verifFields($myPOST, ['login', 'pwd']) === 'empty')
            {
                loginPage('warning', Message::emptyFields());
            }
            else
            {
                loginPage();
            }
    }
    elseif($myGET['page'] === 'dashboard')
    {
        if($check->verifFields($mySESSION, ['id']) === 'complete' && $check->positiveInt($mySESSION['id']))
        {
            if($check->verifFields($myGET, ['action']) === 'complete'
            && $check->verifFields($myGET, ['id']) === 'complete'
            && $check->positiveInt($myGET['id']))
            {
                switch($myGET['action'])
                {
                    case 'rmPost':
                        deletePost($myGET['id']);
                        break;
                    case 'validationComment':
                        validComment($myGET['id']);
                        break;
                    case 'rmComment':
                        deleteComment($myGET['id']);
                        break;
                    default:
                        dashboard();
                }
            }
            else
            {
                dashboard();
            }
        }
        else
        {
            error403();
        }
    }
    elseif($myGET['page'] === 'dashboardPost')
    {
        if($check->verifFields($mySESSION, ['id']) === 'complete' && $check->positiveInt($mySESSION['id']))
        {
            if($check->verifFields($myGET, ['action', 'id']) === 'complete' && $check->positiveInt($myGET['id']))
            {
                if($myGET['action'] === 'modifPost')
                {
                    dashboardPost(null, null, true, $myGET['id']);
                }
                elseif($myGET['action'] === 'modification')
                {
                    if($check->verifFields($myPOST, ['title', 'author', 'chapo', 'content']) === 'complete')
                    {
                        modifyPost($myGET['id'], $myPOST['title'], $myPOST['author'], $myPOST['chapo'], $myPOST['content']);
                    }
                    elseif($check->verifFields($myPOST, ['title', 'author', 'chapo', 'content']) === 'empty')
                    {
                        dashboardPost('warning', Message::emptyFields());
                    }
                    else
                    {
                        dashboardPost();
                    }
                }
                else
                {
                    dashboardPost();
                }
            }
            elseif($check->verifFields($myGET, ['action']) === 'complete' && $myGET['action'] === 'creation')
            {
                if($check->verifFields($myPOST, ['title', 'author', 'chapo', 'content']) === 'complete')
                {
                    createPost($myPOST['title'], $myPOST['author'], $myPOST['chapo'], $myPOST['content']);
                }
                elseif($check->verifFields($myPOST, ['title', 'author', 'chapo', 'content']) === 'empty')
                {
                    dashboardPost('warning', Message::emptyFields());
                }
                else
                {
                    dashboardPost();
                }
            }
            elseif($check->verifFields($myGET, ['result']) === 'complete')
            {
                if($myGET['result'] === 'created')
                {
                    dashboardPost('success', Message::createdPost());
                }
                elseif($myGET['result'] === 'modified')
                {
                    dashboardPost('success', Message::modifiedPost());
                }
                else
                {
                    dashboardPost();
                }
            }
            else
            {
                dashboardPost();
            }
        }
        else
        {
            error403();
        }
    }
    elseif($myGET['page'] === 'deconnexion')
    {
        deconnexion();
    }
    elseif($myGET['page'] === 'error403')
    {
        error403();
    }
    elseif($myGET['page'] === 'error404')
    {
        error404();
    }
    else
    {
        error404();
    }
}
elseif($check->verifFields($myGET, ['page']) === 'empty')
{
    error404();
}
else
{
    home();
}