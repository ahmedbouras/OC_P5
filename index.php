<?php
require 'controller/frontend.php';

if(isset($_GET['blog']))
{
    blog();
}
else
{
    home();
}