<?php

use App\Controllers\AnnonceController;
use App\Controllers\HomeController;
use App\Controllers\UserController;
use App\Controllers\FavorisController;



// création d'une variable url, on prend ce qui est stocké dnas url sinon home 
$url = $_GET['url'] ?? 'home';

// creation d une variable, on explose 
$arrayUrl = explode('/', $url);


$page = $arrayUrl[0];




//selon la fin de l'URL, on instancie le controller et on dirige l'user vers une page
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

        
    case 'edit':

        $objController = new AnnonceController();

        $objController->edit();
        require_once __DIR__ . "/../src/views/edit.php";
        break;


 case 'logout':
     $objController = new UserController();

        $objController->logout();
        require_once __DIR__ . "/../src/views/logout.php";
        break;

    case 'create-success':
        require_once __DIR__ . "/../src/views/create-success.php";
        break;

        case 'favoris':
            $objController = new FavorisController();
            $objController->index();
         require_once __DIR__ . "/../src/views/favoris.php";
        break;


      


    case 'annonces':
        require_once __DIR__ . "/../src/views/annonces.php";
        break;

    case 'details':
        $objController= new AnnonceController();
       var_dump($arrayUrl[1]);

        $objController->show($arrayUrl[1] ?? null);
        break;

        case 'delete':
    $objController = new AnnonceController();
    
    // $arrayUrl[1] doit contenir l'ID à supprimer
    $annonceID = $arrayUrl[1] ?? null;
    
    if ($annonceID) {
        // On suppose que l'utilisateur est connecté et son ID est en session
        $userID = $_SESSION['user']['id'] ?? null;
        
        if ($userID) {
            $objController->deleteAnnonce($annonceID, $userID);
        } else {
            // Pas connecté, on peut rediriger ou afficher un message
            header('Location: index.php?url=login');
            exit;
        }
    } else {
        // Pas d'ID fourni => 404 ou message d'erreur
        require_once __DIR__ . '/../src/views/page404.php';
    }
    break;




    default:

        require_once __DIR__ . '/../src/views/page404.php';
        break;
}
