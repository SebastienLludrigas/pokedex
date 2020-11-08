        <main class="types">
            <p>Cliquez sur un type pour voir tous les Pokémon de ce type</p>
            <div class="container-types">
                
                <?php foreach ($viewVars['allTypes'] as $type) : ?>
                    <a href="<?= $router->generate('type_list', ['type_id' => $type->getId()]) ?>" class="item-type" style="background-color: #<?= $type->getColor() ?>">
                            <?= $type->getName() ?>
                    </a>
                <?php endforeach; ?>
                
            </div>
        </main>