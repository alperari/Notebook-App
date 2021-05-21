<?php
include "config.php";

if(isset($_POST['ordersubmit'])){
	$price = $_POST['price'];
	$date = $_POST['date'];
	$sql_statement = "INSERT INTO orders(`oid`,price,`date`)
            VALUES (DEFAULT,'$price','$date')";
	$insert = mysqli_query($db,$sql_statement);
	if($insert != 1){
		echo mysqli_error();
	}
	else{
		header("location: index.php");
		exit();
	}
}
?>