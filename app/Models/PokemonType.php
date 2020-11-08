<?php 

namespace Pokedex\Models;

use Pokedex\Models\CoreModel;
use Pokedex\Utils\Database;
use PDO;

class PokemonType extends CoreModel {

    protected $pokemon_numero;
    protected $type_id;

    /**
     * Méthode qui récupère tous les types
     */ 
    public function findAll()
    {

        $sql = "SELECT *
                FROM `type`";

        // Connexion à la BDD
        $pdo = Database::getPDO();

        // Réponse de PDO
        $pdoStatement = $pdo->query($sql);

        // Ici on demande à la méthode fetch de nous récupérer le résultat sous la forme d'une valeur unique
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

    }


    /**
     * Méthode qui récupère les pokemon_type en fonction du numero du pokemon dont l'id est passé dans l'url
     */ 
    public function findByPokemonNumero($pokemon_numero)
    {

        $sql = "SELECT *
                FROM `pokemon_type`
                WHERE `pokemon_numero` = {$pokemon_numero}";

        // Connexion à la BDD
        $pdo = Database::getPDO();

        // Réponse de PDO
        $pdoStatement = $pdo->query($sql);

        // Ici on demande à la méthode fetch de nous récupérer le résultat sous la forme d'une valeur unique
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

    }


    /**
     * Get the value of type_id
     */ 
    public function getTypeId()
    {
        return $this->type_id;
    }
}