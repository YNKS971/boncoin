<?php

namespace App\Models;

use PDO;
use PDOException;

class Annonce
{
    // Attributs de la classe
    public string $title;
    public string $description;
    public string $price;
    public string $picture;
    public int $idUser;

    // Création d'une annonce
    public function createAnnonce(string $title, string $description, string $price, string $picture, int $idUser)
    {
        try {
            // Création d'une instance de connexion à la base de données
            $pdo = Database::createInstancePDO();

            // Test si la connexion est OK
            if (!$pdo) {
                return false;
            }

            // Requête SQL pour insérer une annonce dans la table annonces
            $sql = 'INSERT INTO `annonces` (`a_title`, `a_description`, `a_price`, `a_picture`, `u_id`) VALUES (:title, :description ,:price, :picture,:id)';
            
            // Préparation de la requête avant de l'exécuter
            $stmt = $pdo->prepare($sql);

            // Association de chaque paramètre nommé
            $stmt->bindValue(':title', $title, PDO::PARAM_STR);
            $stmt->bindValue(':description', $description, PDO::PARAM_STR);
            $stmt->bindValue(':price', $price, PDO::PARAM_STR);
            $stmt->bindValue(':picture', $picture, PDO::PARAM_STR);
            $stmt->bindValue(':id', $idUser, PDO::PARAM_INT);

            // Exécution de la requête préparée
            return $stmt->execute();
        } catch (PDOException $e) {
            // En cas d'erreur, on capture l'exception
            return false;
        }
    }

    // Affichage des annonces
    public function afficherAnnonce()
    {
        try {
            // Création d'une instance de connexion à la base de données
            $pdo = Database::createInstancePDO();

            // Sélection de toutes les annonces
            $sql = 'SELECT * FROM `annonces`';

            // Préparation de la requête
            $annonces = $pdo->prepare($sql);

            // Exécution de la requête
            $annonces->execute();

            // Récupération de tous les résultats
            return $annonces->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // En cas d'erreur, on capture l'exception
            return false;
        }
    }

    // Trouver une annonce par ID
    public function findById($id)
    {
        try {
            // Requête pour trouver l'annonce par ID
            $sql = "SELECT * FROM `annonces` WHERE a_id = :id";

            // Connexion à la base de données
            $pdo = Database::createInstancePDO();

            // Préparation de la requête
            $stmt = $pdo->prepare($sql);

            // Association de l'ID à la requête
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            // Exécution de la requête
            $stmt->execute();

            // Récupération des données de l'annonce
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // En cas d'erreur, on capture l'exception
            return false;
        }
    }

    // Trouver les annonces d'un utilisateur
    public function findByUser($user)
    {
        try {
            // Requête pour trouver les annonces de l'utilisateur
            $sql = "SELECT * FROM `annonces` WHERE u_id = :id";

            // Connexion à la base de données
            $pdo = Database::createInstancePDO();

            // Préparation de la requête
            $stmt = $pdo->prepare($sql);

            // Association de l'ID utilisateur à la requête
            $stmt->bindValue(':id', $user, PDO::PARAM_INT);

            // Exécution de la requête
            $stmt->execute();

            // Récupération des données
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // En cas d'erreur, on capture l'exception
            return false;
        }
    }

    // Supprimer une annonce
   public function delete($annonceID, $userID)
{
    try {
        $pdo = Database::createInstancePDO();

        $sql = "DELETE FROM `annonces` WHERE a_id = :annonceID AND u_id = :userID";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':annonceID', $annonceID, PDO::PARAM_INT);
        $stmt->bindValue(':userID', $userID, PDO::PARAM_INT);

        return $stmt->execute();  // retourne true si suppression réussie
    } catch (PDOException $e) {
        return false;
    }

    public function edit(){

       try {
        // Connexion a la base de données 
        $pdo = Database::createInstancePDO();

        
        // // Association de chaque paramètre nommé
            $stmt->bindValue(':title', $title, PDO::PARAM_STR);
            $stmt->bindValue(':description', $description, PDO::PARAM_STR);
            $stmt->bindValue(':price', $price, PDO::PARAM_STR);
            $stmt->bindValue(':picture', $picture, PDO::PARAM_STR);


                //  On prepare
           $stmt = $pdo->prepare($sql);

        //  On modifie 
         $sql = "UPDATE `annonces`
          SET 'a_title'=:title", 'a_description'=:'description','a_price'=:'price','a_picture'=:'picture'  WHERE ``;

        //   On exec
            return $stmt->execute();


             
             catch (PDOException $e) {
            // En cas d'erreur, on capture l'exception
            return false;
        }








    }
}
}
    

