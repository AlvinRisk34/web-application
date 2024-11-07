<?php
session_start();

$host = 'localhost';
$db = 'h70026et_petro';
$user = 'h70026et_petro';
$pass = '84Horubi@';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Ошибка подключения к базе данных.']));
}

// Проверяем, авторизован ли пользователь
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'You must be logged in to submit a review.']);
    exit;
}

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username']; // Получаем имя пользователя из сессии
$feedback = $_POST['feedback']; // Получаем текст отзыва

// Проверяем, что отзыв не пустой
if (!empty($feedback)) {
    // Начинаем транзакцию
    $conn->begin_transaction();

    try {
        // Записываем отзыв в базу данных
        $stmt = $conn->prepare("INSERT INTO feedbacks (user_id, username, feedback) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $user_id, $username, $feedback);
        $stmt->execute();

        // Начисление баллов за добавление отзыва
        $points = 5; // Количество баллов за отзыв
        $stmt = $conn->prepare("UPDATE users SET points = points + ? WHERE id = ?");
        $stmt->bind_param("ii", $points, $user_id);
        $stmt->execute();

        // Подтверждаем транзакцию
        $conn->commit();
        
        echo json_encode(['success' => 'Review submitted successfully.']);
    } catch (Exception $e) {
        // Откат транзакции в случае ошибки
        $conn->rollback();
        echo json_encode(['error' => 'Error submitting the review.']);
    }
} else {
    echo json_encode(['error' => 'Please enter a feedback.']);
}

$conn->close();
?>
