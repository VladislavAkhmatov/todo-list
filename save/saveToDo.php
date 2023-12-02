<?php
require_once('../secure.php');

if (Helper::can('user')) {
    if (isset($_POST['add'])) {
        $todo = new ToDo();
        $todoMap = new ToDoMap();
        $todo->user_id = $_SESSION['id'];
        $todo->name = $_POST['name'];
        $todo->description = $_POST['description'];
        if ($todoMap->addToDo($todo)) {
            header('Location: ../index?message=ok');
            exit;
        } else {
            header('Location: ../index?message=errToDo');
        }
    }

    if (isset($_POST['update'])) {
        $todo = new ToDo();
        $todoMap = new ToDoMap();
        $todo->id = $_POST['id'];
        $todo->name = $_POST['name'];
        $todo->description = $_POST['description'];
        if ($todoMap->updateToDo($todo)) {
            header('Location: ../index?message=okUpdate');
            exit;
        } else {
            header('Location: ../index?message=errUpdate');
        }
    }
}
?>