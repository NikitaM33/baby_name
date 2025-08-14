<?php

session_start();

require_once __DIR__ . '/../actions/config.php';

// Ревирект
function redirect($path)
{
    header("Location: $path");

    die();
}

// Добавление атирибута с ошибкой
function errorAttr($fieldName)
{
    echo isset($_SESSION['validation'][$fieldName]) ? 'aria-invalid="true"' : '';
}

// Получение ошибки
function getError($fieldName)
{
    $message = $_SESSION['validation'][$fieldName] ?? '';
    unset($_SESSION['validation'][$fieldName]);

    echo $message;
}

// Проверка есть ли ошибки
function hasValidationErorr($fieldname): bool
{
    return isset($_SESSION['validation'][$fieldname]);
}

// Ошибка валидации
function setValidationError(string $fieldname, string $message)
{
    $_SESSION['validation'][$fieldname] = $message;
}

// Добавляем старые сохраненные значения в поля формы
function setOldValue(string $key, mixed $value)
{
    $_SESSION['old'][$key] = $value;
}

// Сохраняем старые значения введенные в поля
function old(string $key)
{
    $value = $_SESSION['old'][$key] ?? '';
    unset($_SESSION['old'][$key]);

    return $value;
}

// Добавление аватарки
function uploadFile(array $file, string $prefix = '')
{
    $uploadPath = __DIR__ . '/../../uploads';

    if (!is_dir($uploadPath)) {
        mkdir($uploadPath, 0777, true);
    }

    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $fileName = $prefix . '_' . time() . ".$ext";

    if (!move_uploaded_file($file['tmp_name'], "$uploadPath/$fileName")) {
        die('Ошибка при загрузке!');
    }

    return "uploads/$fileName";
}

// Подключение к БД
function getPDO(): PDO
{
    try {
        return new PDO('mysql:host=' . DB_HOST . ';charset=utf8;dbname=' . DB_NAME, DB_USER, DB_PASS);
    } catch (PDOException $e) {
        die("BD connection error: {$e->getMessage()}");
    }
}

// Обработка ошибки при входе в админку
function setMessage(string $key, string $message): void
{
    $_SESSION['message'][$key] = $message;
}

function hasMessage(string $key): bool
{
    return isset($_SESSION['message'][$key]);
}

function getMessage(string $key): string
{
    $message = $_SESSION['message'][$key] ?? '';
    unset($_SESSION['message'][$key]);

    return $message;
}

// Запрос в БД для поиска юзера
function findUser(string $email)
{
    $pdo = getPDO();
    $stmt = $pdo->prepare("SELECT * FROM users WHERE `email` = :email");
    $stmt->execute(['email' => $email]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Поиск в БД авторизованного пользователя
function currentUser()
{
    $pdo = getPDO();

    if (!$_SESSION['user']) {
        return false;
    }

    $userId = $_SESSION['user']['id'] ?? null;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE `id` = :id");
    $stmt->execute(['id' => $userId]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Logout
function logout()
{
    unset($_SESSION['user']['id']);

    redirect('/baby_name/pages/login.php');
}

// Доп проверка зарегестрирован ли пользователь
function checkAuth()
{
    if (!isset($_SESSION['user']['id'])) {
        redirect('/baby_name/login.php');
    }
}

// Проверка что мы не авторизированы
function checkGuest()
{
    if (isset($_SESSION['user']['id'])) {
        redirect('/baby_name/admin/control.php');
    }
}