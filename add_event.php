<?php
$host = 'localhost';
$db = 'h70026et_petro';
$user = 'h70026et_petro';
$pass = '84Horubi@';

$conn = new mysqli($host, $user, $pass, $db);
// Проверка подключения
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Получение данных события
    $title = $_POST['title'];
    $event_date = $_POST['event_date'];
    $description = $_POST['description'];

    // Обработка изображения
    $image_path = null;
    if (isset($_FILES['event_image']) && $_FILES['event_image']['error'] == 0) {
        $image_path = 'uploads/' . basename($_FILES['event_image']['name']);
        move_uploaded_file($_FILES['event_image']['tmp_name'], $image_path);
    }

    // Вставка данных в базу
    $stmt = $pdo->prepare("INSERT INTO events (title, description, event_date, image_path) VALUES (?, ?, ?, ?)");
    $stmt->execute([$title, $description, $event_date, $image_path]);

    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>
