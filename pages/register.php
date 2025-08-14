<?php

include_once __DIR__ . "/../src/helpers/helpers.php";

checkGuest();

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../libs/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/main.css">
    <title>Регистрация</title>
</head>

<body>
    <h2 style="text-align:center;padding-top:6.25rem;">Baby name регистрация</h2>

    <form action="../src/actions/register.php" method="post" enctype="multipart/form-data"
        class="text-center pt-3 register-form">
        <div class="form-group mb-3 register-form__input">
            <label for="name">Имя</label>
            <input type="text" id="name" name="name" value="<?= old('name'); ?>" placeholder="Иван" <?php errorAttr('name'); ?> />
            <?php if (hasValidationErorr('name')): ?>
                <small class="error"><?php getError('name') ?></small>
            <?php endif; ?>
        </div>

        <div class="form-group mb-3 register-form__input">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" value="<?= old('email'); ?>" placeholder="example@mail.com" <?php errorAttr('email'); ?> />
            <?php if (hasValidationErorr('email')): ?>
                <small class="error"><?php getError('email') ?></small>
            <?php endif; ?>
        </div>

        <div class="form-group mb-3 register-form__input">
            <label for="avatar">Изображение</label>
            <input type="file" id="avatar" name="avatar" <?php errorAttr('avatar'); ?> />
            <?php if (hasValidationErorr('avatar')): ?>
                <small class="error"><?php getError('avatar') ?></small>
            <?php endif; ?>
        </div>

        <div class="form-group mb-3 register-form__input">
            <label for="pass">Пароль</label>
            <input type="password" id="pass" name="pass" placeholder="*****" <?php errorAttr('pass'); ?> />
            <?php if (hasValidationErorr('pass')): ?>
                <small class="error"><?php getError('pass') ?></small>
            <?php endif; ?>
        </div>

        <div class="form-group mb-3 register-form__input">
            <label for="pass_confirm">Подтверждение пароля</label>
            <input type="password" id="pass_confirm" name="pass_confirm" placeholder="*****" />
        </div>

        <button type="submit" class="btn btn-primary">Продолжить</button>
    </form>


    <div class="text-center pt-5 register-menu">
        <div class="h6 register-menu__back">
            Войти в <a href="./login.php" class="linkTo">аккаунт</a>
        </div>
        <div class="h6">
            <a href="../index.php" class="linkTo">На главную</a>
        </div>
    </div>

</body>

</html>