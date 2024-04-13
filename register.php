<?php
include('config.php');

if (isset($_POST['reg_user'])) {
    $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    if ($password_1 == $password_2) {
        $password = password_hash($password_1, PASSWORD_DEFAULT);
        $profile_picture = $_FILES['profile_picture']['name'];
        $profile_picture_tmp = $_FILES['profile_picture']['tmp_name'];

        move_uploaded_file($profile_picture_tmp, "pictures/$profile_picture");

        $sql = "INSERT INTO users (first_name, last_name, username, email, password, profile_picture) VALUES ('$first_name', '$last_name', '$username', '$email', '$password', '$profile_picture')";
        mysqli_query($db, $sql);
        header("location: profile_config.php"); 
    } else {
        array_push($errors, "Hasła nie pasują do siebie");
    }
}
?>
