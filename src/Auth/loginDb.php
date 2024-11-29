<?php


    /* namespace App\Auth\loginDb */;

class loginDb
{
    private $host = '8889';
    private $name_Db = 'spetacle2';
    private $username = '';
    private $password = '';
    private $conn;

    //logique connexion

    public function connect()
    {
        //logique de connexion
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host={$this->host};name_Db={$this->name_Db};$this->username;$this->password");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "login failled" . $e->getMessage();
        };
        return $this->conn;
    }
};
