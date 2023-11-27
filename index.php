<?php
require_once('secure.php');
$userMap = new UserMap();
$users = $userMap->selectAll();
require_once('view/header.php');
?>


<div>
    <h4 class="text-hello">WELCOME
        <?= $_SESSION['name'] ?>, YOU ROLE IS -
        <?= $_SESSION['roleName'] ?>
    </h4>
</div>
<div>
    <?php
    if (Helper::can('admin')) {
        ?>
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
    }
    ?>
    </table>
</div>
<form action="secure" method="POST">
    <input class="btn btn-primary" type="submit" value="Выход" name="out">
</form>
<?php require_once('view/footer.php'); ?>