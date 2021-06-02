<?php
session_start();
require_once('database/database.php');
require_once('classes/Product.php');
require_once('classes/ProductManager.php');

$folder = 'img/';
echo '<pre>';
print_r($_FILES);
echo '</pre>';
$file = basename($_FILES['picture']['name']);
$iniPath = php_ini_loaded_file();

$max_size = 100000;
$size = filesize($_FILES['picture']['tmp_name']);
echo $size;
$extensions = array('.png', '.gif', '.jpg', '.jpeg');
$extension = strrchr($_FILES['picture']['tmp_name'], '.');

// Security checks
if (!in_array($extension, $extensions)) {
    $error = 'Fichiers de type png, gif, jpg, txt ou doc seulement';
}
if ($size > $max_size) {
    $error = 'Le fichier est trop gros';
}
// If no errors, upload is processing
if (!isset($error)) {
    // File name formatting
    $file = strtr($file, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
        'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
    $file = preg_replace('/([^.a-z0-9]+)/i', '-', $file);
    if (move_uploaded_file($_FILES['picture']['name'], $folder . $file)) {
        echo 'Le fichier a été bien transféré';
    } else {
        echo 'Echec lors de la tentative de transfert';
    }
}
else {
    echo $error;
}

$productManager = new ProductManager($pdo);
$date = new DateTime();
$newProduct = new Product([
    'name' => $_POST['name'],
    'description' => $_POST['description'],
    'stock' => $_POST['stock'],
    'picture' => $folder.$file,
    'dateAdded' => $date->getTimestamp()
]);

$productManager->addProduct($newProduct);
header('Location: '.$_SESSION['URL'].'/administration/edit?type=product');
exit();