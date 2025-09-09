<?php

namespace App\Controllers;

use App\Models\User;


class UserController{


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