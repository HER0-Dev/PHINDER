<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location: login.html");
    exit();
}

$user = $_SESSION['user'];

include('config.php');

$sql = "SELECT first_name, last_name, profile_picture, age, description FROM users WHERE id != ? AND displayed = FALSE LIMIT 1";


$stmt = $db->prepare($sql);
$stmt->bind_param("i", $_SESSION['user']['id']);
$stmt->execute();
$result = $stmt->get_result();
$users = $result->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Tinder-like App</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<header>
    <h1>Tinder-like App</h1>
    <h2>Find your match</h2>
    <a href="register.html">REGISTER</a>
    <a href="login.html">LOGIN</a>
    <h3>Zalogowany użytkownik: <?= htmlspecialchars($_SESSION['user']['first_name']) ?> <?= htmlspecialchars($_SESSION['user']['last_name']) ?></h3>

    <img src="pictures/<?= htmlspecialchars($_SESSION['user']['profile_picture']) ?>" alt="Profile Picture" class="profile-picture">
</header>
<div id="app">
    <?php foreach ($users as $user): ?>     
        <div class="card">
            <img src="pictures/<?= htmlspecialchars($user['profile_picture']) ?>" alt="User Image">
            <h2><?= htmlspecialchars($user['first_name']) ?> <?= htmlspecialchars($user['last_name']) ?></h2>
            <div id="buttons">
                <button class="like-button" data-id="<?= htmlspecialchars($user['id']) ?>">Like</button>
                <button class="dislike-button" data-id="<?= htmlspecialchars($user['id']) ?>">Dislike</button>
            </div>
        </div>
    <?php endforeach; ?>
</div>




<script src="app.js"></script>
</body>
</html>
