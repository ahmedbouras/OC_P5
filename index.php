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

if(isset($_GET['contact']))
{
    if($_GET['contact'] === 'success')
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
elseif(isset($_GET['blog']))
{
    blog();
}
elseif(isset($_GET['post']))
{
    if($check->verifFields($myGET, ['id']) === 'complete' && $check->positiveInt($myGET['id']))
    {
        if(isset($_GET['success']))
        {
            post($myGET['id'], 'success', Message::commentSent());
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
elseif(isset($_GET['comment']))
{
    if($check->verifFields($myGET, ['id']) === 'complete' && $check->positiveInt($myGET['id']))
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
            error404();
        }
    }
    else
    {
        error404();
    }
}
elseif(isset($_GET['admin']))
{
    adminInterface();
}
elseif(isset($_GET['attemptConnexion']))
{
    if($_GET['attemptConnexion'] === 'error')
    {
        adminInterface('danger', Message::errorId());
    }
    else
    {
        if($check->verifFields($myPOST, ['login', 'pwd']) === 'complete')
        {
            attemptConnexion($myPOST['login'], $myPOST['pwd']);
        }
        elseif($check->verifFields($myPOST, ['login', 'pwd']) === 'empty')
        {
            adminInterface('warning', Message::emptyFields());
        }
        else
        {
            adminInterface();
        }
    }
}
elseif(isset($_GET['dashboard']))
{
    if($check->verifFields($mySESSION, ['id']) === 'complete' && $check->positiveInt($mySESSION['id']))
    {
        dashboard();
    }
    else
    {
        error403();
    }
}
elseif(isset($_GET['validComment']))
{
    if($check->verifFields($mySESSION, ['id']) === 'complete' && $check->positiveInt($mySESSION['id']))
    {
        if($check->verifFields($myGET, ['id']) === 'complete' && $check->positiveInt($myGET['id']))
        {
            validComment($myGET['id']);
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
elseif(isset($_GET['deleteComment']))
{
    if($check->verifFields($mySESSION, ['id']) === 'complete' && $check->positiveInt($mySESSION['id']))
    {
        if($check->verifFields($myGET, ['id']) === 'complete' && $check->positiveInt($myGET['id']))
        {
            deleteComment($myGET['id']);
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
elseif(isset($_GET['dashboardPost']))
{
    if($check->verifFields($mySESSION, ['id']) === 'complete' && $check->positiveInt($mySESSION['id']))
    {
        if(isset($_GET['created']))
        {
            dashboardPost('success', Message::createdPost());
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
elseif(isset($_GET['creationPost']))
{
    if($check->verifFields($mySESSION, ['id']) === 'complete' && $check->positiveInt($mySESSION['id']))
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
            dashboard();
        }
    }
    else
    {
        error403();
    }
}
elseif(isset($_GET['deletePost']))
{
    if($check->verifFields($mySESSION, ['id']) === 'complete' && $check->positiveInt($mySESSION['id']))
    {
        if($check->verifFields($myGET, ['id']) === 'complete' && $check->positiveInt($myGET['id']))
        {
            deletePost($myGET['id']);
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
elseif(isset($_GET['deconnexion']))
{
    if($check->verifFields($mySESSION, ['id']) === 'complete' && $check->positiveInt($mySESSION['id']))
    {
        deconnexion();
    }
    else
    {
        error403();
    }
}
elseif(isset($_GET['error404']))
{
    error404();
}
elseif(isset($_GET['error403']))
{
    error403();
}
else
{
    home();
}