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
    post();
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
    if($check->verifFields($mySESSION, ['id']) === 'complete')
    {
        dashboard();
    }
    else
    {
        error403();
    }
}
elseif(isset($_GET['dashboardPost']))
{
    if($check->verifFields($mySESSION, ['id']) === 'complete')
    {
        dashboardPost();
    }
    else
    {
        error403();
    }
}
elseif(isset($_GET['deconnexion']))
{
    deconnexion();
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