<?php
session_start(); // Запускаем сессию

// Инициализация переменной для ошибок
$error = '';

// Подключение к базе данных
$host = 'localhost';
$dbname = 'h70026et_petro'; // Укажите ваше имя базы данных
$db_user = 'h70026et_petro'; // Логин базы данных
$db_password = '84Horubi@'; // Пароль базы данных

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}

// Проверка отправки формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Поиск пользователя по имени
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute([':username' => $username]);
    $user = $stmt->fetch();

    // Проверка пароля
    if ($user && password_verify($password, $user['password'])) {
        // Установка данных пользователя в сессию
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        
        // Перенаправление на защищенную страницу
        header("Location: protected_page.php");
        exit();
    } else {
        // Установка ошибки, если учетные данные неверны
        $error = "Неверное имя пользователя или пароль.";
    }
}
?>

<!-- HTML-код для отображения формы входа -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
</head>
<body>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #2b2f77; /* Можно настроить под любой цвет фона */
    background-image: url('https://i.ibb.co.com/bWpsv5s/img-2004-1.jpg ');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
.wrapper {
    width: 380px;
    padding: 40px;
    background: rgba(255, 255, 255, 0.1); /* Полупрозрачный фон формы */
    backdrop-filter: blur(10px); /* Размытие фона */
    border-radius: 15px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    text-align: center;
    color: #fff;
}

.wrapper h1 {
    font-size: 32px;
    font-weight: 600;
    margin-bottom: 20px;
}

.input-box {
    position: relative;
    width: 100%;
    height: 50px;
    margin: 20px 0;
}

.input-box input {
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.2); /* Полупрозрачный ввод */
    border: none;
    outline: none;
    border-radius: 25px;
    padding: 0 20px 0 50px;
    font-size: 16px;
    color: #fff;
    box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2);
}

.input-box input::placeholder {
    color: rgba(255, 255, 255, 0.7);
}

.input-box i {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 18px;
    color: rgba(255, 255, 255, 0.7);
}

.wrapper .remember {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 14px;
    margin-top: 10px;
}

.remember label {
    display: flex;
    align-items: center;
}

.remember label input {
    margin-right: 5px;
    accent-color: #fff;
}

.remember a {
    color: rgba(255, 255, 255, 0.7);
    text-decoration: none;
    font-size: 14px;
}

.remember a:hover {
    color: #fff;
}

.wrapper .btn {
    width: 100%;
    height: 45px;
    margin-top: 20px;
    background: #fff;
    color: #333;
    border: none;
    border-radius: 25px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.3s;
}

.wrapper .btn:hover {
    background: #ddd;
}

.register-link {
    margin-top: 20px;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.7);
}

.register-link a {
    color: rgba(255, 255, 255, 0.7);
    text-decoration: none;
    font-weight: 600;
}

.register-link a:hover {
    color: #fff;
    text-decoration: underline;
}

/* Дополнительные стили для иконок */
.input-box i.user-icon::before {
    content: '\f007'; /* Unicode иконки пользователя, использовать FontAwesome или другой шрифт иконок */
    font-family: 'FontAwesome';
}

.input-box i.lock-icon::before {
    content: '\f023'; /* Unicode иконки замка, использовать FontAwesome или другой шрифт иконок */
    font-family: 'FontAwesome';
}
</style>
    <div class="wrapper">
        <form action="login.php" method="POST">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required>
                <i class='bx bx-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bx-lock-alt'></i>
            </div>
            <div class="remember">
                <label><input type="checkbox"> Remember me</label>
                <a href="forgot-password.php">Forgot password?</a>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="register-link">
                <p>Don't have an account? <a href="registration.php">Register</a></p>   
            </div>
        </form>
        <?php if (!empty($error)): ?>
            <p style="color: red;"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
