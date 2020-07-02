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
    public static function sentComment($idPost, $name, $comment)
    {
        $request = self::$db->prepare(" INSERT INTO comments(post_id, name, comment, valid)
                                        VALUES(?, ?, ?, ?)");
        $request->execute([$idPost, $name, $comment, 0]);
    }
    public static function validateComment($idComment)
    {
        $request = self::$db->prepare("UPDATE comments SET valid = ? WHERE id = ?");
        $request->execute([1, $idComment]);
    }
    public static function deleteComment($idComment)
    {
        $request = self::$db->prepare("DELETE FROM comments WHERE id = ?");
        $request->execute([$idComment]);
    }
    public static function deleteCommentsPost($idPost)
    {
        $request = self::$db->prepare("DELETE FROM comments WHERE post_id = ?");
        $request->execute([$idPost]);
    }
}