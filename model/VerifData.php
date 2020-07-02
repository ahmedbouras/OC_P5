<?php
class VerifData
{
    private $_cleanGET;
    private $_cleanPOST;
    private $_cleanSESSION;

    public function __construct($xssGET, $xssPOST, $xssSESSION)
    {
        $this->setGET($xssGET);
        $this->setPOST($xssPOST);
        $this->setSESSION($xssSESSION);
    }
    public function getGET() : array
    {
        return $this->_cleanGET;
    }
    public function getPOST() : array
    {
        return $this->_cleanPOST;
    }
    public function getSESSION() : array
    {
        return $this->_cleanSESSION;
    }
    public function setGET(array $xssGET)
    {
        $this->_cleanGET = array_map('htmlspecialchars', $xssGET);
    }
    public function setPOST(array $xssPOST)
    {
        $this->_cleanPOST = array_map('htmlspecialchars', $xssPOST);
    }
    public function setSESSION(array $xssSESSION)
    {
        $this->_cleanSESSION = array_map('htmlspecialchars', $xssSESSION);
    }
    public function verifFields(array $superglobal, array $myKeys) : string
    {
        if(empty($superglobal))
        {
            return 'nonexistant';
        }
        else
        {
            foreach($myKeys as $value)
            {
                if(!array_key_exists($value, $superglobal))
                {
                    return 'nonexistant';
                }
                if(!isset($superglobal[$value]) || empty($superglobal[$value]))
                {
                    return 'empty';
                }
            }
            return 'complete';
        }
    }
    public function verifEmail($email)
    {
        return preg_match("#^[a-z0-9.-_]+@[a-z0-9.-_]{2,}\.[a-z]{2,4}$#", $email);
    }
    public function numbersOnly($idPost)
    {
        return preg_match("#^[0-9]+$#", $idPost);
    }
}