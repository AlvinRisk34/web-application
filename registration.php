<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="https://i.ibb.co.com/fxWN84Y/a-city-logo-for-petropavlovsk-the-logo-features-a-n-OZPGVKQNSp-Uk-Usu-GKc-NQ-7o1-Wd5rx-RQOe-Bn5yy-ME.jpg" alt="a-city-logo-for-petropavlovsk-the-logo-features-a-n-OZPGVKQNSp-Uk-Usu-GKc-NQ-7o1-Wd5rx-RQOe-Bn5yy-ME" type="image/x-icon">
</head>
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-image: url('https://i.ibb.co.com/bWpsv5s/img-2004-1.jpg ');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-color: #2b2f77;
        color: #fff;
        font-family: 'Poppins', sans-serif;
    }

    .wrapper {
        width: 380px;
        padding: 40px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        text-align: center;
    }

    .wrapper h1 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .input-box {
        margin-top: 20px;
        width: 100%;
    }

    .input-box input {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 25px;
        outline: none;
    }

    .btn {
        margin-top: 20px;
        width: 100%;
        padding: 10px;
        background: #fff;
        color: #333;
        border: none;
        border-radius: 25px;
        cursor: pointer;
    }

    .btn:hover {
        background: #ddd;
    }
</style>
<body>
   <div class="wrapper">
    <form action="register.php" method="POST">
        <h1>Create Account</h1>
        <p>Please fill in the form to create an account.</p>
        <div class="input-box">
            <input type="text" name="username" placeholder="Username" required>
        </div>
        <div class="input-box">
            <input type="email" name="email" placeholder="Email" required>
        </div>
        <div class="input-box">
            <input type="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn">Register</button>
        <p><a href="vhod.php" style="color: #fff; text-decoration: none;">Back to Login</a></p>
    </form>
</div>

</body>
</html>
