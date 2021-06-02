<?php
session_start();
require_once('database/database.php');
require_once('classes/Address.php');
require_once('classes/AddressManager.php');
require_once('classes/City.php');
require_once('classes/CityManager.php');

$addressManager = new AddressManager($pdo);

// Retrieve the ID of a country
$cityManager = new CityManager($pdo);
// City is found with ID city of form
$city = $cityManager->getCity($_POST['city_id']);
// We get the city's ID (City class property)
$country_id = $city->getCountryId();

$newAddress = new Address([
    'name' => $_POST['name'],
    'number' => $_POST['number'],
    'address' => $_POST['address'],
    'postal_code' => $_POST['postal_code'],
    'city_id' => $_POST['city_id'],
    'country_id' => $country_id
]);

$addressManager->updateAddress($newAddress);
header('Location: ../opalinsight/administration/edit?type=address');
exit();
