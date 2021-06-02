<?php
session_start();
$_SESSION['URL'] = 'https://' . $_SERVER['HTTP_HOST'] . '/opalinsight';

require_once 'pages' . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'header.php';
require_once 'database' . DIRECTORY_SEPARATOR . 'database.php';
require_once 'classes' . DIRECTORY_SEPARATOR . 'Country.php';
require_once 'classes' . DIRECTORY_SEPARATOR . 'CountryManager.php';
require_once 'classes' . DIRECTORY_SEPARATOR . 'City.php';
require_once 'classes' . DIRECTORY_SEPARATOR . 'CityManager.php';
require_once 'classes' . DIRECTORY_SEPARATOR . 'Address.php';
require_once 'classes' . DIRECTORY_SEPARATOR . 'AddressManager.php';

$countryManager = new CountryManager($pdo);
$cityManager = new CityManager($pdo);

$page = strtolower($_SERVER['REQUEST_URI']);
$page = explode('/', $page);

if (empty($page[2])) {
    require 'pages/home.php';
}

if ($page[2] === 'login') {
    require 'pages/login.php';
}

if ($page[2] === 'logout') {
    require 'functions/logout.php';
}

if ($page[2] === 'administration' && (!isset($page[3]))) {
    $_SESSION['content'] = 'pages/admin_welcome.php';
    require 'pages/tdb_admin.php';
}

if ($page[2] === 'administration' && (isset($page[3]))) {
    $details = explode('?', $page[3]);
    if ($details[0] === 'edit') {
        $_SESSION['content'] = "pages/edit.php";
    } else if ($details[0] === 'add') {
        $_SESSION['content'] = "pages/add.php";
    } else if ($details[0] === 'update') {
        $_SESSION['content'] = "pages/update.php";
    }
    require 'pages/tdb_admin.php';
}

require_once 'pages' . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'footer.php';