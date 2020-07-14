<?php
class ArticleManager extends DBManager
{
    public function __construct()
    {
        $this->dbConnect();
    }
    public function createArticle(Article $article)
    {
        $req = $this->db->prepare("INSERT INTO articles(title, author, chapo, content)
                                    VALUES(?, ?, ?, ?)");
        $req->execute([$article->getTitle(), $article->getAuthor(), $article->getChapo(), $article->getContent()]);
    }
    public function getArticle($id)
    {
        $req = $this->db->prepare("SELECT *, DATE_FORMAT(latest_update, '%d/%m/%Y') AS latest_update_fr
                                    FROM articles WHERE id = ?");
        $req->execute([$id]);
        if($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            return new Article($data);
        }
        else
        {
            return false;
        }
    }
    public function getAllArticles()
    {
        $req = $this->db->prepare("SELECT *, DATE_FORMAT(latest_update, '%d/%m/%Y') AS latest_update_fr
                                    FROM articles ORDER BY creation_date DESC");
        $req->execute();
        $listArticles = [];
        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $listArticles[] = new Article($data);
        }
        return $listArticles;
    }
    public function updateArticle($idArticle, Article $article)
    {
        $req = $this->db->prepare("UPDATE articles
                                    SET title = :title,
                                    author = :author,
                                    chapo = :chapo,
                                    content = :content,
                                    latest_update = NOW()
                                    WHERE id = :id");
        $req->execute([
            ':title' => $article->getTitle(),
            ':author' => $article->getAuthor(),
            ':chapo' => $article->getChapo(),
            ':content' => $article->getContent(),
            ':id' => $idArticle
        ]);
    }
    public function deleteArticle($idArticle)
    {
        $req = $this->db->prepare("DELETE FROM articles WHERE id = ?");
        $req->execute([$idArticle]);
    }
    public function getNbArticles()
    {
        $req = $this->db->query("SELECT COUNT(*) FROM articles");
        return $req->fetch()[0];
    }
}