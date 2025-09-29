<?php

namespace App\Controllers;

use App\Models\Annonce;
use PDO;
use PDOException;


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

            // on controle que la taille du fichier n'a pas fait buggé notre upload à l'aide d'un isset()
            if (!isset($_FILES['Photo'])) {
                $errors['Photo'] = 'Le fichier est beaucoup trop volumineux';

                // on lance les vérifications uniquement si l'utilisateur à cliquer sur le bouton upload et que le fichier est bien stocké dans un fichier temporaire donc pas error = 0
            } else if ($_FILES['Photo']['error'] === 0) {

                // ------------------------------------------------------------------------------------------------
                // nous allons faire un traitement plus long pour la photo car pas mal de paramètres sont à vérifier
                // 
                // 1 : la photo est bien une photo + la photo est au format autorisé
                // 2 : la photo ne dépasse pas une certaine taille
                // ------------------------------------------------------------------------------------------------

                // on créé une variable pour faciliter la manipulation du fichier uploadé via un formulaire qui est stocké dans un ficher temporaire
                $file = $_FILES['Photo']['tmp_name'];

                // on stock également son extension dans une variable qui nous servira plus tard
                $fileExtension = strtolower(pathinfo($_FILES["Photo"]["name"], PATHINFO_EXTENSION));
                // on va créer un tableau des types MIME authorisés
                $mimeOk = ['image/jpeg', 'image/webp', 'image/png'];
                // nous allons définir l'emplacement ou nous allons stocker les images : toutes les images seront dans le répertoire 'uploads'
                $uploadsDir = __DIR__ . "/../../public/uploads/";
                // nous allons vérifier si le dossier existe, car si il est vide, il ne sera pas présent dans le repo lors d'un commit / push
                if (!is_dir($uploadsDir)) {
                    // si non présent, nous allons le créer avec les bons droits (ici 0755, parfait pour du upload de fichier)
                    mkdir($uploadsDir, 0755, true);
                }

                //
                // ETAPE 1 - Nous allons regarder le MIME du fichier pour nous assurer qu'il s'agit bien d'une image
                // Nous allons également regarder si le format est autorisé

                // création d'une ressource Fileinfo pour obtenir le MIME type
                $fileInfos = finfo_open(FILEINFO_MIME_TYPE);

                // on récupère le type MIME qui sera du type 'image/jpeg' ou 'image/png'
                $mime = finfo_file($fileInfos, $file);



                // on regarde dans notre tableau, si le format est autorisé
                if (!in_array($mime, $mimeOk, 1)) {
                    $errors['Photo'] = 'Attention, votre image doit être au format : jpeg, png ou webp';

                    //
                    // ETAPE 2 - Nous allons controller la taille de l'image
                    // -> 8 Mo max
                } else if ($_FILES["Photo"]["size"] > (8 * 1024 * 1024)) {
                    $errors['Photo'] = 'La photo est trop grande 8 Mo max';
                }

                if (empty($errors)) {
                    // si pas d'erreurs dans le contrôle du fichier,
                    // nous allons créer un nom de fichier unique à l'aide de uniqid() et l'extension du fichier que nous avons récupéré.
                    $pictureName = uniqid() . '.' . $fileExtension;
                }


                if (empty($errors)) {

                    // on instancie notre objet selon la classe Annonce
                    $objAnnonce = new Annonce();

                    // nous allons créer notre annonce via un if pour gérer les erreurs
                    // ici nous allons voir si $pictureName est présent, si oui on l'utilise, sinon on donne la valeur de null
                    // ici on utilise un cast (float) pour transformer la valeur en float plus rapide qu'une fonction native car nous recupérons un string en raison du type=text
                    if ($objAnnonce->createAnnonce($_POST['Titre'], $_POST['Desc'], (float) $_POST['Prix'], $pictureName ?? null, $_SESSION['user']['id'])) {
                        //
                        // si l'utilisateur à choisi une photo, nous allons pouvoir uploader l'image dans le dossier uploads
                        if (isset($pictureName)) {
                            move_uploaded_file($file, $uploadsDir . $pictureName);
                        }
                        // je vais créer une variable de session temporaire pour afficher un message sur la page profil : il s'agit d'un tableau avec le message et le type de message bootstrap
                        $_SESSION['message'] = ["message" => "Votre annonce a bien été créée", "message_type" => "primary"];

                        header('Location: index.php?url=profil');
                        exit;
                    } else {
                        $errors['server'] = "Une erreur s'est produite, veuillez essayer ultérieurement";
                    }
                }
            }
        }

        require_once __DIR__ . "/../views/create.php";
    }

    /**
     * PERMET D aller a DETAILS 
     * 
     */
    public function show($id)
    {

        $objAnnonces = new Annonce();
        $annonce = $objAnnonces->findById($id);

        require_once __DIR__ . "/../views/details.php";
    }


    public function deleteAnnonce($annonceID, $userID)
    {
        $objAnnonce = new Annonce();
        $success = $objAnnonce->delete($annonceID, $userID);

        if ($success) {
            header('Location: index.php?url=home');
            exit;
        } else {
            echo "Erreur lors de la suppression de l'annonce.";
        }
    }

    public function edit($id)
    {
        // On récupère l'identifiant de l'annonce en question qu'on veut modifier
        

        // On récupère les informations de l'annonce en question pour pouvoir les afficher dès qu'on arrive sur la page edit.php
        $annonce = new Annonce();
        $infoAnnonces = $annonce->findById($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // je créé un tableau d'erreurs vide car pas d'erreur
            $errors = [];

            if (isset($_GET["url"])) {
                $id = explode('/', $_GET["url"])[1] ?? null;
            }


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

            // on controle que la taille du fichier n'a pas fait buggé notre upload à l'aide d'un isset()
            if (!isset($_FILES['Photo'])) {
                $errors['Photo'] = 'Le fichier est beaucoup trop volumineux';

                // on lance les vérifications uniquement si l'utilisateur à cliquer sur le bouton upload et que le fichier est bien stocké dans un fichier temporaire donc pas error = 0
            } else if ($_FILES['Photo']['error'] === 0) {

                // ------------------------------------------------------------------------------------------------
                // nous allons faire un traitement plus long pour la photo car pas mal de paramètres sont à vérifier
                // 
                // 1 : la photo est bien une photo + la photo est au format autorisé
                // 2 : la photo ne dépasse pas une certaine taille
                // ------------------------------------------------------------------------------------------------

                // on créé une variable pour faciliter la manipulation du fichier uploadé via un formulaire qui est stocké dans un ficher temporaire
                $file = $_FILES['Photo']['tmp_name'];

                // on stock également son extension dans une variable qui nous servira plus tard
                $fileExtension = strtolower(pathinfo($_FILES["Photo"]["name"], PATHINFO_EXTENSION));
                // on va créer un tableau des types MIME authorisés
                $mimeOk = ['image/jpeg', 'image/webp', 'image/png'];
                // nous allons définir l'emplacement ou nous allons stocker les images : toutes les images seront dans le répertoire 'uploads'
                $uploadsDir = __DIR__ . "/../../public/uploads/";
                // nous allons vérifier si le dossier existe, car si il est vide, il ne sera pas présent dans le repo lors d'un commit / push
                if (!is_dir($uploadsDir)) {
                    // si non présent, nous allons le créer avec les bons droits (ici 0755, parfait pour du upload de fichier)
                    mkdir($uploadsDir, 0755, true);
                }

                //
                // ETAPE 1 - Nous allons regarder le MIME du fichier pour nous assurer qu'il s'agit bien d'une image
                // Nous allons également regarder si le format est autorisé

                // création d'une ressource Fileinfo pour obtenir le MIME type
                $fileInfos = finfo_open(FILEINFO_MIME_TYPE);

                // on récupère le type MIME qui sera du type 'image/jpeg' ou 'image/png'
                $mime = finfo_file($fileInfos, $file);



                // on regarde dans notre tableau, si le format est autorisé
                if (!in_array($mime, $mimeOk, 1)) {
                    $errors['Photo'] = 'Attention, votre image doit être au format : jpeg, png ou webp';

                    //
                    // ETAPE 2 - Nous allons controller la taille de l'image
                    // -> 8 Mo max
                } else if ($_FILES["Photo"]["size"] > (8 * 1024 * 1024)) {
                    $errors['Photo'] = 'La photo est trop grande 8 Mo max';
                }

                if (empty($errors)) {
                    // si pas d'erreurs dans le contrôle du fichier,
                    // nous allons créer un nom de fichier unique à l'aide de uniqid() et l'extension du fichier que nous avons récupéré.
                    $pictureName = uniqid() . '.' . $fileExtension;
                }


                if (empty($errors)) {

                    // on instancie notre objet selon la classe Annonce
                        $annonce = new Annonce();
        $infoAnnonces = $annonce->findById($id);

                    // nous allons créer notre annonce via un if pour gérer les erreurs
                    // ici nous allons voir si $pictureName est présent, si oui on l'utilise, sinon on donne la valeur de null
                    // ici on utilise un cast (float) pour transformer la valeur en float plus rapide qu'une fonction native car nous recupérons un string en raison du type=text
                    if ($annonce->modify($_POST['Titre'], $_POST['Desc'], (float) $_POST['Prix'], $pictureName, (int) $id, $_SESSION['user']['id'])) {
                        //
                        // si l'utilisateur à choisi une photo, nous allons pouvoir uploader l'image dans le dossier uploads
                        if (isset($pictureName)) {
                            move_uploaded_file($file, $uploadsDir . $pictureName);
                        }
                        // je vais créer une variable de session temporaire pour afficher un message sur la page profil : il s'agit d'un tableau avec le message et le type de message bootstrap
                        $_SESSION['message'] = ["message" => "Votre annonce a bien été modifiée", "message_type" => "primary"];

                        header('Location: index.php?url=profil');
                        exit;
                    } else {
                        $errors['server'] = "Une erreur s'est produite, veuillez essayer ultérieurement";
                    }
                }
            }
        }

        require_once __DIR__ . "/../views/edit.php";


        // if (empty($_SESSION['user']) || !isset($_SESSION['user'])) {
        //     header('Location: index.php?url=home');
        //     exit;
        // }
        // On charge l'annonce 
        // $test = new Annonce();
        // $annonce = $test->findById($id);


        // // // On affiche le formulaire prerempli

        // if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        //     require __DIR__ . '/../views/edit.php';
        //     return;
        // }
    }
}
