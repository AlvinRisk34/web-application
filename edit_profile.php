<?php
session_start();

// Подключение к базе данных
$host = 'localhost';
$db_name = 'h70026et_petro';
$username = 'h70026et_petro';
$password = '84Horubi@';

$dsn = "mysql:host=$host;dbname=$db_name;charset=utf8";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Ошибка подключения: ' . $e->getMessage();
}

// Проверка, авторизован ли пользователь
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Получение данных пользователя из базы данных
$userId = $_SESSION['user_id'];
$query = "SELECT username, email, avatar, points FROM users WHERE id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$userId]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo "User not found!";
    exit();
}

// Проверка на наличие аватара
$defaultAvatar = 'uploads/default-avatar.png';
$userAvatar = !empty($user['avatar']) ? 'uploads/' . $user['avatar'] : $defaultAvatar;

// Обработка обновления данных профиля
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $avatar = $_FILES['avatar'];

    // Обработка аватара
    if ($avatar['error'] === UPLOAD_ERR_OK) {
        $avatarName = uniqid() . '.' . pathinfo($avatar['name'], PATHINFO_EXTENSION);
        move_uploaded_file($avatar['tmp_name'], 'uploads/' . $avatarName);

        // Удаление старого аватара, если он существует
        if (!empty($user['avatar']) && file_exists('uploads/' . $user['avatar'])) {
            unlink('uploads/' . $user['avatar']);
        }

        // Обновляем информацию о пользователе
        $query = "UPDATE users SET username = ?, email = ?, avatar = ? WHERE id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$username, $email, $avatarName, $userId]);
    } else {
        // Если аватар не был загружен, обновляем только имя и email
        $query = "UPDATE users SET username = ?, email = ? WHERE id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$username, $email, $userId]);
    }

    header('Location: edit_profile.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактировать профиль</title>
    <style>
        /* Стили страницы */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f9f9f9;
        }

        .profile-page {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 300px;
            text-align: center;
        }

        .avatar-preview {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: #f0f0f0;
            background-size: cover;
            background-position: center;
            margin: 10px auto;
            background-image: url('<?php echo $userAvatar; ?>');
        }

        .form-group {
            margin: 15px 0;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group input[type="email"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group input[type="file"] {
            width: 100%;
        }

        .submit-btn {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .submit-btn:hover {
            background-color: #45a049;
        }

        .logout-btn {
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .logout-btn:hover {
            background-color: #d32f2f;
        }
        .home-button {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
        }

        .home-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="profile-page">
    <h2>Редактирование профиля</h2>

    <!-- Аватар с предварительным просмотром -->
    <div class="avatar-preview"></div>
    
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        </div>
        
        <!-- Отображение баллов пользователя -->
        <p>Баллы: <?php echo htmlspecialchars($user['points']); ?></p>

        <div class="form-group">
            <label for="avatar">Avatar</label>
            <input type="file" id="avatar" name="avatar" accept="image/*">
        </div>

        <button type="submit" class="submit-btn">Сохранить</button>
    </form>

    <!-- Кнопка выхода из профиля -->
    <form action="logout.php" method="POST">
        <button type="submit" class="logout-btn">Выйти</button>
    </form><br>
    <a href="protected_page.php" class="home-button">Главная</a>
</div>

</body>
</html>
