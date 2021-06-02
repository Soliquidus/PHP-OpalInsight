<?php
session_start();
require_once ('database/database.php');
require_once ('classes/Country.php');
require_once ('classes/CountryManager.php');

$countryManager = new CountryManager($pdo);

$newCountry = new Country([
    'name' => $_POST['name'],
    'code' => $_POST['code']
]);

$countryManager->addCountry($newCountry);
header('Location: ../opalinsight/administration/edit?type=country');
exit();