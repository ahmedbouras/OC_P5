<?php
class PostManager extends DBManager
{
    public static function getNbPosts()
    {
        $request = self::$db->prepare("SELECT COUNT(*) FROM posts");
        $request->execute();
        return $request->fetch()[0];
    }
    public static function getPosts()
    {
        $request = self::$db->prepare("SELECT * FROM posts ORDER BY creation_date DESC");
        $request->execute();
        return $request;
    }
}