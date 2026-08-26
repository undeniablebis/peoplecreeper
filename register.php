<?php
require_once "functions/page.php";
require_once "config/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    //Check if there are empty fields
    if ($first_name === '' || $password === '' || $last_name === '' || $email === '' || $confirm_password === ''){
        echo "Please fill in all fields";
        exit();
    }

    //Check if password do not match
    if ($password !== $confirm_password){
        echo "Passowrds do not match";
        exit();
    }

    //Check if email exists
    $sql = "SELECT id FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows>0){
        echo "Email already exists";
        exit();
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $first_name, $last_name, $email, $password);

    if($stmt->execute()){
        header("Location: index.php");
        exit();
    }else{
        echo "Error: " . $stmt->error;
    }
}
?>

<?php page_start("Register Page"); ?>
<h1>Register Page</h1>
<form action="" method="POST">
    <label>First Name</label>
    <input type="text" name="first_name" id="first_name" placeholder="Enter your first name" required><br>
    <label>Last Name</label>
    <input type="text" name="last_name" id="last_name" placeholder="Enter your last name" required><br>
    <label>Email</label>
    <input type="email" name="email" id="email" placeholder="Enter your email" required><br>
    <label>Password</label>
    <input type="password" name="password" id="password" placeholder="Enter your password" required><br>
    <label>Confirm Password</label>
    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm password" required><br>
    <button type="submit">Create Account</button>
</form>

<?php page_end();