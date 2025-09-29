<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Annonce;
use App\Models\favoris;



class FavorisController{

    public function index ():void {

        require_once __DIR__ . "/../views/favoris.php";
    }

 public function add (int $annonceId):void{


     if (empty($errors)) {

                    // on instancie notre objet selon la classe Annonce
                    $favUser = new Favoris();

                    // nous allons créer notre annonce via un if pour gérer les erreurs
                    // ici nous allons voir si $pictureName est présent, si oui on l'utilise, sinon on donne la valeur de null
                    // ici on utilise un cast (float) pour transformer la valeur en float plus rapide qu'une fonction native car nous recupérons un string en raison du type=text
                    if ($favUser->addFavoris($_POST['Titre'], $_POST['Desc'], (float) $_POST['Prix'], $pictureName ?? null, $_SESSION['user']['id'])) {
                    
                        // je vais créer une variable de session temporaire pour afficher un message sur la page profil : il s'agit d'un tableau avec le message et le type de message bootstrap
                        $_SESSION['message'] = ["message" => "Votre annonce a bien été créée", "message_type" => "primary"];

                        header('Location: index.php?url=favoris');
                        exit;
                    } else {
                        $errors['server'] = "Une erreur s'est produite, veuillez essayer ultérieurement";
                    }
                }


 }




}