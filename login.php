<?php
session_start();

require_once "config/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    //Validation
    if ($email == '' || $password == ''){
        echo "Please enter your email and password";
        eixt();
    }

    $sql = "SELECT id, password FROM users WHERE email = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    //Check if email exists
    if ($result->num_rows === 0){
        echo "Invalid username or password";
        exit();
    }

    // Get user information
    $user = $result->fetch_assoc();

    //Verify password
    if (!password_verify($password, $user['password'])) {
        echo "Invalid username or password";
        exit();
    }

    //Create session
    $_SESSION['user_id'] = $user['id'];

    //Successful login
    header("Location: profile.php");
    exit();
}


?>