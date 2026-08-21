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
<div class="container">
    <div class="login">
        <form action="">
            <label for="">email</label><br>
            <input type="email" placeholder="email" required><br>
            <label for="">password</label><br>
            <input type="password" name="" id="" placeholder="password"><br>
            <button>login</button><br><br>
        </form>
        <small>No account yet?</small>
        <button>Register</button>

    </div>

    <div class="about">
        <h1>Welcome to PeopleCreeper</h1>

        <p>
            PeopleCreeper is a social networking project inspired by the early
        days of Facebook and other social platforms.
        </p> 

        <p>
            Create your own profile, connect with friends, discover other people, 
            and build your own network.
        </p>

        <p>
            This project is also a personal exercise in learning and developing a 
            social networking application from the ground up.
        </p>
    </div>
</div>

<?php

page_end();