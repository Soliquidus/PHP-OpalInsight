<?php

$_SESSION['title'] = 'Administration du site';

if(!isset($_SESSION['loggedIn'])) {

    $_SESSION['error_message'] = "Vous devez vous connecter pour accéder à l'administration du site.";
    header('Location: ../../opalinsight/login');

} else {
    if($_SESSION['loggedIn'] && isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    } else {
        $_SESSION['error_message'] = "Vous devez vous connecter pour accéder à l'administration du site.";
        header('Location: ../../opalinsight/connexion');
    }
}

?>

<?php
?>

<div class="main">
    


<div class="main-tdb">

    <div class="wrapperNav">

    <?php
        require 'pages/elements/navAdmin.php';
    ?>
    </div>

    <div class="wrapperContent" id="adminContent">
        <?php
            require $_SESSION['content']
        ?>
    </div>


</div>

</div>
