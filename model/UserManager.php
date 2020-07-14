<?php
class UserManager extends DBManager
{
    public function __construct()
    {
        $this->dbConnect();
    }
    public function getUser($login)
    {
        $req = $this->db->prepare("SELECT * FROM users WHERE login = ?");
        $req->execute([$login]);
        if($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            return new User($data);
        }
        else
        {
            return false;
        }
    }
}