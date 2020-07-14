<?php
class User
{
    private $_id;
    private $_login;
    private $_passwd;
    private $_role;

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
    public function getLogin()
    {
        return $this->_login;
    }
    public function getPasswd()
    {
        return $this->_passwd;
    }
    public function getRole()
    {
        return $this->_role;
    }
    public function setId($id)
    {
        $this->_id = $id;
    }
    public function setLogin($login)
    {
        $this->_login = $login;
    }
    public function setPasswd($passwd)
    {
        $this->_passwd = $passwd;
    }
    public function setRole($role)
    {
        $this->_role = $role;
    }
}