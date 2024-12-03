<?php
require_once 'src/Auth/loginDb.php'; // Assurez-vous que loginDb est correctement inclus

$db = new loginDb();
$conn = $db->connect();

try {
    $username = 'test_user';
    $password = 'password';
    $email = 'test_user@example.com';
    $first_name = 'John';
    $last_name = 'Doe';
    $birthdate = "2005-01-01";

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // Hachage du mot de passe

    $query = "INSERT INTO subscriber (username, password, email, first_name,last_name,birthdate) VALUES (:username, :password, :email, :first_name,:last_name,:birthdate)";
    $stmt = $conn->prepare($query);


    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
    $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
    $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':birthdate', $birthdate, PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo "Données insérées avec succès !";
    } else {
        echo "Erreur lors de l'exécution de la requête : " . implode(", ", $stmt->errorInfo());
    }
} catch (Exception $e) {
    // Gestion des erreurs
    echo "Erreur : " . $e->getMessage();
}
