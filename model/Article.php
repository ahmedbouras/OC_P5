<?php
class Article
{
    use Hydratation;
    use Attribute;

    private $_title;
    private $_author;
    private $_chapo;
    private $_content;
    private $_creation_date;
    private $_latest_update_fr;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }
    public function getTitle()
    {
        return $this->_title;
    }
    public function getAuthor()
    {
        return $this->_author;
    }
    public function getChapo()
    {
        return $this->_chapo;
    }
    public function getContent()
    {
        return $this->_content;
    }
    public function getCreation_date()
    {
        return $this->_creation_date;
    }
    public function getLatest_update_fr()
    {
        return $this->_latest_update_fr;
    }
    public function setTitle($title)
    {
        $this->_title = $title;
    }
    public function setAuthor($author)
    {
        $this->_author = $author;
    }
    public function setChapo($chapo)
    {
        $this->_chapo = $chapo;
    }
    public function setContent($content)
    {
        $this->_content = $content;
    }
    public function setCreation_date($creation_date)
    {
        $this->_creation_date = $creation_date;
    }
    public function setLatest_update_fr($latest_update_fr)
    {
        $this->_latest_update_fr = $latest_update_fr;
    }
}