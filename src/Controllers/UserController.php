<?php

namespace App\Controllers;

use App\Models\User;


class UserController{

    // Création d'un regeX
$regName = "/^[a-zA-Zàèé\-]+$/";

// Je ne lance qu'uniquement lorsqu'il y a un formulaire validée via la méthod POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // je créé un tableau d'erreurs vide car pas d'erreur
    $errors = [];


    if (isset($_POST["email"])) {
        // on va vérifier si c'est vide
        if (empty($_POST["email"])) {
            // si c'est vide, je créé une erreur dans mon tableau
            $errors['email'] = 'Mail obligatoire';
        } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            // si mail non valide, on créé une erreur
            $errors['email'] = 'Mail non valide';
        }
    }


    if (empty($errors)) {
        // on inclut un paramètre URL pour pouvoir l'utiliser dans la page confirmation.php
        header("Location: confirmation.php?email=" . $_POST["email"]);
    }
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

}