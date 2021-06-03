<nav class="navigation">
            <ul class="mainmenu">
                <li><a href="<?php echo $_SESSION['URL'];?>">Home</a></li>
                <li><a href="<?php echo $_SESSION['URL'];?>/administration/edit?type=concert">Gestion Concerts</a>
                </li>
                <li><a href="<?php echo $_SESSION['URL'];?>/administration/edit?type=address">Gestion Lieux</a>
                </li>
                <li><a href="<?php echo $_SESSION['URL'];?>/administration/edit?type=country">Gestion Pays</a>
                </li>
                <li><a href="<?php echo $_SESSION['URL'];?>/administration/edit?type=city">Gestion Villes</a>
                </li>
                <li><a href="<?php echo $_SESSION['URL'];?>/administration/edit?type=product">Boutique</a>
                </li>
                <li><a href="">Déconnexion</a></li>
            </ul>
        </nav>