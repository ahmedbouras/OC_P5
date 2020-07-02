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
        $request = self::$db->prepare(" SELECT *, DATE_FORMAT(latest_update, '%d/%m/%Y') AS latest_update_fr
                                        FROM posts ORDER BY creation_date DESC");
        $request->execute();
        return $request;
    }
    public static function getPost($idPost)
    {
        $request = self::$db->prepare(" SELECT *, DATE_FORMAT(latest_update, '%d/%m/%Y')
                                        AS latest_update_fr FROM posts WHERE id = ?");
        $request->execute([$idPost]);
        return $request->fetch();
    }
    public static function existingId($idPost)
    {
        $request = self::$db->prepare("SELECT id FROM posts");
        $request->execute();
        $existingId = [];
        while($data = $request->fetch())
        {
            $existingId[] = $data['id'];
        }
        return in_array($idPost, $existingId);
    }
}