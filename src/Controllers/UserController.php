<?php

namespace App\Controllers;

use App\Models\User;


class UserController{

    // Création d'un regeX
$regName = "/^[a-zA-Zàèé\-]+$/";

// Je ne lance qu'uniquement lorsqu'il y a un formulaire validée via la méthod POST

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

            if (!isset($_POST["cgu"])) {
                // si la case n'est pas cochée, on créé une erreur
                $errors['cgu'] = 'Vous devez accepter les CGU';
            }
        }

        require_once __DIR__ . "/../Views/register.php";
    }

    /**
     * PERMET DE RETOURNER au registre
     * 
     */
public function register (){
    
    require_once __DIR__ ."/../views/register.php";

}

 /**
     * PERMET DE RETOURNER au login
     * 
     */
public function login (){

    require_once __DIR__. "/../views/login.php";
}

 /**
     * PERMET DE RETOURNER au profil
     * 
     */
public function profil (){
    require_once __DIR__. "/../views/login.php";
}

 /**
     * PERMET DE se deconnecter
     * 
     */
public function logout (){
    // on detruit la session 
session_destroy ();
header('Location: home.php');

}

