<?php

require __DIR__ . '/vendor/autoload.php';

/* use App\Auth\loginDb; */

use App\Controllers\homeControllers;
use App\Auth\loginDb;



$request = $_SERVER['REQUEST_URI'] ?? '/'; // on recupere les requetes qui sont faite par l'utilsateur depuis la db
switch ($request) {
    case '/Home':
        $controller = new homeControllers(); // et dans chaque cas en fonction de ce qui est demandé on l'affiche grace au controllers
        $controller->main();
        break;

    case '/ProfilPage':
        $controller = new homeControllers();
        $controller->profil();
        break;

    default:
        $controller = new homeControllers();
        $controller->NotFound();
        break;
}
