    <main class="details">
            <h1>Détails de <?= $viewVars['pokemon']->getNom() ?></h1>
            <div class="container-details">
                <div class="image">
                    <img src="<?= $baseUri ?>/assets/img/<?= $viewVars['pokemon']->getNumero() ?>.png" alt="">
                </div>
                <div class="container-infos">
                    <h2>#<?= $viewVars['pokemon']->getNumero() . ' ' . $viewVars['pokemon']->getNom() ?></h2>
                    
                    <?php foreach ($viewVars['allTypes'] as $type) : ?>
                        <span class="type" style="background-color: #<?= $type->getColor() ?>;"><?= $type->getName() ?></span>
                    <?php endforeach; ?>
                    
                    <h3>Statistiques</h3>

                    <div class="statistiques">

                        <table>
                            <tr>
                                <td class="name"><p>PV</p></td>
                                <td class="level"><p><?= $viewVars['pokemon']->getPv() ?></p></td>
                                <td class="bar"><div class="progress-bar"><span class="progress" style="width: <?= intval($viewVars['pokemon']->getPv()/255*100) ?>%"></span></div></td>
                            </tr><tr>
                                <td class="name"><p>Attaque</p></td>
                                <td class="level"><p><?= $viewVars['pokemon']->getAttaque() ?></p></td>
                                <td class="bar"><div class="progress-bar"><span class="progress" style="width: <?= intval($viewVars['pokemon']->getAttaque()/255*100) ?>%"></span></div></td>
                            </tr><tr>
                                <td class="name"><p>Défense</p></td>
                                <td class="level"><p><?= $viewVars['pokemon']->getDefense() ?></p></td>
                                <td class="bar"><div class="progress-bar"><span class="progress" style="width: <?= intval($viewVars['pokemon']->getDefense()/255*100) ?>%"></span></div></td>
                            </tr><tr>
                                <td class="name"><p>Attaque Spé.</p></td>
                                <td class="level"><p><?= $viewVars['pokemon']->getAttaqueSpe() ?></p></td>
                                <td class="bar"><div class="progress-bar"><span class="progress" style="width: <?= intval($viewVars['pokemon']->getAttaqueSpe()/255*100) ?>%"></span></div></td>
                            </tr><tr>
                                <td class="name"><p>Défense Spé.</p></td>
                                <td class="level"><p><?= $viewVars['pokemon']->getDefenseSpe() ?></p></td>
                                <td class="bar"><div class="progress-bar"><span class="progress" style="width: <?= intval($viewVars['pokemon']->getDefenseSpe()/255*100) ?>%"></span></div></td>
                            </tr><tr>
                                <td class="name"><p>Vitesse</p></td>
                                <td class="level"><p><?= $viewVars['pokemon']->getVitesse() ?></p></td>
                                <td class="bar"><div class="progress-bar"><span class="progress" style="width: <?= intval($viewVars['pokemon']->getVitesse()/255*100) ?>%"></span></div></td>
                            </tr>
                        </table>

                    </div>

                </div>
            </div>
            <p class="lien"><a href="<?= $router->generate('home') ?>">Revenir à la liste</a></p>
        </main>