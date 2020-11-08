<?php 

namespace Pokedex\Models;

use Pokedex\Utils\Database;
use PDO;

class Pokemon extends CoreModel {

    protected $nom;
    protected $pv;
    protected $attaque;
    protected $defense;
    protected $attaque_spe;
    protected $defense_spe;
    protected $vitesse;
    protected $numero;

    // Méthode qui récupère toutes les infos de tous les pokemons appartenant à un type dont l'id est passé dans l'url
    public function findAllByType($type_id) {

        $sql = "SELECT p.*
                FROM pokemon p
                INNER JOIN pokemon_type pt
                ON p.numero = pt.pokemon_numero
                INNER JOIN `type` t
                ON pt.type_id = t.id
                WHERE t.id = {$type_id};";

        // Database::getPDO() me retourne l'instance PDO contenant la connexion à la BDD
        $pdo = $pdo = Database::getPDO();

        // Je donne à PDO ma requête SQL
        $pdoStatement = $pdo->query($sql);

        // Je récupère tout les résultats sous la forme d'un tableau
        return $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

    }

    // Méthode qui récupére toutes les infos de tous les pokemons
    public function findAll() {

        $sql = 'SELECT * FROM pokemon;';
        
        // Database::getPDO() me retourne l'instance PDO contenant la connexion à la BDD
        $pdo = $pdo = Database::getPDO();

        // Je donne à PDO ma requête SQL
        $pdoStatement = $pdo->query($sql);

        // Je récupère tout les résultats sous la forme d'un tableau
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    // Méthode qui récupère toutes les infos d'un pokemon dont l'id est passé dans l'url + son type
    public function findByType($pokemon_id) {

        $sql = "SELECT p.*, t.name
                FROM pokemon p
                INNER JOIN pokemon_type pt
                ON p.numero = pt.pokemon_numero
                INNER JOIN `type` t
                ON pt.type_id = t.id
                WHERE p.id = {$pokemon_id};";

        // Database::getPDO() me retourne l'instance PDO contenant la connexion à la BDD
        $pdo = $pdo = Database::getPDO();

        // Je donne à PDO ma requête SQL
        $pdoStatement = $pdo->query($sql);

        // Je récupère tout les résultats sous la forme d'un tableau
        return $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

    }

    // Méthode qui récupère toutes les infos d'un pokemon dont l'id est passé dans l'url
    public function findByTypeBis($pokemon_id) {

        $sql = "SELECT p.*
                FROM pokemon p
                WHERE p.id = {$pokemon_id};";

        // Database::getPDO() me retourne l'instance PDO contenant la connexion à la BDD
        $pdo = $pdo = Database::getPDO();

        // Je donne à PDO ma requête SQL
        $pdoStatement = $pdo->query($sql);

        // Je récupère tout les résultats sous la forme d'un tableau
        return $pdoStatement->fetchObject(self::class);

    }


    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Get the value of pv
     */ 
    public function getPv()
    {
        return $this->pv;
    }

    /**
     * Set the value of pv
     *
     * @return  self
     */ 
    public function setPv($pv)
    {
        $this->pv = $pv;

        return $this;
    }

    /**
     * Get the value of attaque
     */ 
    public function getAttaque()
    {
        return $this->attaque;
    }

    /**
     * Set the value of attaque
     *
     * @return  self
     */ 
    public function setAttaque($attaque)
    {
        $this->attaque = $attaque;

        return $this;
    }

    /**
     * Get the value of defense
     */ 
    public function getDefense()
    {
        return $this->defense;
    }

    /**
     * Set the value of defense
     *
     * @return  self
     */ 
    public function setDefense($defense)
    {
        $this->defense = $defense;

        return $this;
    }

    /**
     * Get the value of attaque_spe
     */ 
    public function getAttaqueSpe()
    {
        return $this->attaque_spe;
    }

    /**
     * Set the value of attaque_spe
     *
     * @return  self
     */ 
    public function setAttaqueSpe($attaque_spe)
    {
        $this->attaque_spe = $attaque_spe;

        return $this;
    }

    /**
     * Get the value of defense_spe
     */ 
    public function getDefenseSpe()
    {
        return $this->defense_spe;
    }

    /**
     * Set the value of defense_spe
     *
     * @return  self
     */ 
    public function setDefenseSpe($defense_spe)
    {
        $this->defense_spe = $defense_spe;

        return $this;
    }

    /**
     * Get the value of vitesse
     */ 
    public function getVitesse()
    {
        return $this->vitesse;
    }

    /**
     * Set the value of vitesse
     *
     * @return  self
     */ 
    public function setVitesse($vitesse)
    {
        $this->vitesse = $vitesse;

        return $this;
    }

    /**
     * Get the value of numero
     */ 
    public function getNumero()
    {
        return $this->numero;
    }
}