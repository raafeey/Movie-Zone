<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Zone - Login/Signup</title>
    <style>
        /* CSS Styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #441012;
            color: #CE851E;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .container {
            width: 90%;
            max-width: 400px;
            padding: 20px;
            background: #2e0c0e;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.4);
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #CE851E;
        }

        .form-toggle {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }

        .form-toggle button {
            background: none;
            border: none;
            font-size: 16px;
            color: #CE851E;
            cursor: pointer;
            padding: 10px;
            transition: color 0.3s;
        }

        .form-toggle button.active {
            color: #FFD700;
            border-bottom: 2px solid #FFD700;
        }

        .form {
            display: none;
            flex-direction: column;
            gap: 10px;
        }

        .form.active {
            display: flex;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #CE851E;
            border-radius: 5px;
            background: #441012;
            color: white;
            outline: none;
        }

        input::placeholder {
            color: #CE851E;
        }

        button[type="submit"] {
            padding: 10px;
            background: #CE851E;
            color: #441012;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }

        button[type="submit"]:hover {
            background: #FFD700;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }

        .success {
            color: green;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>
<body>

<?php
session_start();
$signup_error = $_SESSION['signup_error'] ?? '';
$signup_success = $_SESSION['signup_success'] ?? '';
$signin_error = $_SESSION['signin_error'] ?? '';

// Clear session variables after using
session_unset();
?>

<div class="container">
    <h1>Movie Zone</h1>
    <div class="form-toggle">
        <button id="login-btn" class="active">Sign In</button>
        <button id="signup-btn">Sign Up</button>
    </div>

    <!-- Login Form -->
    <form id="login-form" class="form active" method="POST" action="process_signpin.php">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="signin">Sign In</button>
        <p class="error"><?php echo $signin_error; ?></p>
    </form>

    <!-- Signup Form -->
    <form id="signup-form" class="form" method="POST" action="process_signpin.php">
        <input type="text" name="full_name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="signup">Sign Up</button>
        <p class="error"><?php echo $signup_error; ?></p>
        <p class="success"><?php echo $signup_success; ?></p>
    </form>
</div>

<script>
    const loginBtn = document.getElementById('login-btn');
    const signupBtn = document.getElementById('signup-btn');
    const loginForm = document.getElementById('login-form');
    const signupForm = document.getElementById('signup-form');

    loginBtn.addEventListener('click', () => {
        loginForm.classList.add('active');
        signupForm.classList.remove('active');
        loginBtn.classList.add('active');
        signupBtn.classList.remove('active');
    });

    signupBtn.addEventListener('click', () => {
        signupForm.classList.add('active');
        loginForm.classList.remove('active');
        signupBtn.classList.add('active');
        loginBtn.classList.remove('active');
    });
</script>

</body>
</html>
