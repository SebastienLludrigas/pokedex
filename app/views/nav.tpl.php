            <nav>
                <ul class="nav-container">
                    <li class="name-site"><a href="<?= $router->generate('home') ?>">Pokédex</a></li>
                    <li>
                        <ul class="nav-right">
                            <li><a href="<?= $router->generate('home') ?>">Liste</a></li>
                            <li><a href="<?= $router->generate('types') ?>">Types</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>