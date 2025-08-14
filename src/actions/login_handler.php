<?php 

include_once __DIR__ . '/../helpers/helpers.php';

$email = $_POST['email'] ?? null;
$pass = $_POST['pass'] ?? null;

$user = findUser($email);

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    setOldValue('email', $email);
    setValidationError('email', "Некорректный email!");
    setMessage('error', "Ошибка при входе!");
    redirect('/baby_name/login.php');
}

if (!$user) {
    setMessage('error', "Не удалость найти пользователя!");
    redirect('/baby_name/login.php');
}

if (!password_verify($pass, $user['password'])) {
    setMessage('error', "Не удалость войти в панель!");
    redirect('/baby_name/login.php');
}

$_SESSION['user']['id'] = $user['id'];

redirect('/baby_name/admin/control.php');