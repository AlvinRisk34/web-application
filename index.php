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
    <meta name="description" content="Информация О Петропавловске в Казахстане, самая актуальная информация">
    <meta name="keywords" content="Петропавловск, Петропавловск Казахстан, Информация Петропавловск, путеводитель петропавловск ">
    <title>Петропавловск</title>
    <link rel="icon" href="https://i.ibb.co.com/Hn43vRD/12.ico" type="image/x-icon">
    <!-- Alternative formats for modern browsers -->
    <link rel="icon" href="https://i.ibb.co.com/Hn43vRD/12.jpg" type="image/jpg">
    <link rel="icon" href="https://i.ibb.co.com/Hn43vRD/12.svg" type="image/svg+xml">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/qrious@4.0.2/dist/qrious.min.js"></script>
    <script src="https://unpkg.com/@zxing/library@latest"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.9/css/weather-icons.min.css">





</head>
<body>
   
    
    <header>
     
        
       
        <h1>Петропавловск</h1>
      
        <nav>
            <ul>
                <li><a href="events.php" class="link">Афиша</a></li>
                <li><a href="notifications" class="link">Уведомления</a></li>
                <li><a href="directory3.html" class="link">Справочник</a></li>
                <li><a href="feedback2.php" class="link">Обсуждения</a></li>
                <li>
                    <a href="emergency.html" class="link">Экстренная помощь</a>
                    <ul class="dropdown">
                        <li><a href="#" class="link">Список номеров первой помощи</a></li>
                        <li><a href="tel:102" class="link sos-button">SOS</a></li> <!-- Кнопка СОС -->
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="weather">
            <p>Погода: <span id="temperature">--</span>°</p>
            <div class="weather-icon">
                <i class="wi wi-snow"></i> Снег
            </div>
        </div>

        <div class="article" id="auth-panel">
            <a href="vhod.php">
                <button class="login-btn">ВОЙТИ</button>
  
</a>
    
</div>

    </header>
    <div class="carousel">
        <div class="slides">
            <div class="slide">
                <img src="https://pp.userapi.com/c824200/v824200384/712e3/p1VQTuaWTdY.jpg" alt="Изображение 1">
                <div class="slide-caption">
                    <h4>Добро пожаловать в Петропавловск</h4>
                    <p>Здесь вы найдете все что касается нашего города</p>
                </div>
            </div>
            <div class="slide">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7f/%D0%92%D1%8A%D0%B5%D0%B7%D0%B4_%D0%B2_%D0%9F%D0%B5%D1%82%D1%80%D0%BE%D0%BF%D0%B0%D0%B2%D0%BB%D0%BE%D0%B2%D1%81%D0%BA.jpg/1200px-%D0%92%D1%8A%D0%B5%D0%B7%D0%B4_%D0%B2_%D0%9F%D0%B5%D1%82%D1%80%D0%BE%D0%BF%D0%B0%D0%B2%D0%BB%D0%BE%D0%B2%D1%81%D0%BA.jpg" alt="Изображение 2">
                
            </div>
            <div class="slide">
                <img src="https://sputnik.kz/img/07e5/08/09/17813560_0:64:1200:739_1920x0_80_0_0_f7dfce5cc40fae11b006d0a3a46d560b.jpg" alt="Изображение 3">
            </div>
        </div>
        <div class="prev" onclick="plusSlides(-1)">&#10094;</div>
        <div class="next" onclick="plusSlides(1)">&#10095;</div>
    </div>
    <div class="dots">
        <span class="dot" onclick="currentSlide(0)"></span>
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
    </div>

    <script>
        let slideIndex = 0;
        const slides = document.querySelector('.slides');
        const totalSlides = document.querySelectorAll('.slide').length;
        const dots = document.querySelectorAll('.dot');

        function showSlides() {
            if (slideIndex >= totalSlides) {
                slideIndex = 0;
            }
            if (slideIndex < 0) {
                slideIndex = totalSlides - 1;
            }
            slides.style.transform = 'translateX(' + (-slideIndex * 100) + '%)';
            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === slideIndex);
            });
        }

        function plusSlides(n) {
            slideIndex += n;
            showSlides();
        }

        function currentSlide(n) {
            slideIndex = n;
            showSlides();
        }

        setInterval(function() {
            slideIndex++;
            showSlides();
        }, 5000);
    
        showSlides();
</script>

<style>
    .carousel {
        position: relative;
        width: 100%;
        overflow: hidden;
    
      
    }
    .slide-caption {
    position: absolute; /* Абсолютное позиционирование для заголовка */
    top: 50%; /* Позиционирование по вертикали */
    left: 50%; /* Позиционирование по горизонтали */
    transform: translate(-50%, -50%); /* Центрирование по обоим осям */
    text-align: center; /* Центрирование текста */
    color: white; /* Цвет текста заголовка */
}
h1 {
    font-size: 5em; /* Размер шрифта */
    font-weight: bold; /* Полужирный текст */
    color: #ffffff; /* Желтый цвет */
    text-align: center; /* Выравнивание по центру */
    text-transform: uppercase; /* Преобразование в верхний регистр */
    letter-spacing: 5px; /* Межбуквенный интервал */
    margin-top: 30px; /* Отступ сверху */
    margin-bottom: 10px; /* Отступ снизу */
    font-family: 'Montserrat', sans-serif; /* Шрифт */
    transition: color 0.3s ease, transform 0.3s ease; /* Плавный переход для цвета и масштаба */
    cursor: pointer; /* Курсор при наведении */
}

/* Эффект при наведении на заголовок */
h1:hover {
    color: #eaeaea; /* Изменение цвета на оранжевый при наведении */
    transform: scale(1.01); /* Увеличение размера заголовка при наведении */
}

.slide-caption h4 {
    font-size: 80px; /* Размер заголовка */
    margin: 0; /* Убираем отступы */
    background: linear-gradient(90deg, #ff8f49, #ff920c); /* Градиентный фон */
    -webkit-background-clip: text; /* Обрезка фона по тексту */
    -webkit-text-fill-color: transparent;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);

}
.weather {
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
}

.weather-icon {
    display: flex;
    align-items: center;
    color: #0cb5d3; /* Желтый для солнечной погоды */
    font-size: 1.0em;
}

.weather p {
    font-size: 1.5em; /* Размер иконки */
    margin-bottom: 10px;
    transition: transform 0.3s ease;
}
.weather-icon i {
    font-size: 1.5em; /* Размер иконки */
    margin-left: 10px;
    margin-top: 10px;
    transition: transform 0.3s ease;
    display: flex;
    
}

.weather-icon i:hover {
    transform: rotate(20deg);
}

.temperature {
    font-size: 1.5em;
    font-weight: bold;
    color: #fff; /* Белый цвет для температуры */
}

.slide-caption p {
    font-size: 18px; /* Размер подзаголовка */
    margin: 10px 0 0; /* Отступы для подзаголовка */
}

    .slides {
        display: flex;
        transition: transform 0.5s ease-in-out;
    }

    .slide {
        min-width: 100%;
    }

    .slide img {
        width: 100%;
        height: auto;
        max-height: 800px; /* Set a maximum height for the images */
        filter: blur(5px); /* Эффект размытия */
        transition: filter 0.2s ease;
    }

    .prev, .next {
        position: absolute;
        top: 50%;
        padding: 13px;
        color: white;
        font-size: 20px;
        font-weight: bold;
        cursor: pointer;
        user-select: none;
        width: 50px;
        height: 50px;
        transform: translateY(-50%);
        border-radius: 50%;
        transition: background-color 0.3s;
    }

    .prev:hover, .next:hover {
        color: rgb(3, 255, 15);
        
    }

    .prev {
        left: 10px;
    }

    .next {
        right: 10px;
    }

    .dots {
        text-align: center;
        padding: 10px;
    }

    .dot {
        height: 15px;
        width: 15px;
        margin: 0 5px;
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.3s;
    }

    .dot.active, .dot:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }
</style>
    <section class="article" id="map">
        <h2>Смотреть карту города</h2>
        <p>Нажмите на кнопку ниже, чтобы открыть карту Петропавловска:</p>
        <button onclick="window.open('https://www.google.com/maps?q=Петропавловск', '_blank')">Открыть карту</button>
    </section>
    
    
    <section class="article" id="events">
        <h2>Городская афиша</h2>
        <div id="event-list"></div> <!-- Контейнер для карточек событий -->

        <button onclick="loadEvents()">Загрузить события</button>
        <div id="message" style="display: none; color: white; font-size: 20px; margin-top: 10px; font-family: 'Monsterrat', sans-serif;"></div>

        
    </section>
    
        <section class="article" id="qrcode">
            <h2>QR-коды для информации</h2>
            <div id="qrcode-display"></div>
            <input type="text" id="qrcode-input" placeholder="Введите URL или текст">
            <button onclick="generateQRCode()">Сгенерировать QR-код</button>
        </section>
    
    

        
    </main>
    
    
  <footer class ="footer" >
        <div class="footer-container">
            <h3 id="petro"> PETRO</h3>
            <div class="footer-info">
                <p>Телефон: +7 771 464-38-64</p>
                <p>Email: eldar211216@gmail.com</p>
        
               <div class="social-icons">
                    <a href="https://t.me/rabota_petropavlovskz" target="_blank" class="social-icon">
                        <img src="tg.png" alt="Telegram" />
                    </a>
                    <a href="https://www.instagram.com/vpetropavlovske?igsh=a3QzeWVkYXZoanht" target="_blank" class="social-icon">
                        <img src="in.png" alt="Instagram" />
                    </a>
                    <a href="https://chat.whatsapp.com/HLHUOFhf7xG3pVi292To04" target="_blank" class="social-icon">
                        <img src="wa.png" alt="Whatsapp" />
                    </a>
                </div>
            </div>
            <div class="footer-qr">
                <img src="https://i.ibb.co.com/WscTzjY/qr-code.png" alt="QR код сайта" />
            </div>
        </div>
    </footer>

    <script>
       fetch('https://api.openweathermap.org/data/2.5/weather?q=Petropavlovsk&appid=c4b9f233085bc02e9bfb8ef4011b6476&units=metric')
    .then(response => {
        if (!response.ok) {
            throw new Error('Ошибка сети');
        }
        return response.json();
    })
    .then(data => {
        const temperature = data.main.temp;
        document.getElementById('temperature').innerText = temperature;
    })
    .catch(error => {
        console.error('Ошибка получения погоды:', error);
        document.getElementById('temperature').innerText = 'Ошибка';
    });

    </script>

<style>

.footer {
   background: linear-gradient(135deg, #000000, #000b17); /* Цвет фона футера */
    color: white; /* Цвет текста */
    padding: 40px 0;
  
}
#footer-logo{
    max-width: 5%;
    background: linear-gradient(135deg, #3394c5, #24476c);
    margin-left: -50px;
   
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
    font-size: 80px;
    color: #fff;
    padding: 0px;
    position: relative;

    
}

.footer-container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between; /* Разделяет элементы по краям */
    align-items: center; /* Обеспечивает перенос элементов на мобильных устройствах */
}

.footer-info {
    font-size: 20px;
}

.footer-info p {
    margin: 5px 0; /* Отступы между абзацами */
    font-family: 'Montserrat', sans-serif; /* Убедитесь, что шрифт применяется к параграфам */
    font-size: 26px; /* Задайте нужный размер шрифта */
    color: white; /* Цвет текста */
}

.social-icons {
    display: flex; /* Используем flexbox для иконок */
    justify-content: center; /* Центрирование иконок */
    margin: 0px 0; /* Отступ сверху и снизу для иконок */
   
}

.social-icon {
    margin: 0 10px; /* Отступ между иконками */
    display: inline-block; /* Чтобы иконки выстраивались в ряд */
}

.social-icon img {
    width: 40px; /* Ширина иконок */
    height: 40px; /* Высота иконок */
    transition: transform 0.3s; /* Эффект при наведении */
}

.social-icon:hover img {
    transform: scale(1.1); /* Увеличение иконок при наведении */
}

.footer-qr {
    flex: 0 0 300px; /* Ширина QR-кода */
}

.footer-qr img {
    max-width: 100%;
    height: auto;
}

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
    background: linear-gradient(90deg, #290054, #600fa6);/* Градиентный фон */
    color: #333;
}
#events h5{ 
    text-align: left;
    font-family: 'Monsterrat', sans-serif;
    font-size: 24px;
    color: #fff;
    padding: 0px;
    position: relative;

    
}

#events{
    margin: 20px 0;
    padding: 20px;
    background: linear-gradient(135deg, #ffffff50, #a2d2ee3e);/* Полупрозрачный фон для секций */
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}
#event-list {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    justify-content: center;
}

.event-card {
    width: 250px;
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    background-color: #fff;
    text-align: center;
}

.event-card img {
    width: 100%;              /* Изображение по ширине заполняет карточку */
    height: 150px;            /* Фиксированная высота контейнера */
     object-fit: contain;     /* Уменьшает изображение, сохраняя его пропорции */
    object-position: center;  /* Центрирует изображение внутри контейнера */
    background-color: #f0f0f0; /* Фоновый цвет для пустых областей */
    border-radius: 4px;       /* Опционально: скругленные углы */
}


.event-info {
    padding: 10px;
}

.event-info h4 {
    margin: 0;
    font-size: 18px;
    color: #333;
}

.event-info p {
    font-size: 14px;
    color: #666;
    margin: 5px 0;
}


header {
    background: rgba(74, 144, 226, 0.9); /* Полупрозрачный фон */
    color: #fff;
    padding: 20px;
    text-align: center;
    position: relative; /* Для размещения логотипа */
    font-family: 'Montserrat', sans-serif;
    background: linear-gradient(135deg, #170c41, #53096c); /* Градиентный фон */
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

nav ul {
    list-style: none; /* Убираем маркеры списка */
    padding: 0; /* Убираем отступы */
}

nav ul li {
    position: relative; /* Для правильного позиционирования вложенных элементов */
    display: inline; /* Отображаем элементы в строку */
    margin: 0 15px; /* Отступ между элементами */
}

nav a {
    color: #fff; /* Цвет текста */
    text-decoration: none; /* Убираем подчеркивание */
    transition: color 0.3s, font-size 0.3s; /* Плавный переход цвета */
    padding: 10px; /* Отступ для удобства клика */
}

nav a:hover {
    color: #ffd700; /* Цвет текста при наведении */
    font-size: 15px;
}

/* Стили для выпадающего списка */
.dropdown {
    display: none; /* Скрываем выпадающий список по умолчанию */
    position: absolute; /* Позиционируем выпадающий список */
    top: 100%; /* Помещаем ниже родительского элемента */
    left: 0; /* Прикрепляем к левому краю родителя */
    background-color: rgba(0, 0, 0, 0.8); /* Фон выпадающего списка */
    border-radius: 5px; /* Скругляем углы */
    z-index: 100; /* Убедитесь, что он выше других элементов */
}

nav li:hover .dropdown {
    display: block; /* Показываем выпадающий список при наведении */
}

.dropdown li {
    display: block; /* Элементы в выпадающем списке отображаются вертикально */
    margin: 0; /* Убираем маргины */
}

.dropdown a {
    padding: 10px 15px; /* Отступы для ссылок в выпадающем списке */
    color: #fff; /* Цвет текста в выпадающем списке */
}

.dropdown a:hover {
    color: rgb(0, 183, 73); /* Фон при наведении */
}

/* Стили для кнопки СОС */
.sos-button {
    color: rgb(244, 244, 244);
    background-color: red; /* Красный фон для кнопки СОС */
    border-radius: 5px; /* Скругляем углы */
    display: inline-block; /* Делаем ссылку блочным элементом */
    text-align: center; /* Центрируем текст */
    width: 100%; /* Занимает всю ширину */
}

.sos-button:hover {
    color: red;
    background-color: darkred; /* Темно-красный фон при наведении */
}


main {
    padding: 20px;
}

section {
    margin: 20px 0;
    padding: 20px;
    background: linear-gradient(135deg, #ffffff, #a2d2ee);/* Полупрозрачный фон для секций */
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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
button.login-btn {
    padding: 15px 30px;
    font-size: 1.2em;
    color: white;
    background: linear-gradient(135deg, #070155, #2c0152); /* Начальный цвет фона */
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

button.login-btn:hover {
    background-color: #0056b3; /* Цвет фона при наведении */
    transform: scale(1.05); /* Увеличение кнопки при наведении */
}

button.login-btn:focus {
    outline: none; /* Убираем контур при фокусе */
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

#map-container {
            border: 1px solid #ccc;
            border-radius: 8px;
        }

footer {
    text-align: center;
    padding: 20px;
    background: rgba(74, 144, 226, 0.9);
    color: white;
    position: relative;
    bottom: 0;
    width: 100%;
}

.event, .notification, .service, .feedback {
    border: 1px solid #ccc;
    padding: 10px;
    margin: 10px 0;
    background: linear-gradient(135deg, #f4faff, #ffffff);
    font-family: 'Montserrat', sans-serif;
}
.event img {
    width: 300px; /* Фиксированная ширина */
    height: auto; /* Автоматическая высота для сохранения пропорций */
    border-radius: 5px; /* Скругление углов */
    margin-top: 10px; /* Отступ сверху */
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

#emergency {
    text-align: center;
    margin: 20px 0;
}

#emergency button {
    background-color: #dc3545;
    color: white;
    border: none;
    padding: 15px 30px;
    cursor: pointer;
    border-radius: 5px;
    font-size: 18px;
    transition: background-color 0.3s;
    font-family: 'Montserrat', sans-serif;
}

#emergency button:hover {
    background-color: #c82333;
}
#emergency-container {
    display: flex;
    align-items: center;
    gap: 20px;
    font-family: 'Montserrat', sans-serif;
}

#emergency button {
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
}

#emergency-numbers {
    border-left: 2px solid #ccc;
    padding-left: 20px;
}

#emergency-numbers h4 {
    margin-top: 0;
}

#emergency-numbers ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

#emergency-numbers li {
    margin-bottom: 5px;
}


#qrcode {
    text-align: center;
    margin: 20px 0;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #f9f9f9;
}

#qrcode-display {
    margin: 10px 0;
}

#qrcode-input {
    padding: 10px;
    width: 80%;
    max-width: 300px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

#qrcode button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}

#qrcode button:hover {
    background-color: #0056b3;
}

#auth-panel {
    position: right;
    display: inline-block;
    float: none;
    margin-top: -100px, -100px;
}

#auth-menu {
    position: right;
    top: 100%;
    right: 0;
    background-color: white;
    border: 1px solid #ccc;
    padding: 10px;
    z-index: 1000;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

#auth-menu input {
    display: block;
    margin-bottom: 5px;
    padding: 5px;
    width: 100%;
}

#auth-menu button {
    width: 100%;
    padding: 8px;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-bottom: 5px;
    position: right;
}

#auth-menu button:nth-child(1) {
    background-color: #ffffff;
    color: white;
    position: right;
}

#auth-menu button:nth-child(2) {
    background-color: #007bff;
    color: white;
}

#auth-menu button:hover {
    opacity: 0.8;
}
#toggleButton {
    display: block;
    margin: 10px auto;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
}

#toggleButton.hide {
    background-color: red;
    color: white;
    border: none;
}
#search-container {
    display: flex;
    align-items: center;
    padding: 5px;
    width: 100%;
    max-width: 400px; /* Adjust width as needed */
    background: linear-gradient(135deg, #032a69, #13014300);
}

#search-logo {
    width: 30px; /* Adjust the size as needed */
    height: auto; /* Maintain aspect ratio */
    margin-right: 8px; /* Space between logo and input */
}

#search-bar {
    border: none;
    outline: none;
    flex: 1; /* Allow input to expand */
    font-size: 16px;
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

// Функция для добавления события
    // Функция для добавления события


// Функция для загрузки и отображения событий в формате карточек
function loadEvents() {
    
    fetch('load_events.php')
    .then(response => response.json())
    .then(data => {
        const eventList = document.getElementById('event-list');
        eventList.innerHTML = ''; // Очистка текущего списка

        data.forEach(event => {
            const eventCard = document.createElement('div');
            eventCard.className = 'event-card';
            eventCard.innerHTML = `
                ${event.image_path ? `<img src="${event.image_path}" alt="Изображение события">` : ''}
                <div class="event-info">
                    <h4>${event.title}</h4>
                    <p>${event.description}</p>
                    <p>${new Date(event.event_date).toLocaleDateString('ru-RU', { day: '2-digit', month: 'long', year: 'numeric' })}</p>
                </div>
            `;
            eventList.appendChild(eventCard);
        });
    })
    .catch(error => console.error('Ошибка:', error));
    const message = document.getElementById('message');
    
    // Показываем сообщение, что нужно зарегистрироваться
    message.style.display = 'block';
    message.textContent = 'Чтобы добавить свое событие, пожалуйста, зарегистрируйтесь.';
}

// Загрузка событий при открытии страницы
window.onload = loadEvents;




// Функция для оставления отзыва


// Функция для очистки формы
function clearForm() {
    document.getElementById('event-title').value = '';
    document.getElementById('event-date').value = '';
    document.getElementById('event-description').value = '';
    document.getElementById('event-image').value = '';
}

// Загрузка событий (пока просто заглушка)



// Функция для отображения уведомлений
function displayNotifications() {
    const notificationList = document.getElementById('notification-list');
    notificationList.innerHTML = '';

    notifications.forEach(notification => {
        const notificationDiv = document.createElement('div');
        notificationDiv.classList.add('notification');
        
        notificationDiv.innerHTML = `
            <h3>${notification.title}</h3>
            <p>${notification.date}</p>
            <p>${notification.description}</p>
        `;

        notificationList.appendChild(notificationDiv);
    });
}




let feedbacks = [
    { text: "Отличная работа!", votes: 0, user: "Иван" },
    { text: "Нужны улучшения в уборке", votes: 0, user: "Мария" }
];

// Функция для добавления отзыва
function submitFeedback() {
    const feedbackInput = document.getElementById('feedback-input');
    const feedbackText = feedbackInput.value;

    if (feedbackText.trim() === '') {
        alert('Пожалуйста, введите ваш отзыв.');
        return;
    }

    fetch('submit_feedback.php', {
        method: 'POST',
        ers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ feedback: feedbackText })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            feedbackInput.value = ''; // Очистить поле ввода
            loadFeedback(); // Обновить список отзывов
        } else {
            alert('Ошибка: ' + data.message);
        }
    })
    .catch(error => console.error('Ошибка:', error));
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


// Функция для голосования



function callEmergency() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(position => {
            const { latitude, longitude } = position.coords;
            const message = `Экстренный вызов! Мое местоположение: https://www.google.com/maps?q=${latitude},${longitude}`;
            
            // Здесь можно добавить код для отправки сообщения или вызова
            alert(message); // Замените на реальную отправку сообщения
        }, () => {
            alert("Не удалось получить ваше местоположение. Пожалуйста, проверьте настройки геолокации.");
        });
    } else {
        alert("Ваш браузер не поддерживает геолокацию.");
    }
}


function generateQRCode() {
    const input = document.getElementById('qrcode-input').value;
    const qrcodeDisplay = document.getElementById('qrcode-display');
    qrcodeDisplay.innerHTML = ''; // Очистка предыдущего QR-кода

    if (input) {
        const canvas = document.createElement('canvas');
        qrcodeDisplay.appendChild(canvas);

        // Используем встроенный метод для генерации QR-кода
        const qr = new QRious({
            element: canvas,
            value: input,
            size: 128,
            level: 'H' // Уровень коррекции ошибок
        });
    } else {
        alert("Пожалуйста, введите текст или URL.");
    }
}




let services = [
    { name: "Поликлиника №1", phone: "8 (7152) 34-45-67", location: "https://maps.google.com/?q=Поликлиника+№1,+Петропавловск" },
    { name: "Спортивный центр", phone: "8 (7152) 45-67-89", location: "https://maps.google.com/?q=Спортивный+центр,+Петропавловск" },
    { name: "Парковка на ул. Набережной", phone: "8 (7152) 12-34-56", location: "https://maps.google.com/?q=Парковка+на+ул.+Набережной,+Петропавловск" },
    { name: "Пункт сбора мусора", phone: "8 (7152) 98-76-54", location: "https://maps.google.com/?q=Пункт+сбора+мусора,+Петропавловск" }
];

// Функция для отображения справочника услуг
const directoryList = document.getElementById('directory-list');
const toggleButton = document.getElementById('toggleButton');
let servicesVisible = true; // Track if services are visible or hidden


// Function to display the services
function displayDirectory() {
    directoryList.innerHTML = '';

    services.forEach(service => {
        const serviceDiv = document.createElement('div');
        serviceDiv.classList.add('service');
        
        serviceDiv.innerHTML = `
            <h3>${service.name}</h3>
            <p>Телефон: <a href="tel:${service.phone}">${service.phone}</a></p>
            <p><a href="${service.location}" target="_blank">Смотреть на карте</a></p>
        `;
        

        directoryList.appendChild(serviceDiv);
    });
}

// Function to toggle the display of services
function toggleDisplay() {
    servicesVisible = !servicesVisible;
    directoryList.style.display = servicesVisible ? 'block' : 'none';
    toggleButton.innerText = servicesVisible ? 'Скрыть услуги' : 'Показать услуги';
}

// Initial setup
displayDirectory(); // Display services initially

let userPoints = 0; // Начальные очки пользователя

document.addEventListener("DOMContentLoaded", displayFeedbacks);

function toggleAuthMenu() {
    const menu = document.getElementById('auth-menu');
    menu.style.display = menu.style.display === 'none' ? 'block' : 'none';
}

function login() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    fetch('login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `username=${encodeURIComponent(username)}&password=${encodeURIComponent(password)}`
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        if (data.includes("Вход успешен!")) {
            location.reload(); // Перезагрузка страницы
        }
    })
    .catch(error => console.error('Ошибка:', error));
}

function register() {
    const username = document.getElementById('username').value;
    const email = document.getElementById('email').value; // Получаем email
    const password = document.getElementById('password').value;

    fetch('register.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `username=${encodeURIComponent(username)}&email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        if (data.includes("Регистрация успешна!")) {
            login(); // Автоматический вход после успешной регистрации
        }
    })
    .catch(error => console.error('Ошибка:', error));
}






// Загружаем события и уведомления при инициализации
loadEvents();
function searchWords() {
    const query = document.getElementById('search-bar').value.toLowerCase().trim();
    const articles = document.querySelectorAll('.article');
    const results = document.getElementById('results');

    // Очистка предыдущих результатов
    results.innerHTML = '';

    // Слов для поиска
    const words = query.split(/\s+/);

    // Проверка наличия всех слов в каждой статье
    articles.forEach(article => {
        const content = article.innerText.toLowerCase();

        const allWordsFound = words.every(word => content.includes(word));

        // Если все слова найдены, добавляем статью в результаты
        if (allWordsFound) {
            results.appendChild(article.cloneNode(true)); // Добавляем найденную статью в результаты
        }
    });

    // Если результатов нет, выводим сообщение
    if (results.innerHTML === '') {
        results.innerHTML = '<h2>Нет результатов для "' + query + '"</h2>';
    }
}




    </script>
</body>
</html>
