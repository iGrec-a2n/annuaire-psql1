<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=1200px, initial-scale=1.0">
  <title>ANNUAIRE PSQL1</title>
</head>
<body>
  <h1>Welcome User</h1>
  <?php
  require_once __DIR__ . '/../vendor/autoload.php';

  use Dotenv\Dotenv;

  $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
  $dotenv->load();

  $dsn = "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']};charset=utf8mb4";
  $username = $_ENV['DB_USER'];
  $password = $_ENV['DB_PASS'];
  
  try {
      $pdo = new PDO($dsn, $username, $password);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
      die("Erreur de connexion : " . $e->getMessage());
  }
  
  echo "Connexion réussie !";

  ?>
</body>
</html>