<?php

use App\Controllers\AnnonceController;
use App\Controllers\HomeController;
use App\Controllers\UserController;


// création d'une variable url, on prend ce qui est stocké dnas url sinon home 
$url = $_GET['url'] ?? 'home';

// creation d une variable, on explose 
$arrayUrl = explode('/', $url);


$page = $arrayUrl[0];





switch ($page) {

    case 'home':

        $objController = new HomeController();

        $objController->goHome();
        break;

    case 'annonce':

        $objController = new AnnonceController();

        $objController->annonces();
        break;

         case 'login':

        $objController = new UserController();

        $objController->login();
        break;

         case 'register':

        $objController = new UserController();

        $objController->register();
        break;

        case 'profil':

        $objController = new UserController();

        $objController->profile();
        break;

        case 'create':

        $objController = new AnnonceController();

        $objController->create();
        break;

 case 'create-success':
        require_once __DIR__ . "/../src/Views/create-success.php";
        break;


 case 'annonces':
        require_once __DIR__ . "/../src/Views/annonces.php";
        break;



    default:
        
        require_once __DIR__ . '/../src/views/page404.php';
        break;
}
