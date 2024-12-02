<?php

namespace App\Auth;

use loginDb;
use PDO;

require_once 'loginDb.php';

class AuthForm
{
    private $db;

    public function __construct()
    {
        // Initialiser la connexion à la base de données
        $loginDb = new loginDb();
        $this->db = $loginDb->connect();
    }

    public function register($username, $password, $email, $first_name, $last_name, $birthdate)
    {
        try {
            // Hacher le mot de passe
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Préparer et exécuter la requête d'insertion
            $query = "INSERT INTO subscriber (username, password, email, first_name, last_name, birthdate) 
                      VALUES (:username, :password, :email, :first_name, :last_name, :birthdate)";
            $stmt = $this->db->prepare($query);

            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
            $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
            $stmt->bindParam(':birthdate', $birthdate, PDO::PARAM_STR);

            $stmt->execute();

            return "Inscription réussie !";
        } catch (\PDOException $e) {
            return "Erreur lors de l'inscription : " . $e->getMessage();
        }
    }

    public function login($username, $password)
    {
        try {
            // Préparer et exécuter la requête pour récupérer l'utilisateur
            $query = "SELECT * FROM subscriber WHERE username = :username";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                // Démarrer une session pour l'utilisateur
                session_start();
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];

                return "Connexion réussie !";
            } else {
                return "Nom d'utilisateur ou mot de passe incorrect.";
            }
        } catch (\PDOException $e) {
            return "Erreur lors de la connexion : " . $e->getMessage();
        }
    }
}
