<?php require_once('header.php'); ?>
<div class="registration-cssave">
    <?php
    $message = 'Форма входа';
    switch ($_GET['message']) {
        case 'email':
            $message = "Такой email уже зарестрирован";
            break;
        case 'created':
            $message = "Пользователь успешно зарегистрирован";
            break;
        case 'error':
            $message = "Ошибка при создании пользователя";
            break;
    }
    ?>

    <form class="form-style" action="auth" method="POST">
        <h3 class="text-center">
            <?= $message; ?>
        </h3>

        <div class="form-group">
            <input class="form-control item" type="email" name="email" placeholder="Введите email">
        </div>
        <div class="form-group">
            <input class="form-control item" type="password" name="password" placeholder="Введите пароль">
        </div>
        <div class="form-group">
            <div class="login">
                <button class="btn btn-primary btn-block create-account" type="submit" name="auth">Вход в
                    аккаунт</button>
            </div>
        </div>
        <div class="form-group">
            <div class="login">
                <a class="btn btn-secondary" href="reg">Зарегистрироваться</a>
            </div>
        </div>
    </form>
</div>
<?php require_once('footer.php'); ?>