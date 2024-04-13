<?php
include('config.php');

$sql = "SELECT id, name, image FROM users";
$result = mysqli_query($db, $sql);

$users = array();
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
}

echo json_encode($users);
?>
