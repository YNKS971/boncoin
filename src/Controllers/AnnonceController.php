<?php

namespace App\Controllers;

use App\Models\Annonce;

class AnnonceController
{

    /**
     * PERMET D ALLER AU ANNONCE 
     * 
     */
    public function annonces()
    {


        require_once __DIR__ . "/../views/annonces.php";
    }

    /**
     * PERMET D aller a CREATE L ANNONCE 
     * 
     */
    public function create()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // je créé un tableau d'erreurs vide car pas d'erreur
            $errors = [];
            // je cree un tableau contenant des insultes,des mots a censurer, boucle for each 
            // $insultes = [ "Putain", "connard", "merde"];

            if (isset($_POST["Titre"])) {
                // on va vérifier si c'est vide
                if (empty($_POST["Titre"])) {
                    // si c'est vide, je créé une erreur dans mon tableau
                    $errors['Titre'] = 'Titre obligatoire';
                }
            }

            if (isset($_POST["Desc"])) {
                // on va vérifier si c'est vide
                if (empty($_POST["Desc"])) {
                    // si c'est vide, je créé une erreur dans mon tableau
                    $errors['Desc'] = 'Description obligatoire';
                }
            }

            if (isset($_POST["Prix"])) {
                // on va vérifier si c'est vide
                if (empty($_POST["Prix"])) {
                    // si c'est vide, je créé une erreur dans mon tableau
                    $errors['Prix'] = 'Prix obligatoire';
                }
            }

            if (empty($errors)) {
                // j'instancie mon objet selon la classe Annonce
                $AnnonceCreate = new Annonce();
                // je vais créer mon annonce selon la méthode createAnnonce() et j'essaie de créer mon annonce
                if ($AnnonceCreate->createAnnonce($_POST["Titre"], $_POST["Desc"], $_POST["Prix"], $_POST["Photo"], $_SESSION['user']['id'])) {
                    header('Location: index.php?url=annonces');
                    exit;
                } else {
                    $errors['server'] = "Une erreur s'est produite veuillez réessayer ultérieurement";
                }
            }
        }

        require_once __DIR__ . "/../views/create.php";
    }

    /**
     * PERMET D aller a DETAILS 
     * 
     */
    public function details()
    {
        require_once __DIR__ . "/../views/details.php";
    }
}
