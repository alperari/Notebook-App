<?php
include "config.php";

if(isset($_POST['deleteorder'])){
	$id = $_POST['deleteorder'];
	$sql_statement = "DELETE FROM orders WHERE orders.oid = $id";
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