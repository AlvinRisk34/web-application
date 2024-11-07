<?php
// Подключение к базе данных
$host = 'localhost';
$db = 'h70026et_petro';
$user = 'h70026et_petro';
$password = '84Horubi@';


// Проверка подключения
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT title, description, event_date, image_path FROM events ORDER BY event_date ASC");
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($events);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Ошибка загрузки данных']);
}
?>
