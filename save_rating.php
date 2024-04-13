<?php
include('config.php');

if (isset($_POST['user_id']) && isset($_POST['rated_id']) && isset($_POST['lik'])) {
    $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
    $rated_id = mysqli_real_escape_string($db, $_POST['rated_id']);
    $lik = mysqli_real_escape_string($db, $_POST['lik']);

    $sql = "INSERT INTO ratings (rater_id, rated_id, lik) VALUES ('$user_id', '$rated_id', '$lik')";
    if (mysqli_query($db, $sql)) {
        echo "Rating saved successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
}
?>
