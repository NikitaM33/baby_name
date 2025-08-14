<?php

include_once __DIR__ . '/../src/helpers/helpers.php';

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
    <title>Вход в админку</title>
</head>

<body>
    <h2 class="text-center pt-5">Baby name админка</h2>

    <form action="../src/actions/login_handler.php" method="post" class="text-center pt-3 register-form">
        <?php if (hasMessage('error')): ?>
            <div class="notice__error"><?php echo getMessage('error'); ?></div>
        <?php endif; ?>

        <div class="form-group mb-3 register-form__input">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" value="<?= old('email'); ?>" placeholder="example@mail.com" <?php errorAttr('email'); ?> />
            <?php if (hasValidationErorr('email')): ?>
                <small class="error"><?php getError('email') ?></small>
            <?php endif; ?>
        </div>

        <div class="form-group mb-3 register-form__input">
            <label for="pass">Пароль</label>
            <input type="password" id="pass" name="pass" placeholder="*****" />
        </div>

        <button type="submit" class="btn btn-primary">Вход</button>
    </form>

    <div class="text-center pt-4">
        <span class="h6">
            <a href="./register.php" class="linkTo">Зарегестрироваться</a>
        </span>
    </div>

    <div style="text-align:center;padding-top:6.25rem;">
        <span class="h6">
            <a href="../index.php" class="linkTo">На главную</a>
        </span>
    </div>

</body>

</html>