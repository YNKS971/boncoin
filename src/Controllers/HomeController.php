<?php

namespace App\Controllers;

use App\Models\Database;


class HomeController
{

    /**
     * PERMET DE RETOURNER a home.php 
     * @return void
     */
    public function goHome()
    {

        // Direction home
        require_once __DIR__ . "/../views/home.php";
    }


    
}
