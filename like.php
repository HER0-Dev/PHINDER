<?php
include('config.php');

try {
    if (!isset($_POST['id'])) {
        throw new Exception('ID użytkownika nie zostało przekazane.');
    }

    $userId = $_POST['id'];
    $currentUserId = $_SESSION['user']['id'];

    echo json_encode(array(
        'success' => true,
        'message' => 'Ocena "Like" została zapisana.',
    ));
} catch (Exception $ex) {
    echo json_encode(array(
        'success' => false,
        'reason' => $ex->getMessage(),
    ));
}
?>
