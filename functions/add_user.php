<?php
require_once('database/database.php');
require_once('classes/User.php');
require_once('classes/UserManager.php');

$userManager = new UserManager($pdo);

$newUser = new User([
    'username' => $_POST['username'],
    'email' => $_POST['email'],
    'password' => $_POST['password'],
]);

$userManager->addUser($newUser);
header('Location: ../../opalinsight/administration');
exit();