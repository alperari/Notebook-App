<?php 

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // throw exceptions
$db = mysqli_connect('localhost','root','','notebook_app');
if($db->connect_errno > 0){
	die('Unable to connect database ['. $db->connect_error. ']');
}

?>