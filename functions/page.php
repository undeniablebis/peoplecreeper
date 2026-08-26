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
    <?php
}

function page_end(){
    ?>
    </body>
    </html>
    <?php
}

