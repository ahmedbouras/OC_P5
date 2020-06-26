<?php

function home($alert = null, $message = null)
{
    require 'view/homeView.php';
}
function sendMessage($name, $message)
{
    mail('ahmed.bouras@outlook.fr', 'message-P5', $message, $name);
    header('Location: index.php?contact=success');
}
function blog()
{
    require 'view/blogView.php';
}
function post()
{
    require 'view/postView.php';
}
function adminInterface()
{
    require 'view/adminInterfaceView.php';
}
function error404()
{
    require 'view/error404View.php';
}
function error403()
{
    require 'view/error403View.php';
}