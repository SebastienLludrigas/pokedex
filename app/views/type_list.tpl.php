        <h1 class="name-type"><?= $viewVars['pokemonType']->getName() ?></h1>
        
        <main class="all-pokemons">

        <?php foreach ($viewVars['allPokemons'] as $pokemon) : ?>

            <div class="all-pokemons__one">
                <a href="<?= $router->generate('details', ['details_id' => $pokemon['id']]) ?>">
                    <img src="<?= $baseUri ?>/assets/img/<?= $pokemon['numero'] ?>.png" alt="<?= $pokemon['nom'] ?>">
                </a>
                <p>#<?= $pokemon['numero'] . ' ' . $pokemon['nom'] ?></p>
            </div>

        <?php endforeach; ?>

        </main>