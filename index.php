<?php
require_once('secure.php');
require_once('view/header.php');
if (Helper::can('admin')) {
    $userMap = new UserMap();
    $users = $userMap->selectAll();


    switch ($_GET['message']) {
        case 'email':
            $message = "Такой email уже зарестрирован";
            break;
        case 'updated':
            $message = "Пользователь успешно обновлен";
            break;
        case 'error':
            $message = "Ошибка при создании пользователя";
            break;
    }
}
?>

<div>
    <h4 class="text-hello">WELCOME
        <?= $_SESSION['name'] ?>, YOU ROLE IS -
        <?= $_SESSION['roleName'] ?>
    </h4>
    <?php
    if (Helper::can('admin')) {
        ?>
        <h4 class="text-hello">
            <?= $message; ?>
        </h4>
    </div>
    <div class="table-center">

        <table class="table table-striped table-dark">
            <tr>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Действие</th>
            </tr>
            <?php

            foreach ($users as $user) {
                echo '<tr>';
                echo '<td>' . $user->lastname . '</td>';
                echo '<td>' . $user->name . '</td>';
                echo '<td><a href=view/edit?id=' . $user->id . '>Редактировать</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </div>
    <?php
    }
    ?>

<?php
if (Helper::can('user')) {
    $todoMap = new ToDoMap();
    $id = $_SESSION['id'];
    $todos = $todoMap->findToDoByUserId($id);
    $message = "Ваши задачи";
    switch ($_GET['message']) {
        case 'success':
            $message = "Запись удалена успешно";
            break;
        case 'error':
            $message = "Ошибка при удалении записи";
            break;
        case 'ok':
            $message = "Задача успешно добавлена";
            break;
        case 'errToDo':
            $message = "Ошибка при добавлении задачи";
            break;
        case 'okUpdate':
            $message = "Задача успешно обновлена";
            break;
        case 'errUpdate':
            $message = "Ошибка при обновлении задачи";
            break;
    }
    ?>
    <h4 class="text-hello">
        <?= $message; ?>
    </h4>
    <form class="btn-center" action="view/addToDo" method="POST">
        <input class="btn btn-primary" type="submit" value="Добавить задачу" name="addToDo">
    </form>
    <?php if ($todos) { ?>
        <br>
        <div class="table-center">
            <table class="table table-striped table-dark">
                <tr>
                    <th>Название задачи</th>
                    <th>Описание</th>
                    <th>Дата создания</th>
                    <th>Действие</th>
                </tr>
                <?php

                foreach ($todos as $todo) {
                    echo '<tr>';
                    echo '<td>' . $todo->name . '</td>';
                    echo '<td>' . $todo->description . '</td>';
                    echo '<td>' . $todo->date_begin . '</td>';
                    echo '<td><a class="btn btn-success" href=view/editToDo?id=' . $todo->id . '>Редактировать</a> ';
                    echo '<a class="btn btn-danger" href=delete/deleteToDo?id=' . $todo->id . '>Удалить</a></td>';
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
        <?php
    } else {
        ?>
        <h4 class="text-hello">
            Список задач пуст
        </h4>
    <?
    }
}
?>

<form class="btn-center" action="secure" method="POST">
    <input class="btn btn-primary" type="submit" value="Выход" name="out">
</form>

<?php require_once('view/footer.php'); ?>