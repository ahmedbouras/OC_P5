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
    public static function createPost($title, $author, $chapo, $content)
    {
        $request = self::$db->prepare(" INSERT INTO posts(title, author, chapo, content)
                                        VALUES(?, ?, ?, ?)");
        $request->execute([$title, $author, $chapo, $content]);
    }
    public static function modifyPost($idPost, $title, $author, $chapo, $content)
    {
        $request = self::$db->prepare(" UPDATE posts
                                        SET title = ?, author = ?, chapo = ?, content = ?, latest_update = NOW()
                                        WHERE id = ? ");
        $request->execute([$title, $author, $chapo, $content, $idPost]);
    }
    public static function deletePost($idPost)
    {
        $request = self::$db->prepare("DELETE FROM posts WHERE id = ?");
        $request->execute([$idPost]);
    }
}