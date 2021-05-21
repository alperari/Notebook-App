<?php
include "config.php";

if(isset($_POST['deletenote'])){
	$id = $_POST['deletenote'];
	$sql_statement = "DELETE FROM note WHERE note.note_id = $id";
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