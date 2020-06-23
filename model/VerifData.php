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
    public function verifyFields(array $superglobal, array $myKeys) : string
    {
        if(empty($superglobal))
        {
            return 'nonexistant';
        }
        else
        {
            foreach($superglobal as $key)
            {
                if(!in_array($key, $myKeys))
                {
                    return 'nonexistant';
                }
                if(empty($superglobal[$key]))
                {
                    return 'empty';
                }
            }
            return 'complete';
        }
    }
}