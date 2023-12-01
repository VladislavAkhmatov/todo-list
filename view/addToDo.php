<?php
require_once('../secure.php');
require_once('header.php');
if (Helper::can('user')) {

    ?>

    <div class="edit-cssave">
        <form class="form-style" action="../save/saveToDo" method="POST">
            <h3 class="text-center">Форма редактирования</h3>
            <div class="form-group">
                <label>Название задачи</label>
                <input class="form-control item" type="text" name="name">
            </div>
            <div class="form-group">
                <label>Описание задачи</label>
                <input class="form-control item" type="text" name="description">
            </div>

            <div class="form-group">
                <input class="btn btn-success" type="submit" value="Добавить">
            </div>
            <div class="form-group">
                <input type="hidden" name="add">
            </div>
        </form>
    </div>
<?php }
require_once('footer.php');
?>