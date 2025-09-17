<?php

namespace App\Models;

use PDO;
use PDOException;

class Annonce

{

    // attributs de la classe
    public string $title;
    public string $description;
    public string $price;
    public string $picture;
    public int $idUser;

    public function createAnnonce(string $title, string $description, string $price, string $picture, int $idUser)
    {
        try {
            // Creation d'une instance de connexion à la base de données
            $pdo = Database::createInstancePDO();

            // test si la connexion est ok
            if (!$pdo) {
                // pas de connexion, on return false
                return false;
            }

            // requête SQL pour insérer une annonce  dans la table annonces
            $sql = 'INSERT INTO `annonces` (`a_title`, `a_description`, `a_price`,`a_picture`,`u_id`) VALUES (:title, :description ,:price, :picture,:id)';

            // On prépare la requête avant de l'exécuter
            $stmt = $pdo->prepare($sql);

            // On associe chaque paramètre nommé de la requête (:email, :password, :username)
            // avec la valeur correspondante en PHP, en précisant leur type (ici string).
            // Grâce aux requêtes préparées, cela empêche toute injection SQL.
            $stmt->bindValue(':title', $title, PDO::PARAM_STR);
            $stmt->bindValue(':description', $description, PDO::PARAM_STR);
            $stmt->bindValue(':price', $price, PDO::PARAM_STR);
            $stmt->bindValue(':picture', $picture, PDO::PARAM_STR);
            $stmt->bindValue(':id', $idUser, PDO::PARAM_STR);

            // On exécute la requête préparée. La méthode renvoie true si tout s’est bien passé,
            // false sinon. 
            // NB : Avec PDO configuré en mode ERRMODE_EXCEPTION, une erreur déclenchera une exception.
            return $stmt->execute();
        } catch (PDOException $e) {
            // test unitaire pour connaitre la raison de l'echec
            // echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }
    

    public function afficherAnnonce()
    {

        try {


            // Creation d'une instance de connexion à la base de données
            $pdo = Database::createInstancePDO();
            
            //  je selectionne tout dans la table 'annonces'
           $sql = 'SELECT a_title, a_description, a_price, a_picture FROM annonces WHERE u_id = :userId';
        



            // on cree une variable annonce qui stocke pdo et prepare la requete
            $annonces = $pdo->prepare($sql);

            // on l'execute.
            $annonces->execute();
            // on cree une variable resultat, qui stocke annonce et qui va 
            $result = $annonces->fetchAll(PDO::FETCH_ASSOC);

            $annonces->bindValue(':userId', $idUser, PDO::PARAM_INT);

            /* Récupération de toutes les lignes d'un jeu de résultats */
            print "Récupération de toutes les lignes d'un jeu de résultats :\n";


            print_r($result);

            return $result;
        } catch (PDOException $e) {
            // test unitaire pour connaitre la raison de l'echec
            // echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }
}
