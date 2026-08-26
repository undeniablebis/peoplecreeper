<?php
session_start();
require_once "functions/page.php";
require_once "config/config.php";


if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit();
} 

$user_id = $_SESSION['user_id'];

page_start("Profile");

?>

<h1>Profile here</h1>

<a href="logout.php">Logout</a>