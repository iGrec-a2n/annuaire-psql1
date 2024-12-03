<?php

namespace App\Controllers;

/* require __DIR__ . '/vendor/autoload.php'; */

use App\Auth\loginDb;


class homeControllers
{

    // Dans chaque fonction on n'a une vue l'intérieur 

    public function main()
    {
        //logique d'affichage
        include __DIR__ . '/../Views/Home.php';
    }

    public function profil()
    {
        include __DIR__ . '/../Views/ProfilPage.php';
    }

    public function NotFound()
    {
        include __DIR__ . '/../Views/NotFound.php';
    }

    public function HandleForm()
    {
        include __DIR__ . '/../Views/Form.php';
    }
};
