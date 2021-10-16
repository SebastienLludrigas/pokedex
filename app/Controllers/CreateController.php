<?php 

namespace Pokedex\Controllers;

use Pokedex\Models\Pokemon;
use Pokedex\Models\PokemonType;
use Pokedex\Models\Type;

class CreateController extends CoreController {


    public function details($urlParams) {

        // Dans cette méthode je récupère toutes les informations dont j'ai besoin sans faire de requête jointe,
        // juste en utilisant plusieurs tableaux et des getters, pour la beauté du geste :-)
        // J'aurais pu utiliser une requête jointe via la méthode finByType,(ce que j'ai fait d'ailleurs fait pour la 
        // méthode typeList un peu plus bas) qui était déjà prête dans la class Pokemon.

        // Je récupère toutes les infos sur le pokemon dont l'id est passé dans l'url + son(ses) type(s)
        $emptyPokemon = new Pokemon();
        $pokemon = $emptyPokemon->findByTypeBis($urlParams['details_id']);

        // dd($pokemon);

        // Si le personnage n'existe pas, on redirige l'utilisateur vers la 404
        if ($pokemon === false) {

            return $this->show('error/404');
        }

        // Je récupère toutes les lignes de la table pokemon_type dont le pokemon_id est identique au 
        // pokemon_id passé dans l'url
        $emptyPokemonType = new PokemonType();
        $allPokemonTypes = $emptyPokemonType->findByPokemonNumero($pokemon->getNumero());

        // dd($allPokemonTypes);

        //Je boucle sur $allPokemonTypes pour récupérer uniquement ses type_id que je stocke dans un tableau
        $type_id = [];
        foreach ($allPokemonTypes as $pokemonType) {
            $type_id[] = $pokemonType->getTypeId(); 
        }

        // dd($type_id);

        // Je créer une nouvelle instance de Type
        $emptyType = new Type();

        // Je boucle sur $type_id pour récupérer les infos du type dont l'id correspond à l'id du pokemon 
        // passée dans l'url
        foreach ($type_id as $id) {
            $allTypes[] = $emptyType->findById($id);
        }

        // dd($allTypes);
        
        $this->show('details', [
                    'pokemon'  => $pokemon,
                    'allTypes' => $allTypes
        ]);

    }

    public function types() {

        // Récupération de toutes les infos sur tous les types
        $emptyType = new Type();
        $allTypes = $emptyType->findAll();

        $this->show('types', ['allTypes' => $allTypes]);

    }

    public function typeList($urlParams) {
        
        // Récupération de tous les pokémon dont l'id du type est passé dans l'url
        $emptyPokemon = new Pokemon();
        $allPokemons = $emptyPokemon->findAllByType($urlParams['type_id']);
        
        // Récupération des propriétés du type dont l'id est passé dans l'url
        $pokemonType = Type::findById($urlParams['type_id']);

        $this->show('type_list', [
            'allPokemons' => $allPokemons,
            'pokemonType' => $pokemonType
        ]);

    }

}