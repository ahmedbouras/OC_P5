<?php
class DBManager
{
    protected static $db;

    private static $_DSN = "mysql:host=localhost;dbname=oc_p5;port=3308;charset=utf8";
    private static $_LOGIN = "root";
    private static $_PWD = "";

    public static function dbConnect()
    {
        self::$db = new PDO(self::$_DSN, self::$_LOGIN, self::$_PWD);
    }
}