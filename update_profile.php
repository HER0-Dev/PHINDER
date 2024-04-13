<?php
session_start(); // Upewnij się, że sesja jest zainicjowana
include('config.php');

if (isset($_POST['update_profile'])) {
    // Sprawdź, czy użytkownik jest zalogowany
    if (!isset($_SESSION['user']) || !isset($_SESSION['user']['id'])) {
        // Przekieruj użytkownika do strony logowania lub wyświetl błąd
        header("location: login.html");
        exit();
    }

    $user_id = $_SESSION['user']['id'];
    $description = $_POST['description'];
    $age = $_POST['age'];
    $hobby = $_POST['hobby'];

    // Zaktualizuj profil użytkownika za pomocą zapytania przygotowanego
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
