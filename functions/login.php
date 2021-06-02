<?php session_start();
require_once('database/database.php');

if (!empty($_POST)) {
    $req = $pdo->prepare('SELECT * FROM user WHERE username = :username');
    $req->execute(['username' => $_POST['username']]);
    $data = $req->fetch();

    if (password_verify($_POST['password'], $data['password'])) {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['loggedIn'] = true;

        setcookie('username', $_SESSION['username'], time() + 3600 * 24 * 365, '/');
        setcookie('password', $_POST['password'], time() + 3600 * 24 * 365, '/');
        setcookie('login_state', 'connected', time() + 3600 * 24 * 365, '/');

        header('Location: ../../opalinsight/administration');
        exit();
    } else {
        header('Location: ../../opalinsight/login');
        exit();
    }
}
