<?php
class CommentManager extends DBManager
{
    public static function getNbCommentsNoValid()
    {
        $request = self::$db->prepare("SELECT COUNT(*) FROM comments WHERE valid = ?");
        $request->execute([0]);
        return $request->fetch()[0];
    }
    public static function getCommentsNoValid()
    {
        $request = self::$db->prepare("SELECT * FROM comments WHERE valid = ?");
        $request->execute([0]);
        return $request;
    }
    public static function getCommentsPost($idPost)
    {
        $request = self::$db->prepare(" SELECT * FROM comments WHERE valid = ? AND post_id = ?
                                        ORDER BY comment_date DESC");
        $request->execute([1, $idPost]);
        return $request;
    }
}