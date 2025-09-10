<?php

namespace App\Models;

use PDOException;

class BaseDeDonnes{
// faire une comparaison entre la bdd,et ce que l user met et si c identique on le conneccte
public static function getConnection(){

try{
// on cree 3 variables, une bdd qui contient la bdd, et user utili,mdp mdp
    $bdd= mettre le lien de ma bdd ;
    $username= 'utilisateur';
    $password= 'Mot de passe';


    // on cree une instance PDO, PDO Représente une connexion entre PHP et un serveur de base de données.
    $pdo= new PDO($bdd,$username,$password); 
} catch (PDOException){

    echo 'Echec de la connexion.'

    // on crée 4 variables,avec les infos des user 
$pseudo='Evrett';
$email='lee.evrett@gmail.com';
$motdePasse='JeSuisLee';
$DateInscription='2025-02-12';

// on fait comme une requete SQL 
$sql="INSERT INTO users (u_email,u_password,u_username) VALUES (:email,:pseudo,:username,) "
$stmt=$pdo->prepare 





}



}




}