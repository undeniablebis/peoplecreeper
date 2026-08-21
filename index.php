<?php
session_start();

if (isset($_SESSION['id'])){
    header("Location: profile.php");
    exit();
}

require_once "functions/page.php";


page_start("Welcome to PeopleCreeper");

?>

<h1>Welcome to landing page!</h1>

<?php

page_end();