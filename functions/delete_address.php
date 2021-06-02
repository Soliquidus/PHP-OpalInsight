<?php
session_start();
require_once('database/database.php');
require_once('classes/Address.php');
require_once('classes/AddressManager.php');
require_once('classes/City.php');
require_once('classes/CityManager.php');

$addressManager = new AddressManager($pdo);
$id=$_GET['id'];

$addressManager->deleteAddress($id);
header('Location: ../../opalinsight/administration/edit?type=address');
exit();