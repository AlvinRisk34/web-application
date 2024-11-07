<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login and Password</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="https://i.ibb.co.com/fxWN84Y/a-city-logo-for-petropavlovsk-the-logo-features-a-n-OZPGVKQNSp-Uk-Usu-GKc-NQ-7o1-Wd5rx-RQOe-Bn5yy-ME.jpg" alt="a-city-logo-for-petropavlovsk-the-logo-features-a-n-OZPGVKQNSp-Uk-Usu-GKc-NQ-7o1-Wd5rx-RQOe-Bn5yy-ME" type="image/x-icon">
</head>
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
<body>
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