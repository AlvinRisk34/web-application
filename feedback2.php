
<?php
$host = 'localhost'; // Обычно localhost
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
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мой Город - Петропавловск</title>
    <link rel="icon" href="https://i.ibb.co.com/Hn43vRD/12.ico" type="image/x-icon">
    <!-- Alternative formats for modern browsers -->
    <link rel="icon" href="https://i.ibb.co.com/Hn43vRD/12.jpg" type="image/jpg">
    <link rel="icon" href="https://i.ibb.co.com/Hn43vRD/12.svg" type="image/svg+xml">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/qrious@4.0.2/dist/qrious.min.js"></script>
    <script src="https://unpkg.com/@zxing/library@latest"></script>

<body>
    <div class="background"></div>



</head>

    <header>
        
        <div id="logo">
            <img src="https://i.ibb.co.com/g6xM6NZ/logo.png" alt="Логотип" />
        </div>
        <h1>Обсуждения</h1>
        <nav>
            <ul>
                <li><a href="protected_page.php" class="link">ГЛАВНАЯ</a></li>
            </ul>
        </nav>
    </header>
</div>
   <section class="article" id="feedback">
    <h2>Отзывы и предложения</h2>

    <!-- Если пользователь авторизован, отображаем форму для отзыва -->
    <?php if (isset($_SESSION['user_id'])): ?>
        <textarea id="feedback-input" placeholder="Ваш отзыв"></textarea>
        <button onclick="submitFeedback()">Отправить</button>
    <?php else: ?>
        <p>Пожалуйста, <a href="login.php">войдите</a>, чтобы оставить отзыв.</p>
    <?php endif; ?>

    <div id="feedback-list">
        <?php
            // Отображаем отзывы при загрузке страницы
            include 'fetch_feedback.php'; // Включаем код для вывода отзывов
        ?>
    </div>
</section>

    

<style>

/* Адаптация под мобильные устройства */
@media (max-width: 768px) {
    .footer {
    background: linear-gradient(135deg, #0b4664, #24476c); /* Цвет фона футера */
    color: white; /* Цвет текста */
    padding: 20px 0;
  
}
#footer-logo{
    max-width: 0%;
    background: linear-gradient(135deg, #3394c5, #24476c);
    margin-left: 0px;
   
}
.weather {
    margin-top: 10px; /* Отступ сверху для блока погоды */
    
}
#temperature{
    color: #ff4e08;
}
h3{
    text-align: left;
    font-family: 'Monsterrat', sans-serif;
    font-size: 24px;
    color: #fff;
    padding: 0px;
    position: relative;

    
}

.footer-container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex; /* Обеспечивает перенос элементов на мобильных устройствах */
}

.footer-info {
    font-size: 10px;
}

.footer-info p {
    margin: 5px 0; /* Отступы между абзацами */
    font-family: 'Montserrat', sans-serif; /* Убедитесь, что шрифт применяется к параграфам */
    font-size: 10px; /* Задайте нужный размер шрифта */
    color: white; /* Цвет текста */
}

.social-icons {
    display: flex; /* Используем flexbox для иконок */
    justify-content: center; /* Центрирование иконок */
    margin: 0px 5px; /* Отступ сверху и снизу для иконок */
   
}

.social-icon {
    margin: 0 5px; /* Отступ между иконками */
    display: inline-block; /* Чтобы иконки выстраивались в ряд */
}

.social-icon img {
    width: 25px; /* Ширина иконок */
    height: 25px; /* Высота иконок */
    transition: transform 0.3s; /* Эффект при наведении */
}

.social-icon:hover img {
    transform: scale(1.1); /* Увеличение иконок при наведении */
}

.footer-qr {
    flex: 0 0 80px; /* Ширина QR-кода */
    margin-left:-10px;
}

.footer-qr img {
    max-width: 100%;
    height: auto;
    margin-left:-15px;
}

</style> 

    <style>
* {
    box-sizing: border-box;
}

body {
    font-family: 'Monsterrat', sans-serif; /* Можно заменить на Google Fonts для других шрифтов */
    margin: 0;
    padding: 0;
    background-color: black;
    background-size: cover; /* Градиентный фон */
    color: #333;
}
.background {
    background-image: url("https://upload.wikimedia.org/wikipedia/commons/thumb/7/7f/%D0%92%D1%8A%D0%B5%D0%B7%D0%B4_%D0%B2_%D0%9F%D0%B5%D1%82%D1%80%D0%BE%D0%BF%D0%B0%D0%B2%D0%BB%D0%BE%D0%B2%D1%81%D0%BA.jpg/1200px-%D0%92%D1%8A%D0%B5%D0%B7%D0%B4_%D0%B2_%D0%9F%D0%B5%D1%82%D1%80%D0%BE%D0%BF%D0%B0%D0%B2%D0%BB%D0%BE%D0%B2%D1%81%D0%BA.jpg"); /* Укажите URL вашего изображения */
    background-size: cover; /* Задает размер изображения на весь экран */
    background-position: center; /* Центрирует изображение */
    filter: blur(8px); /* Применяет размытие к фону */
    position: absolute; /* Позиционируем фон */
    top: 0;
    left: 0;
    right: 0;
    bottom: 0; /* Занимает всю площадь родительского элемента */
    z-index: -1; /* Помещаем фон ниже остальных элементов */
}

header {
     /* Полупрозрачный фон */
    color: #fff;
    text-align: center;
    position: relative; /* Для размещения логотипа */
    font-family: 'Montserrat', sans-serif;
     /* Градиентный фон */
}
header h3 { /* Полупрозрачный фон */
    color: #ffffff;
    font-size: 80px;
    text-align: center;
    font-family: 'Montserrat', sans-serif;
    
}
header h1 { /* Полупрозрачный фон */
    color: #ffffff;
    font-size: 100px;
    text-align: center;
    font-family: 'Montserrat', sans-serif;
    
}
#feedback-input{
    background-color: rgba(255, 255, 255, 0.33);
    color: white;


}


#logo {
    display: inline-block; /* Чтобы логотип располагался рядом с заголовком */
    margin-right: 15px; /* Отступ между логотипом и заголовком */
}

#logo img {
    height: 100px; /* Высота логотипа */
    width: auto; /* Автоматическая ширина для сохранения пропорций */
    display: block; /* Блок для лучшего выравнивания */
    transition: transform 0.3s; /* Плавный переход для эффекта наведения */
}

#logo:hover img {
    transform: scale(1.05); /* Увеличение логотипа при наведении */
}

nav {
    position: absolute; /* Позиционируем навигацию */
    top: 20px; /* Отступ от верхнего края */
    left: 20px; /* Отступ от левого края */
    z-index: 1; /* Убедитесь, что навигация выше фона */
}

nav ul {
    list-style-type: none; /* Убираем маркеры списка */
    padding: 0; /* Убираем отступы */
    margin: 0; /* Убираем маргины */
}

nav li {
    display: inline; /* Отображаем элементы в одну строку */
    margin-right: 10px; /* Отступ между элементами */
}

nav a {
    text-decoration: none; /* Убираем подчеркивание */
    color: white; /* Цвет текста */
    font-size: 18px; /* Размер шрифта */
}


nav a:hover {
    color: #ffd700; /* Цвет текста при наведении */
}

main {
    padding: 20px;
}

section {
    margin: 20px 0;
    margin-top: 150px;
    padding-top: 100px;
    background: linear-gradient(135deg, #2237b370, #0878b8a2);/* Полупрозрачный фон для секций */
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    height: 320px;
}

h2 {
    border-bottom: 2px solid #4ae266;
    padding-bottom: 10px;
    color: #4a90e2; /* Цвет заголовков */
    font-family: 'Montserrat', sans-serif;
}


button {
    padding: 10px 15px;
    background-color: #4caf50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s;
}

button:hover {
    background-color: #45a049;
}

textarea {
    width: 100%;
    height: 100px;
    margin-top: 10px;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-family: inherit;
}


.feedback {
    border: 1px solid #ccc;
    padding: 10px;
    margin: 10px 0;
    background: linear-gradient(135deg, #f4faff9d, #ffffff85);
    font-family: 'Montserrat', sans-serif;
}

.feedback-list {
    margin-top: 10px;
    font-size: 0.9em;
    color: #555;
}


.avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #007bff;
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-right: 10px;
    font-weight: bold;
}

.feedback p {
    margin: 5px 0;
    color: #28a745;
}

.votes {
    margin-left: 0px;
    font-weight: bold;
    color: #007bff;
}

#video {
            width: 600px;
            height: 300px;
            border: 1px solid black;
        }
         #results {
            margin-top: 20px;
        }
        /* Общие стили для мобильных устройств */

@media (max-width: 768px) {
    /* Адаптируем header и навигацию */
    header {
        text-align: center;
        padding: 10px;
    }
    header h1 {
        font-size: 24px;
    }
    nav ul {
        display: flex;
        flex-direction: column;
        padding: 0;
    }
    nav ul li {
        margin: 5px 0;
    }

    /* Стили для слайдера */
   .carousel {
    position: relative;
    width: 100%;
    overflow: hidden;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.slide-caption {
    position: absolute; /* Абсолютное позиционирование для заголовка */
    top: 50%; /* Позиционирование по вертикали */
    left: 50%; /* Позиционирование по горизонтали */
    transform: translate(-50%, -50%); /* Центрирование по обоим осям */
    text-align: center; /* Центрирование текста */
    color: white; /* Цвет текста заголовка */
    width: 90%; /* Ограничиваем ширину текста */
    padding: 10px; /* Отступы для текста */
    box-sizing: border-box; /* Учитываем отступы в ширине */
    overflow: hidden; /* Скрываем текст, выходящий за рамки */
    white-space: nowrap; /* Не переносим текст на новую строку */
    text-overflow: ellipsis; /* Добавляем многоточие для длинного текста */
}

.slide-caption h4 {
        font-size: 18px; /* Уменьшаем заголовок на мобильных устройствах */
    }

    .slide-caption p {
        font-size: 14px; /* Уменьшаем текст на мобильных устройствах */
    }
}
 
    

  

    /* Стиль для секций */
    section.article {
        padding: 10px;
    }
    section.article h2 {
        font-size: 20px;
    }
    #event-list, #notification-list, #directory-list, #feedback-list {
        padding: 5px;
    }
}

    </style>

    <script>
let feedbacks = [
    { text: "Отличная работа!", votes: 0, user: "Иван" },
    { text: "Нужны улучшения в уборке", votes: 0, user: "Мария" }
];

// Функция для добавления отзыва
function submitFeedback() {
    const feedbackInput = document.getElementById('feedback-input');
    const feedbackText = feedbackInput.value.trim();

    if (feedbackText === '') {
        alert('Пожалуйста, введите отзыв.');
        return;
    }

    // Отправляем отзыв с помощью AJAX
    fetch('submit_feedback.php', {
        method: 'POST',
        body: new URLSearchParams({
            'feedback': feedbackText
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Обновляем список отзывов
            const feedbackList = document.getElementById('feedback-list');
            const newFeedback = document.createElement('div');
            newFeedback.classList.add('feedback-item');
            newFeedback.innerHTML = `<strong>${data.username}</strong><p>${feedbackText}</p><small>Just now</small>`;
            feedbackList.prepend(newFeedback);

            // Очищаем поле ввода
            feedbackInput.value = '';
        } else {
            alert(data.error);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

// Функция для загрузки отзывов
function loadFeedback() {
    fetch('fetch_feedback.php')
        .then(response => response.json())
        .then(data => {
            const feedbackList = document.getElementById('feedback-list');
            feedbackList.innerHTML = ''; // Очистить предыдущие отзывы

            data.forEach(item => {
                const feedbackItem = document.createElement('div');
                feedbackItem.innerHTML = `<strong>${item.name}</strong>: ${item.feedback} <em>(${item.created_at})</em>`;
                feedbackList.appendChild(feedbackItem);
            });
        });
}

// Загрузка отзывов при загрузке страницы
window.onload = loadFeedback;


// Функция для отображения отзывов
function displayFeedbacks() {
    const feedbackList = document.getElementById('feedback-list');
    feedbackList.innerHTML = '';

    feedbacks.forEach((feedback, index) => {
        const feedbackDiv = document.createElement('div');
        feedbackDiv.classList.add('feedback');

        feedbackDiv.innerHTML = `
            <div class="avatar">${feedback.user.charAt(0)}</div>
            <p>${feedback.text}</p>
            <p class="votes">Голосов: <span id="votes-${index}">${feedback.votes}</span></p>
            <button onclick="vote(${index})">Голосовать</button>
        `;

        feedbackList.appendChild(feedbackDiv);
    });
}

// Функция для голосования
function vote(index) {
    feedbacks[index].votes++;
    displayFeedbacks();
}

    </script>
</body>
</html>
