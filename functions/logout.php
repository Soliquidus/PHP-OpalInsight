<?php
session_start();

setcookie('login', '', time() - 100, '/');
setcookie('password', '', time() - 100, '/');
setcookie('loginSTATE', '', time() - 100, '/');

session_unset();
session_destroy();

header('Location: /opalinsight');
exit();

