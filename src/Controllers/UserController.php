<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Annonce;

class UserController
{

    public function profile()
    {

        require_once __DIR__ . '/../Models/Annonce.php';
        $objAnnonce = new Annonce;
        $annonces = $objAnnonce->findByUser($_SESSION['user']['id']);


     var_dump($_SESSION);


        require_once __DIR__ . "/../views/profil.php";
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // je créé un tableau d'erreurs vide car pas d'erreur
            $errors = [];

            if (isset($_POST["username"])) {
                // on va vérifier si c'est vide
                if (empty($_POST["username"])) {
                    // si c'est vide, je créé une erreur dans mon tableau
                    $errors['username'] = 'Pseudo obligatoire';
                } else if (User::checkUsername($_POST["username"])) {
                    // si le pseudo déjà présent dans notre bdd, on créé un message d'erreur
                    $errors['username'] = 'Pseudo déjà utilisé';
                }
            }

            if (isset($_POST["email"])) {
                // on va vérifier si c'est vide
                if (empty($_POST["email"])) {
                    // si c'est vide, je créé une erreur dans mon tableau
                    $errors['email'] = 'Mail obligatoire';
                } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                    // si mail non valide, on créé une erreur
                    $errors['email'] = 'Mail non valide';
                } else if (User::checkMail($_POST["email"])) {
                    // si mail déjà utilisé, on créé un message d'erreur dans notre tableau
                    $errors['email'] = 'Mail déjà utilisé';
                }
            }

            if (isset($_POST["password"])) {
                // on va vérifier si c'est vide
                if (empty($_POST["password"])) {
                    // si c'est vide, je créé une erreur dans mon tableau
                    $errors['password'] = 'Mot de passe obligatoire';
                } else if (strlen($_POST["password"]) < 8) {
                    // si le mot de passe est trop court, on créé une erreur
                    $errors['password'] = 'Mot de passe trop court (minimum 8 caractères)';
                }
            }

            if (isset($_POST["confirmPassword"])) {
                // on va vérifier si c'est vide
                if (empty($_POST["confirmPassword"])) {
                    // si c'est vide, je créé une erreur dans mon tableau
                    $errors['confirmPassword'] = 'Confirmation du mot de passe obligatoire';
                } else if ($_POST["confirmPassword"] !== $_POST["password"]) {
                    // si les deux mots de passe ne sont pas identiques, on créé une erreur
                    $errors['confirmPassword'] = 'Les mots de passe ne sont pas identiques';
                }
            }


            // nous vérifions s'il n'y a pas d'erreur = on regarde si le tableau est vide.
            if (empty($errors)) {

                // j'instancie mon objet selon la classe User
                $objetUser = new User();
                // je vais créer mon User selon la méthode createUser() et j'essaie de créer mon User
                if ($objetUser->createUser($_POST["email"], $_POST["password"], $_POST["username"])) {
                    header('Location: index.php?url=create-success');
                    exit;
                } else {
                    $errors['server'] = "Une erreur s'est produite veuillez rééssayer ultèrieurement";
                }
            }
        }

        require_once __DIR__ . "/../views/register.php";
    }

    public function login()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // je créé un tableau d'erreurs vide car pas d'erreur
            $errors = [];

            if (isset($_POST["email"])) {
                // on va vérifier si c'est vide
                if (empty($_POST["email"])) {
                    // si c'est vide, je créé une erreur dans mon tableau
                    $errors['email'] = 'Mail obligatoire';
                }
            }

            if (isset($_POST["password"])) {
                // on va vérifier si c'est vide
                if (empty($_POST["password"])) {
                    // si c'est vide, je créé une erreur dans mon tableau
                    $errors['password'] = 'Mot de passe obligatoire';
                }
            }

            // nous vérifions s'il n'y a pas d'erreur = on regarde si le tableau est vide.
            if (empty($errors)) {

                if (User::checkMail($_POST["email"])) {

                    $userInfos = new User();
                    $userInfos->getUserInfosByEmail($_POST["email"]);

                    if (password_verify($_POST["password"], $userInfos->password)) {

                        // Nous allons créer une variable de session "user" avec les infos du User
                        $_SESSION["user"]["id"] = $userInfos->id;
                        $_SESSION["user"]["email"] = $userInfos->email;
                        $_SESSION["user"]["username"] = $userInfos->username;
                        $_SESSION["user"]["inscription"] = $userInfos->inscription;

                        // Nous allons ensuite faire une redirection sur une page choisie
                        header("Location: index.php?url=profil");
                    } else {
                        $errors['connexion'] = 'Mail ou Mot de passe incorrect';
                    }
                } else {
                    $errors['connexion'] = 'Mail ou Mot de passe incorrect';
                }
            }
        }

        require_once __DIR__ . "/../views/login.php";
    }

    public function logout()
    {
        unset($_SESSION['user']);
        session_destroy();
        header('Location: index.php?url=login');
    }
}
