<?php
require_once('../secure.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $todoMap = new ToDoMap();

    if ($todoMap->deleteToDoById($id)) {
        header('Location: ../index?message=success');
    } else {
        header('Location: ../index?message=error');
    }
}
?>