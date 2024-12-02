<?php

use App\Auth\AuthForm;

// Initialiser AuthForm
$authForm = new AuthForm();
$message = '';

// Vérifier la requête POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'register') {
        // Récupérer les données du formulaire
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $email = $_POST['email'] ?? '';
        $first_name = $_POST['first_name'] ?? '';
        $last_name = $_POST['last_name'] ?? '';
        $birthdate = $_POST['birthdate'] ?? '';

        // Appeler la méthode d'inscription
        $message = $authForm->register($username, $password, $email, $first_name, $last_name, $birthdate);
    } elseif ($action === 'login') {
        // Récupérer les données du formulaire
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        // Appeler la méthode de connexion
        $message = $authForm->login($username, $password);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription et de connexion</title>
</head>

<body>
    <h1>Formulaire d'inscription</h1>
    <form method="POST" action="">
        <input type="hidden" name="action" value="register">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>

        <label for="firstname">Prénom :</label>
        <input type="text" id="firstname" name="firstname" required>

        <label for="lastname">Nom :</label>
        <input type="text" id="lastname" name="lastname" required>

        <label for="birthdate">Date de naissance :</label>
        <input type="date" id="birthdate" name="birthdate" required>

        <button type="submit">S'inscrire</button>
    </form>

    <h1>Formulaire de connexion</h1>
    <form method="POST" action="">
        <input type="hidden" name="action" value="login">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Se connecter</button>
    </form>

    <!-- Afficher le message -->
    <?php if ($message): ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>
</body>

</html>