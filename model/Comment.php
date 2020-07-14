<?php
class Comment
{
    private $_id;
    private $_article_id;
    private $_name;
    private $_comment;
    private $_comment_date;
    private $_valid;
    private $_title; // The represention of the article's title associate to this comment

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }
    public function hydrate(array $data)
    {
        foreach($data as $key => $value)
        {
            $method = 'set' . ucfirst($key);
            if(method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }
    public function getId()
    {
        return $this->_id;
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
    public function getTitle()
    {
        return $this->_title;
    }
    public function setId($id)
    {
        $this->_id = $id;
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
    public function setTitle($title)
    {
        $this->_title = $title;
    }
}