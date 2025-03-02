<?php
// Include database connection
include 'database.php';
session_start();

// Reset messages
$_SESSION['signup_error'] = "";
$_SESSION['signup_success'] = "";
$_SESSION['signin_error'] = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['signup'])) {
        // Handle Signup
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Check if email already exists
        $check_email = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($check_email);

        if ($result->num_rows > 0) {
            $_SESSION['signup_error'] = "This email is already taken!";
        } else {
            $sql = "INSERT INTO users (full_name, email, password) VALUES ('$full_name', '$email', '$password')";

            if ($conn->query($sql) === TRUE) {
                $_SESSION['signup_success'] = "You have successfully signed up!";
            } else {
                $_SESSION['signup_error'] = "Error: " . $conn->error;
            }
        }
    } elseif (isset($_POST['signin'])) {
        // Handle Signin
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                header('Location: home.html');
                exit;
            } else {
                $_SESSION['signin_error'] = "Wrong email or password!";
            }
        } else {
            $_SESSION['signin_error'] = "Wrong email or password!";
        }
    }
}

// Redirect back to signupin.php to show messages
header('Location: index.php');
exit;
?>
