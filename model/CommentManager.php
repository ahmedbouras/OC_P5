<?php
class CommentManager extends DBManager
{
    public static function getNbComments()
    {
        $request = self::$db->prepare("SELECT COUNT(*) FROM comments WHERE valid = ?");
        $request->execute([0]);
        return $request->fetch()[0];
    }
}