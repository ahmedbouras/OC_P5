<?php
class DBManager
{
    protected $db;

    const DSN = "mysql:host=localhost;dbname=oc_p5;port=3308;charset=utf8";
    const LOGIN = "root";
    const PWD = "";

    public function dbConnect()
    {
        if($this->db = new PDO(self::DSN, self::LOGIN, self::PWD))
        {
            $this->db = new PDO(self::DSN, self::LOGIN, self::PWD);
        }
        else
        {
            throw new Exception('Erreur de Connexion à la base de donnée.');
        }
        
    }
}