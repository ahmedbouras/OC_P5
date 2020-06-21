<?php
require 'controller/frontend.php';

if(isset($_GET['blog']))
{
    blog();
}
elseif(isset($_GET['post']))
{
    post();
}
else
{
    home();
}