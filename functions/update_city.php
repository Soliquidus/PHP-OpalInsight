<?php
session_start();
require_once ('database/database.php');
require_once ('classes/Country.php');
require_once ('classes/CountryManager.php');

$cityManager = new CityManager($pdo);

$newCountry = new City([
    'id' => $_GET['id'],
    'name' => $_POST['name'],
    'country_id' => $_POST['country_id']
]);

$cityManager->updateCity($newCountry);
header('Location: ../opalinsight/administration/edit?type=city');
exit();