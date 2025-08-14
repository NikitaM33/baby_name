<?php

include_once __DIR__ . "/../helpers/helpers.php";

$name = htmlspecialchars($_POST["name"]) ?? null;
$email = htmlspecialchars($_POST["email"]) ?? null;
$avatar = $_FILES["avatar"] ?? null;
$pass = htmlspecialchars($_POST["pass"]) ?? null;
$passConfirm = htmlspecialchars($_POST["pass_confirm"]) ?? null;

if (empty($name)) {
    setValidationError('name', 'Неверное имя');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    setValidationError('email', 'Неверный email');
}

if (empty($pass)) {
    setValidationError('pass', 'Поле с паролем пустое!');
}

if ($pass !== $passConfirm) {
    setValidationError('pass', 'Пароли не совпадают');
}

if (!empty($_SESSION['validation'])) {
    setOldValue('name', $name);
    setOldValue('email', $email);

    redirect('/baby_name/register.php');
}

if (!empty($avatar)) {
    $types = ["image/jpeg", "image/jpg"];

    if (!in_array($avatar['type'], $types)) {
        setValidationError('avatar', 'Неверное расширение изображения!');
    }

    if (($avatar['size'] / 1000000) >= 1) {
        setValidationError('avatar', 'Слишком большой размер изображения!');
    }
}

if (!empty($avatar)) {
    $avatarPath = uploadFile($avatar, 'avatar');
}

$pdo = getPDO();

$query = "INSERT INTO users (name, email, avatar, password) VALUE (:name, :email, :avatar, :password)";
$params = [
    'name' => $name,
    'email' => $email,
    'avatar' => $avatarPath,
    'password' => password_hash($pass, PASSWORD_DEFAULT),
];
$stmt = $pdo->prepare($query);

try {
    // TO DO: сделать проверку есть ли пользователь с таким email
    $stmt->execute($params);
} catch (Exception $e) {
    die($e->getMessage());
}

redirect('/baby_name/pages/login.php');

