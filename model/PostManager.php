<?php
class PostManager extends DBManager
{
    public static function getNbPosts()
    {
        $request = self::$db->prepare("SELECT COUNT(*) FROM posts");
        $request->execute();
        return $request->fetch()[0];
    }
}