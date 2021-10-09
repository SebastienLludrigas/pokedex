<?php

namespace Pokedex\Controllers;

class CoreController  {
    protected $router;

    public function __construct($router) {
        // Je récupère le routeur et le stocke dans une propriété
        $this->router = $router;
    }

    /**
     * Méthode permettant de générer les variables utiles sur toutes les pages
     */
    private function getTransversalVars() {
        // Je retourne un tableau associatif des données utile sur toutes les pages
        return [
            'router' => $this->router,
            'baseUri' => $_SERVER['BASE_URI']
        ];
    }
    
    // Méthode s'occupant d'afficher un template (+ header et footer)
    protected function show($viewName, $viewVars = []) {
        // J'appelle la méthode s'occupant des données à utiliser sur toutes les pages
        $transversalVars = $this->getTransversalVars();

        // On veut désormais accéder aux données de $transversalVars, mais sans accéder au tableau
        // La fonction extract permet de créer une variable pour chaque élément du tableau passé en argument
        extract($transversalVars);

        // dd($router, $baseUri);
        
        // J'appelle mes templates !
        include __DIR__.'/../views/layout/header.tpl.php';
        include __DIR__.'/../views/'.$viewName.'.tpl.php';
        include __DIR__.'/../views/layout/footer.tpl.php';
    }
}