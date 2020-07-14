<?php
class CommentManager extends DBManager
{
    public function __construct()
    {
        $this->dbConnect();
    }
    public function sendComment(Comment $comment)
    {
        $req = $this->db->prepare("INSERT INTO comments(article_id, name, comment)
                                    VALUES(?, ?, ?)");
        $req->execute([$comment->getArticle_id(), $comment->getName(), $comment->getComment()]);
    }
    public function getComment($idComment)
    {
        $req = $this->db->prepare("SELECT * FROM comments WHERE id = ?");
        $req->execute([$idComment]);
        if($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            return new Comment($data);
        }
        else
        {
            return false;
        }
    }
    public function getCommentsArticleValid($idArticle)
    {
        $req = $this->db->prepare("SELECT * FROM comments
                                    WHERE valid = ? AND article_id = ? ORDER BY comment_date DESC");
        $req->execute([1, $idArticle]);
        $listComments = [];
        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $listComments[] = new Comment($data);
        }
        return $listComments;
    }
    public function getCommentsNoValidWTitleArticle()
    {
        $req = $this->db->query("SELECT c.id, c.name, c.comment, c.comment_date, a.title
                                    FROM comments AS c
                                    INNER JOIN articles AS a
                                    ON c.article_id = a.id
                                    WHERE valid = 0");
        $commentsNoValidWTitleArticle = [];
        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $commentsNoValidWTitleArticle[] = new Comment($data);
        }
        return $commentsNoValidWTitleArticle;
    }
    public function validateComment($idComment)
    {
        $req = $this->db->prepare("UPDATE comments SET valid = 1 WHERE id = ?");
        $req->execute([$idComment]);
    }
    public function deleteComment($idComment)
    {
        $req = $this->db->prepare("DELETE FROM comments WHERE id = ?");
        $req->execute([$idComment]);
    }
    public function deleteCommentArticle($idArticle)
    {
        $req = $this->db->prepare("DELETE FROM comments WHERE article_id = ?");
        $req->execute([$idArticle]);
    }
    public function getNbCommentsNoValid()
    {
        $req = $this->db->query("SELECT COUNT(*) FROM comments WHERE valid = 0");
        return $req->fetch()[0];
    }
}