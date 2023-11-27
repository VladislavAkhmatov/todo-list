<?php require_once('header.php'); ?>
<div class="registration-cssave">
    <form action="../save/saveUser" method="POST">
        <h3 class="text-center">
            <p>Форма регистрации</p>
        </h3>
        <div class="form-group">
            <input class="form-control item" type="text" name="lastname" placeholder="Введите фамилию" required>
        </div>
        <div class="form-group">
            <input class="form-control item" type="text" name="name" placeholder="Введите имя" required>
        </div>
        <div class="form-group">
            <input class="form-control item" type="email" name="email" placeholder="Введите email" required>
        </div>
        <div class="form-group">
            <input class="form-control item" type="password" name="password" placeholder="Введите пароль" required>
        </div>
        <div class="form-group">
            <input type="hidden" name="create">
        </div>
        <div class="form-group">
            <div class="login">
                <input class="btn btn-primary btn-block create-account" type="submit" value="Зарегистрироваться">
            </div>
        </div>
        <div class="form-group">
            <div class="login">
                <a class="btn btn-secondary" href="../index">Назад</a>
            </div>
        </div>
    </form>
</div>
<?php require_once('footer.php'); ?>