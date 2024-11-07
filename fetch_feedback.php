<?php
session_start();
$host = 'localhost';
$db = 'h70026et_petro';
$user = 'h70026et_petro';
$pass = '84Horubi@';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die(json_encode([])); // Возвращаем пустой массив в случае ошибки
}


 // Подключаем файл с соединением с базой данных

// Получаем отзывы из базы данных
$query = "SELECT username, feedback, created_at FROM feedbacks ORDER BY created_at DESC";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="feedback-item">';
        echo '<strong>' . htmlspecialchars($row['username']) . '</strong>';
        echo '<p>' . htmlspecialchars($row['feedback']) . '</p>';
        echo '<small>' . $row['created_at'] . '</small>';
        echo '</div>';
    }
} else {
    echo 'No feedback available.';
}
?>
