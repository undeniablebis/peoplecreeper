<?php
session_start();
require_once "functions/page.php";
require_once "config/config.php";


if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit();
} 

$user_id = $_SESSION['user_id'];

// Get current user's information
$sql = "
    SELECT first_name, last_name, email
    FROM users
    WHERE id = ?
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

page_start("Profile");

?>
<div class="profile-container">
    <div class="profile-header">
        <img src="..." alt="Profile picture">

        <div>
            <h1>
                <?= htmlspecialchars($user['first_name']) ?>
                <?= htmlspecialchars($user['last_name']) ?>
            </h1>
            <p>This is you</p>

        </div>
        

    </div>

    <div class="profile-content">
        <section class="profile-about">
            <h2>About</h2>
            <p>Bio here</p>
            <p>Email: <?= htmlspecialchars($user['email'])?></p>

        </section>
        <section class="posts">
            <h2>Posts</h2>
            <article class="posts">
                <p>First post</p>
            </article>

            <article class="posts">
                <p>Hello, Peoplecreeper!</p>
            </article>

        </section>
    </div>
    

</div>



<?php page_end();?>