<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location: login.html");
    exit();
}

$user = $_SESSION['user'];

include('config.php');

// Pobranie danych użytkowników, pomijając zalogowanego użytkownika
$sql = "SELECT first_name, last_name, profile_picture, age, description FROM users WHERE id != ?";
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
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
    <h1>Tinder-like App</h1>
    <h2>Find your match</h2>
    <a href="register.html">REGISTER</a>
    <a href="login.html">LOGIN</a>
    <h3>Zalogowany użytkownik: <?= htmlspecialchars($_SESSION['user']['first_name']) ?> <?= htmlspecialchars($_SESSION['user']['last_name']) ?></h3>
    <!-- Wyświetlenie zdjęcia zalogowanego użytkownika -->
    <img src="pictures/<?= htmlspecialchars($_SESSION['user']['profile_picture']) ?>" alt="Profile Picture" class="profile-picture">
</header>


<div id="app">
    <?php foreach ($users as $user): ?>     
        <div class="card">
            <img src="pictures/<?= htmlspecialchars($user['profile_picture']) ?>" alt="User Image">
            <h2><?= htmlspecialchars($user['first_name']) ?> <?= htmlspecialchars($user['last_name']) ?></h2>
        </div>
    <?php endforeach; ?>
    <div id="buttons">
        <button id="like-button">Like</button>
        <button id="dislike-button">Dislike</button>
    </div>
</div>



<script src="app.js"></script>
</body>
</html>
