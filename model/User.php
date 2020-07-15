<?php
class User
{
    use Hydratation;
    use Attribute;

    private $_login;
    private $_passwd;
    private $_role;

    public function __construct(array $data)
    {
        $this->hydrate($data);
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