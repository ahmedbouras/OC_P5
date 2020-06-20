<?php
spl_autoload_register(function ($className)
{
    require $className.'.php';
});

function home()
{
    require 'view/homeView.php';
}
function blog()
{
    require 'view/blogView.php';
}