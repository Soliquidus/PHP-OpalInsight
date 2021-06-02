<?php

$_SESSION['title'] = 'Connexion';

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
    $_SESSION['error_message'] = 'Vous êtes déjà connecté !';
    ?>
    <div class="error-message">
        <p>
            <?php
            echo $_SESSION['error_message'];
            ?>
        </p>
        <p>
            <a href="<?php echo $_SESSION['URL']; ?>">Administration</a> |
            <a href="<?php echo $_SESSION['URL']; ?>/functions/logout.php">Déconnexion</a>
        </p>
    </div>
    <?php
} else {
    if (isset($_SESSION['error_message'])) {
        ?>
        <div class="error-message">
            <p>
                <?php
                echo $_SESSION['error_message'];
                ?>
            </p>
        </div>
        <?php
        include 'pages/forms/login.php';
    }
}
?>