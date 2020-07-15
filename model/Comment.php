<?php
class Comment
{
    use Hydratation;
    use Attribute;

    private $_article_id;
    private $_name;
    private $_comment;
    private $_comment_date;
    private $_valid;
    private $_title_article; // Article's title associate to this comment

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }
    public function getArticle_id()
    {
        return $this->_article_id;
    }
    public function getName()
    {
        return $this->_name;
    }
    public function getComment()
    {
        return $this->_comment;
    }
    public function getComment_date()
    {
        return $this->_comment_date;
    }
    public function getValid()
    {
        return $this->_valid;
    }
    public function getTitle_article()
    {
        return $this->_title_article;
    }
    public function setArticle_id($article_id)
    {
        $this->_article_id = $article_id;
    }
    public function setName($name)
    {
        $this->_name = $name;
    }
    public function setComment($comment)
    {
        $this->_comment = $comment;
    }
    public function setComment_date($comment_date)
    {
        $this->_comment_date = $comment_date;
    }
    public function setValid($valid)
    {
        $this->_valid = $valid;
    }
    public function setTitle_article($title)
    {
        $this->_title_article = $title;
    }
}