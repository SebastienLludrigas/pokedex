<?php

namespace Pokedex\Utils;

use PDO;

// Design Pattern Singleton : Permet de ne créer qu'une seule connexion qui sera utilisée pour tous les 
// appels à getPDO() => on évite de multiples appels qui peuvent dépasser la limite de connexion de notre
// SGBD
class Database {
    /** @var PDO */
    private $dbh;
    private static $_instance;
    private function __construct() {
        // Récupération des données du fichier de config
        // la fonction parse_ini_file parse le fichier et retourne un array associatif
        $configData = parse_ini_file(__DIR__.'/../config.ini');
        
        try {
            $this->dbh = new PDO(
                "mysql:host={$configData['DB_HOST']};dbname={$configData['DB_NAME']};charset=utf8",
                $configData['DB_USERNAME'],
                $configData['DB_PASSWORD'],
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING) // Affiche les erreurs SQL à l'écran
            );
        }
        catch(\Exception $exception) {
            echo 'Erreur de connexion...<br>';
            echo $exception->getMessage().'<br>';
            echo '<pre>';
            echo $exception->getTraceAsString();
            echo '</pre>';
            exit;
        }
    }
    // À chaque appel de getPDO() dans un de nos Models 
    public static function getPDO() {
        // On vérifie si la propriété $_instance est vide, c-à-d si il n'existe pas déjà une connexion
        if (empty(self::$_instance)) {
            // Si c'est le cas ($_instance est vide) on créer une instance de Database que l'on va stocker 
            // dans $_instance
            self::$_instance = new Database();
        }
        // Dans tous les cas on renvoi maintenant la propriété $dbh qui contient la connexion à notre BDD
        return self::$_instance->dbh;
    }
}