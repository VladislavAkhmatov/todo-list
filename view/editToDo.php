<?php
require_once('../secure.php');
if (Helper::can('user')) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $todoMap = new ToDoMap();
        $todo = $todoMap->findToDoById($id);
    } else {
        header('Location: ../404');
    }
    require_once('header.php');

    ?>
    <div class="edit-cssave">
        <form class="form-style" action="../save/saveToDo" method="POST">
            <h3 class="text-center">Форма редактирования</h3>
            <div class="form-group">
            </div>
            <div class="form-group">
                <input class="hidden" type="hidden" name="id" value="<?= $todo->id ?>">
                <input class="form-control item" type="text" name="name" value="<?= $todo->name ?>">
            </div>
            <div class="form-group">
                <input class="form-control item" type="text" name="description" value="<?= $todo->description ?>">
            </div>
            <div class="form-group">
                <input class="btn btn-success" type="submit" value="Обновить">
                <input class="hidden" type="hidden" name="update">
            </div>
            <div class="form-group">
                <a href="../index" class="btn btn-secondary">Назад</a>
            </div>
        </form>
    </div>
    <?php require_once('footer.php');
} else {
    header('Location: ../404');
}
?>