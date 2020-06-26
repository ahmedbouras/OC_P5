<?php
class AdminManager extends DBManager
{
    private static $_id;

    public static function getId()
    {
        return self::$_id;
    }
    public static function getPwd($login)
    {
        $request = self::$db->prepare("SELECT passwd FROM users WHERE login = ?");
        $request->execute([$login]);
        return $request->fetch()['passwd'];
    }
    public static function setId($login)
    {
        $request = self::$db->prepare("SELECT id FROM users WHERE login = ?");
        $request->execute([$login]);
        if($adminData = $request->fetch())
        {
            self::$_id = $adminData['id'];
        }
        else
        {
            return $adminData;
        }
    }
}