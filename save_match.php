<?php
include('config.php');

if (isset($_POST['user1_id']) && isset($_POST['user2_id'])) {
    $user1_id = mysqli_real_escape_string($db, $_POST['user1_id']);
    $user2_id = mysqli_real_escape_string($db, $_POST['user2_id']);

    $sql = "INSERT INTO matches (user1_id, user2_id) VALUES ('$user1_id', '$user2_id')";
    if (mysqli_query($db, $sql)) {
        echo "Dopasowanie zapisane pomyślnie.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
}
?>
