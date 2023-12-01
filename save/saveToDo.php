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
}
?>