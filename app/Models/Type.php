<?php 

namespace Pokedex\Models;

use Pokedex\Utils\Database;
use PDO;

class Type extends CoreModel
{
    protected $name;
    protected $color;

    // Méthode qui récupère toutes les infos de tous les types 
    public function  findAll() {

        $sql = 'SELECT * FROM `type`;';

        // Database::getPDO() me retourne l'instance PDO contenant la connexion à la BDD
        $pdo = $pdo = Database::getPDO();

        // Je donne à PDO ma requête SQL
        $pdoStatement = $pdo->query($sql);

        // Je récupère tout les résultats sous la forme d'un tableau
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

    }
    
    // Méthode qui récupère toutes les infos d'un type en fonction de son id
    public static function findById($id) {

        $sql = "SELECT * FROM `type` WHERE id = {$id};";

        // Database::getPDO() me retourne l'instance PDO contenant la connexion à la BDD
        $pdo = $pdo = Database::getPDO();

        // Je donne à PDO ma requête SQL
        $pdoStatement = $pdo->query($sql);

        // Je récupère tout les résultats sous la forme d'un tableau
        return $pdoStatement->fetchObject(self::class);

    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of color
     */ 
    public function getColor()
    {
        return $this->color;
    }

}