<?php
spl_autoload_register(function ($className)
{
    require $className.'.php';
});
require 'controller/frontend.php';
require 'controller/backend.php';
dashboard();
/*if(isset($_GET['blog']))
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

}
else
{
    home();
}*/