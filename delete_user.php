<?php
include "config.php";

if(isset($_POST['delete'])){
	$id = $_POST['delete'];
	$sql_statement = "DELETE FROM users WHERE Users.uid = $id";
	$result = mysqli_query($db,$sql_statement);
	if($result != 1){
		echo mysqli_error();
	}
	else{
		header("location: index.php");
		exit();
	}
}
?>