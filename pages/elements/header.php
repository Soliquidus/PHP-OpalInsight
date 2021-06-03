<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Opal Insight || <?php if(isset($_SESSION['title'])) {echo $_SESSION['title']; }?></title>
    <link href="https://fonts.googleapis.com/css?family=Pinyon+Script|Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+SC&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo $_SESSION['URL'];?>/style/screen.css">
<link rel="stylesheet" href="<?php echo $_SESSION['URL'];?>/style/style.css">
<link rel="stylesheet" href="<?php echo $_SESSION['URL'];?>/style/style-admin.scss">
</head>
<body>
<header class="headerHome">
    <div class="topbar">
   
    <div style='float: right' id="linkConnexion">
        <?php
            if(isset( $_SESSION['loggedIn'] ) &&  $_SESSION['loggedIn'] ) {
                ?>
                <a href="<?php echo $_SESSION['URL'];?>/logout">déconnexion</a>
                <?php
            } else {?>
                <a href="<?php echo $_SESSION['URL'];?>/login">connexion</a>
                <?php
            }
        ?>
        
        <a href="<?php echo $_SESSION['URL'];?>/administration">admin</a>
    </div>
        <div class="logo ">
            <a href="/"><img src="<?php echo $_SESSION['URL'];?>/img/Logo.png" alt="Opal Insight"></a>
        </div>
        <nav class="menu ">
            <a href= "<?php echo $_SESSION['URL'];?>" class="menu-item">Le groupe</a>
            <a href="/" class="menu-item">Notre musique</a>
            <a href="/" class="menu-item">Merch</a>
            <a href="/" class="menu-item">Contact</a>
        </nav>
    </div>

</header>