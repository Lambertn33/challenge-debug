<?php

// add random credentials for test (consider environment variables in large projects)
$database_host = 'localhost';
$database_user = 'root';
$database_password = '';
$database_name = 'web';

$username = 'user';
$password = 'user12345';

// initialize $result to avoid variable scope errors
$result = ['status' => false];

if (!($connection = mysqli_connect($database_host, $database_user, $database_password, $database_name))) {
	die(mysqli_connect_error());
}

$query = mysqli_query($connection, "SELECT * FROM users WHERE username='{$username}'");

if ($query->num_rows == 1) {
	$userEntry = mysqli_fetch_array($query);
	if ($userEntry['password'] == md5($password)) {
		$_SESSION['user_id'] = $userEntry['id'];
		$result = ['status' => true];
	}
} else {
	$result = ['status' => false];
}

die(json_encode($result));