<?php
    include ("connection.php");

	$user_id = $_GET['id'];
	$status = $_GET['status'];

	$q= "UPDATE users SET status='$status' WHERE id='$user_id'";

	mysqli_query($con, $q);

	header('Location:users_table.php');
?>