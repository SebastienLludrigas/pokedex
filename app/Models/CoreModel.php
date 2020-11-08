<?php 

namespace Pokedex\Models;

class CoreModel {

    // Propriétés communes aux Models
    protected $id;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }
}