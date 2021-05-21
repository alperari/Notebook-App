<?php
include "config.php";
if(isset($_POST['submit'])){
	$nickname = $_POST['nickname'];
	$pwd = $_POST['pwd'];
	$name = $_POST['name'];
	$e_mail = $_POST['e_mail'];
	$sql_statement = "INSERT INTO users(uid, nickname, pwd, name, e_mail)
            VALUES (DEFAULT,'$nickname','$pwd','$name', '$e_mail')";
	$insert = mysqli_query($db,$sql_statement);
	if($insert != 1){
		echo mysqli_error();
	}
	else{
		header("location: index.php");
	}
}
?>