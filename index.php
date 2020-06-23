<?php
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
elseif(isset($_GET['dashboard']))
{
    dashboard();
}
elseif(isset($_GET['dashboardPost']))
{
    dashboardPost();
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