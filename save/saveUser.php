<?php
session_start();
require_once '../autoload.php';
if (isset($_POST['create'])) {
    $user = new User();

    $user->lastname = $_POST['lastname'];
    $user->name = $_POST['name'];
    $user->login = $_POST['email'];
    $user->password = password_hash(
        $_POST['password'],
        PASSWORD_DEFAULT
    );

    $userMap = new UserMap();

    $existingUser = $userMap->findUserByEmail($user);

    if ($existingUser) {
        header('Location: ../view/auth?message=email');
        exit();
    } elseif ($userMap->saveUser($user)) {
        header('Location: ../view/auth?message=created');
        exit();
    } else {
        header('Location: ../view/auth?message=error');
        exit();
    }
}

if (isset($_POST['update'])) {
    $user = new User();
    $user->id = $_POST['id'];
    $user->lastname = $_POST['lastname'];
    $user->name = $_POST['name'];
    $user->role_id = $_POST['role_id'];
    $user->login = $_POST['email'];
    $user->password = password_hash(
        $_POST['password'],
        PASSWORD_DEFAULT
    );

    $userMap = new UserMap();
    if ($userMap->updateUser($user)) {
        header('Location: ../index?message=updated');
        exit();
    } else {
        header('Location: ../index?message=error');
        exit();
    }
}

?>