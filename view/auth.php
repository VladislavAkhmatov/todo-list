<?php
require_once '../autoload.php';
session_start();

if (isset($_POST['email']) && isset($_POST['password'])) {
    $login = $_POST['email'];
    $password = $_POST['password'];

    $userMap = new UserMap();
    $user = $userMap->auth($login, $password);

    if ($user) {
        $_SESSION['name'] = $user->name;
        $_SESSION['id'] = $user->id;
        $_SESSION['sys_name'] = $user->sys_name;
        $_SESSION['roleName'] = $user->roleName;

        header('Location: ../index');
        exit;
    } else {
        header('Location: ../404');
        exit;
    }
}

require_once('login.php');
?>