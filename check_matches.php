<?php
include('config.php');

if (isset($_POST['user_id'])) {
    $user_id = mysqli_real_escape_string($db, $_POST['user_id']);

    $sql = "SELECT * FROM matches WHERE user1_id = '$user_id' OR user2_id = '$user_id'";
    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            if ($row['user1_id'] == $user_id) {
                $matched_user_id = $row['user2_id'];
            } else {
                $matched_user_id = $row['user1_id'];
            }
            echo "Dopasowanie znalezione dla użytkownika ID: $matched_user_id";
        }
    } else {
        echo "Brak dopasowań.";
    }
}
?>
