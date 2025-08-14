<?php
require_once '../src/helpers/helpers.php';

checkAuth();

$user = currentUser();
?>

<?php if (!empty($_SESSION['user']['id'])): ?>
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
        <title>Админ панель</title>
    </head>

    <body>
        <div class="main">
            <div class="avatar">
                <img src="../<?= $user['avatar']; ?>" alt="<?= $user['name']; ?>">
            </div>

            <h3 class="text-center">Привет <?= $user['name']; ?></h3>

            <form action="../src/actions/logout_handler.php" method="post">
                <button class="logout">Выйти</button>
            </form>
        </div>


    </body>

    </html>

<?php else:
    header('Location: ../login.php'); ?>
<?php endif; ?>