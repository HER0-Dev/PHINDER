<?php
session_start();
include('config.php');

if (isset($_POST['update_profile'])) {

    if (!isset($_SESSION['user']) || !isset($_SESSION['user']['id'])) {

        header("location: login.html");
        exit();
    }

    $user_id = $_SESSION['user']['id'];
    $description = $_POST['description'];
    $age = $_POST['age'];
    $hobby = $_POST['hobby'];

    $stmt = $db->prepare("UPDATE users SET description = ?, age = ?, hobby = ? WHERE id = ?");
    $stmt->bind_param("siss", $description, $age, $hobby, $user_id);

    if ($stmt->execute()) {
        echo "Profil zaktualizowany pomyślnie.";
        header("location: index.php"); 
    } else {
        echo "Błąd: " . $stmt->error;
    }

    $stmt->close();
}
?>
