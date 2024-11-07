<?php
$host = 'localhost'; // Обычно localhost
$db_name = 'h70026et_petro';
$username = 'h70026et_petro';
$password = '84Horubi@'; // Пароль базы данных



try {
    $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}

// Проверка отправки формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Проверка существования пользователя с таким же именем или email
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username OR email = :email");
    $stmt->execute([':username' => $username, ':email' => $email]);
    $existingUser = $stmt->fetch();

    if ($existingUser) {
        echo "Пользователь с таким именем или email уже существует.";
    } else {
        // Хеширование пароля
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Вставка данных нового пользователя в базу данных
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $stmt->execute([':username' => $username, ':email' => $email, ':password' => $hashed_password]);

        // Перенаправление на страницу входа
        header("Location: vhod.php");
        exit(); // Завершаем скрипт после перенаправления
    }
}
?>
