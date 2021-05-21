<?php
include "config.php";

if(isset($_POST['notesubmit'])){
	$title = $_POST['title'];
	$desc = $_POST['desc'];
	$price = $_POST['price'];
	$cname = $_POST['course_name'];
	$sql_statement = "INSERT INTO note(note_id,title,description,price, course_name)
        VALUES (DEFAULT,'$title','$desc','$price', '$cname')";
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