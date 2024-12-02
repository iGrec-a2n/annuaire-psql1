<?php
require __DIR__ . '/vendor/autoload.php';

require_once 'loginDb.php';

$db = new loginDb();
$conn = $db->connect();

if ($conn) {
    echo "Test réussi : La connexion est active.";
} else {
    echo "Test échoué : La connexion a échoué.";
}
