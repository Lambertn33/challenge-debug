<?php
// add session to make sure only authenticated users can delete questions
session_start();

// add random credentials for test (consider environment variables in large projects)
$database_host = 'localhost';
$database_user = 'root';
$database_password = '';
$database_name = 'web';

$username = 'user';
$password = 'user12345';

$question_id = $_POST['id'];

if (!($connection = mysqli_connect($database_host, $database_user, $database_password, $database_name))) {
    die(mysqli_connect_error());
}

// if user is authenticated
if (isset($_SESSION['user_id'])) {

    // display iD of auth user
    echo "User ID: " . $_SESSION['user_id'];

    // users only should delete their questions
    if ($question_id == $_SESSION['user_id']) {
        $query = mysqli_query($connection, "DELETE FROM questions WHERE id='{$question_id}' LIMIT 1");

        if (mysqli_affected_rows($connection) > 0) {
            $result = ['status' => true];
        } else {
            $result = ['status' => false];
        }

        die(json_encode($result));
        session_destroy();
    } else {
        die('you can only delete your questions');
    }
} else {
    // if user is not authenticated
    die("not logged in");
}

