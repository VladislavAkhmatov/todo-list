<?php
require_once('../secure.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $userMap = new UserMap();
    $user = $userMap->findUserById($id);
} else {
    header('Location: 404');
}

?>
<?php require_once('header.php'); ?>
<div class="edit-cssave">
    <form class="form-style" action="../save/saveUser" method="POST">
        <h3 class="text-center">Форма редактирования</h3>
        <div class="form-group">
            <input class="form-control item" type="hidden" name="id" value="<?= $user->id ?>">
        </div>
        <div class="form-group">
            <input class="form-control item" type="text" name="lastname" value="<?= $user->lastname ?>">
        </div>
        <div class="form-group">
            <input class="form-control item" type="text" name="name" value="<?= $user->name ?>">
        </div>
        <div class="form-group">
            <input class="form-control item" type="email" name="email" value="<?= $user->login ?>">
        </div>
        <div class="form-group">
            <select class="form-select" name="role_id">
                <?php
                Helper::printOptions(($userMap->arrRoles()));
                ?>
            </select>
        </div>
        <div class="form-group">
            <input class="form-control item" type="password" name="password">
        </div>
        <div class="form-group">
            <input class="btn btn-success" type="submit" value="Обновить">
        </div>
        <div class="form-group">
            <a href="../index" class="btn btn-secondary">Назад</a>
        </div>
        <div class="form-group">
            <input type="hidden" name="update">
        </div>
    </form>
</div>
<?php require_once('footer.php'); ?>