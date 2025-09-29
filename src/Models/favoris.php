<?php

namespace App\Models;

use PDO;
use PDOException;

class Favoris
{
    public function addFavoris(int $userId, int $annonceID): bool
    {
        try {
            // Connexion a la base de données 
            $pdo = Database::createInstancePDO();

            //  On ajoute aux favoris.
            $sql = "INSERT INTO `favoris`(`a_id`, `u_id`) VALUES 
                    (:id, :userId)";

            // Préparation de la requête avant de l'exécuter
            $stmt = $pdo->prepare($sql);

            // Association de chaque paramètre nommé
            $stmt->bindValue(':id', $annonceID, PDO::PARAM_INT);
            $stmt->bindValue(':userId', $userID, PDO::PARAM_INT);

            // Exécution de la requête préparée
            return $stmt->execute();
        } catch (PDOException $e) {
            // En cas d'erreur, on capture l'exception
            return false;
        }
    }

    public function removeFavoris(int $userId, int $annonceID): bool
    {
        try {
            // Connexion a la base de données 
            $pdo = Database::createInstancePDO();

            //  On supprime des favoris.
            $sql = "DELETE FROM `favoris` WHERE u_id = :userId AND a_id = :annonce_ID";

            // Préparation de la requête avant de l'exécuter
            $stmt = $pdo->prepare($sql);

            // Association de chaque paramètre nommé
            $stmt->bindValue(':annonceID', $annonceID, PDO::PARAM_INT);
            $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);

            // Exécution de la requête préparée
            return $stmt->execute();
        } catch (PDOException $e) {
            // En cas d'erreur, on capture l'exception
            return false;
        }
    }

    public function findByUser(int $userID):array{

        try{

             // Connexion a la base de données 
            $pdo = Database::createInstancePDO();


            
            $sql = "SELECT a_id, a_title,a_description,a_price,a_picture FROM `annonces`"

            // Préparation de la requête avant de l'exécuter
            $stmt = $pdo->prepare($sql);

            
            // Association de l'ID utilisateur à la requête
            $stmt->bindValue(':id', $userID, PDO::PARAM_INT);

              // Exécution de la requête préparée
            return $stmt->execute();

            catch (PDOException $e) {
            // En cas d'erreur, on capture l'exception
            return false;
        }











        }




    }




}


