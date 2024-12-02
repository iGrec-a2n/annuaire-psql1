<?php



class loginDb
{
    private $host = '127.0.0.1'; // Adresse de l'hôte (localhost ou IP)
    private $port = '8889';      // Port MySQL (par défaut 3306 ou 8889 si configuré)
    private $name_Db = 'spetacles2'; // Nom de la base de données
    private $username = 'root';      // Nom d'utilisateur MySQL
    private $password = 'root';      // Mot de passe MySQL
    private $conn;

    // Méthode pour établir la connexion
    public function connect()
    {
        $this->conn = null;
        try {
            // Construction du DSN (Data Source Name)
            $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->name_Db};charset=utf8mb4";
            $this->conn = new PDO($dsn, $this->username, $this->password);

            // Configurer les attributs PDO
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connexion réussie à la base de données !";
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }

        return $this->conn;
    }
}
