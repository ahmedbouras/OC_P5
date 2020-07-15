<?php
trait Attribute
{
    private $_id;
    
    public function getId()
    {
        return $this->_id;
    }
    public function setId($id)
    {
        $this->_id = $id;
    }
}