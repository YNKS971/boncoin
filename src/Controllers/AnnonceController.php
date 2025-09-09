<?php

namespace App\Controllers;

use App\Models\Annonce;

class AnnonceController{



    /**
     * PERMET D ALLER AU ANNONCE 
     * 
     */
public function annonces (){

   require_once __DIR__ ."/../views/annonces.php";

}


/**
     * PERMET D aller a CREATE L ANNONCE 
     * 
     */
public function create (){

    require_once __DIR__ ."/../views/create.php";
}



/**
     * PERMET D aller a DETAILS 
     * 
     */
public function details (){

    require_once __DIR__. "/../views/details.php";
}



    
}


