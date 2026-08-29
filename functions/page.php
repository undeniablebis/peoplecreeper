<?php

function page_start($page_title){
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/peoplecreeper/css/style.css">
        <title><?= htmlspecialchars($page_title)?></title>
    </head>
    <body>

    <nav class="navbar">
        <a href="index.php">
            <img class="logo" src="/peoplecreeper/images/logo.svg" alt="PeopleCreeper">
        </a>

        <?php if(isset($_SESSION['user_id'])):?>

        <div class="nav-user">
            <span>username</span>
            <a href="/peoplecreeper/logout.php">Logout</a>
        </div>
        <?php else: ?>
            <div class="nav-guest">
                <a href="/peoplecreeper/index.php">Log In</a>
                <a href="/peoplecreeper/register.php">Register</a>
            </div>
        <?php endif; ?>
    </nav>
    <?php
}

function page_end(){
    ?>
    </body>
    </html>
    <?php
}

