<?php

require_once __DIR__ . '/../actions/config.php';
require_once __DIR__ . '/../helpers/helpers.php';

// Запрос имен в БД
try {
    $pdo = getPDO();
    $query = "SELECT * FROM `female`";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
} catch (PDOException $e) {
    echo json_encode(['Не удалось запросить имена для девочек' => $e->getMessage()]);
};