<?php 

namespace Pokedex\Controllers;

use Pokedex\Models\Pokemon;

class MainController extends CoreController {

    public function home() {

        // Je récupère tous les pokemons
        $emptyPokemon = new Pokemon();
        $pokemons = $emptyPokemon->findAll();

        // dd($pokemons, 'test');
        

        $this->show('home', ['pokemons' => $pokemons]);

    }

    public function page404() {

        // dd('Test');
        $this->show('error/404');

    }
}