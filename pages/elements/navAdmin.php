<nav class="navigation">
            <ul class="mainmenu">
                <li><a href="<?php echo $_SESSION['URL'];?>">Home</a></li>
                <li><a href="<?php echo $_SESSION['URL'];?>/administration/edit?type=concert">Gestion Concerts</a>
                </li>
                <li><a href="<?php echo $_SESSION['URL'];?>/administration/edit?type=lieu">Gestion Lieux</a>
                </li>
                <li><a href="<?php echo $_SESSION['URL'];?>/administration/edit?type=pays">Gestion Pays</a>
                </li>
                <li><a href="<?php echo $_SESSION['URL'];?>/administration/edit?type=ville">Gestion Villes</a>
                </li>
                <li><a href="<?php echo $_SESSION['URL'];?>/administration/edit?type=produit">Boutique</a>
                </li>
                <li><a href="">Déconnexion</a></li>
            </ul>
        </nav>