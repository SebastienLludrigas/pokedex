        <main class="all-pokemons">

        <?php foreach ($viewVars['pokemons'] as $pokemon) : ?>

            <div class="all-pokemons__one">
                <a href="<?= $router->generate('details', ['details_id' => $pokemon->getId()]) ?>">
                    <img src="<?= $baseUri ?>/assets/img/<?= $pokemon->getNumero() ?>.png" alt="<?= $pokemon->getNom() ?>">
                </a>
                <p>#<?= $pokemon->getNumero() . ' ' . $pokemon->getNom() ?></p>
            </div>

        <?php endforeach; ?>

        </main>
        