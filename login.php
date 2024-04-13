<?php
session_start();
include('config.php');

if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            header("location: index.php");
        } else {
            echo "Nieprawidłowe hasło!";
        }
    } else {
        echo "Nieprawidłowa nazwa użytkownika!";
    }
}
?>
