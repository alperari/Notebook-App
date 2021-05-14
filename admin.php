<!DOCTYPE html>

<style type="text/css">
	@charset "UTF-8";
@import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

body {
  font-family: 'Open Sans', sans-serif;
  font-weight: 300;
  line-height: 1.42em;
  color:#A7A1AE;
  background-color:#1F2739;
}

h1 {
  font-size:3em; 
  font-weight: 300;
  line-height:1em;
  text-align: center;
  color: #4DC3FA;
}

h2 {
  font-size:1em; 
  font-weight: 300;
  text-align: center;
  display: block;
  line-height:1em;
  padding-bottom: 2em;
  color: #FB667A;
}

h2 a {
  font-weight: 700;
  text-transform: uppercase;
  color: #FB667A;
  text-decoration: none;
}

.blue { color: #185875; }
.yellow { color: #FFF842; }

.container th h1 {
	  font-weight: bold;
	  font-size: 1em;
  text-align: left;
  color: #185875;
}

.container td {
	  font-weight: normal;
	  font-size: 1em;
  -webkit-box-shadow: 0 2px 2px -2px #0E1119;
	   -moz-box-shadow: 0 2px 2px -2px #0E1119;
	        box-shadow: 0 2px 2px -2px #0E1119;
}

.container {
	  text-align: left;
	  overflow: hidden;
	  width: 80%;
	  margin: 0 auto;
  display: table;
  padding: 0 0 8em 0;
}

input[type=text] {
  border: 2px solid red;
  width: 130px;
  border-radius: 5px;
  font-size:16px;
  background-color: #1F2739
  color: #ea0404;

}

input[type=submit] {
    width: 8em;  height: 4em;
}

input, select, textarea{
    //color: #A7A1AE;
}

button {
  
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}

.container td, .container th {
	  padding-bottom: 2%;
	  padding-top: 2%;
  padding-left:2%;  
}
 
.label {
  color: #FB667A;
  padding: 8px;
  font-family: Arial;
}

/* Background-color of the odd rows */
.container tr:nth-child(odd) {
	  background-color: #323C50;
}

/* Background-color of the even rows */
.container tr:nth-child(even) {
	  background-color: #2C3446;
}

.container th {
	  background-color: #1F2739;
}

.container td:first-child { color: #FB667A; }

.container tr:hover {
   background-color: #464A52;
-webkit-box-shadow: 0 6px 6px -6px #0E1119;
	   -moz-box-shadow: 0 6px 6px -6px #0E1119;
	        box-shadow: 0 6px 6px -6px #0E1119;
}

.container td:hover {
  background-color: #FFF842;
  color: #403E10;
  font-weight: bold;
  
  box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
  transform: translate3d(6px, -6px, 0);
  
  transition-delay: 0s;
	  transition-duration: 0.4s;
	  transition-property: all;
  transition-timing-function: line;
}

@media (max-width: 800px) {
.container td:nth-child(6),
.container th:nth-child(6) { display: none; }
}
</style>
<html>
<head>
	<title>main</title>
</head>
<body>
	<h1 style="color: red">Notebook Admin Panel</h1>

<table class="container">
	<h1>Users</h1>
	<thead>
		<tr>
			<th><h1>User id</h1></th>
			<th><h1>Nickname</h1></th>
			<th><h1>Password</h1></th>
			<th><h1>Name</h1></th>
			<th><h1>E-mail</h1></th>
			<th><h1>Actions</h1></th>
		</tr>
	</thead>
	<tbody>
		<?php
			include "config.php";
			$sql_statement = "SELECT * FROM users";
			$result = mysqli_query($db,$sql_statement);
			while($row = mysqli_fetch_assoc($result)){
				$id = $row['uid'];
				$nick = $row['nickname'];
				$pwd = $row['pwd'];
				$name = $row['name'];
				$email = $row['e_mail'];
				echo "<tr>"."<td>".$id."<td>".$nick."<td>".$pwd."<td>".$name."<td>".$email."<td>"."<form action = '' method = 'POST'>"."<input type = 'hidden' value=".$id." name = 'delete'>"."<button style = 'background-color: #ea061d;'> Delete </button>"."</form>" ."<tr>";
			}
			if(isset($_POST['delete'])){
				$id = $_POST['delete'];
				$sql_statement = "DELETE FROM users WHERE Users.uid = $id";
				$result = mysqli_query($db,$sql_statement);
				if($result != 1){
					echo mysqli_error();
				}
				else{
					header("location: admin.php");
					exit();
				}
			}
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
					header("location: admin.php");
					exit();
				}
			}
			?>
		<tr>
			<form method="POST">
			<td><span class="label">Id</span></td>
			<td><input type="text" name="nickname"></td>
			<td><input type="text" name="pwd"></td>
			<td><input type="text" name="name"></td>
			<td><input type="text" name="e_mail"></td>
			<td><input style = 'background-color: #1fee0c;'type="submit" name="submit" value="Add"></td>
			</form>
		</tr>
	</tbody>
</table>
<table class="container">
	<h1>Notes</h1>
	<thead>
		<tr>
			<th><h1>Note id</h1></th>
			<th><h1>Title</h1></th>
			<th><h1>Description</h1></th>
			<th><h1>Price</h1></th>
			<th><h1>Course Name</h1></th>
			<th><h1>Actions</h1></th>
		</tr>
	</thead>
	<tbody>
		<?php
		include "config.php";
		$sql_statement = "SELECT * FROM note";	
		$result = mysqli_query($db,$sql_statement);
		while($row = mysqli_fetch_assoc($result)){
			$id = $row['note_id'];
			$title = $row['title'];
			$desc = $row['description'];
			$price = $row['price'];
			$cname = $row['course_name'];
			echo "<tr>"."<td>".$id."<td>".$title."<td>".$desc."<td>".$price
			."<td>".$cname."<td>"."<form action = '' method = 'POST'>".
				"<input type = 'hidden' value=".$id." name = 'deletenote'>"."<button style = 'background-color: #ea061d;'> Delete </button>"."</form>" ."<tr>";
		}
		if(isset($_POST['deletenote'])){
			$id = $_POST['deletenote'];
			$sql_statement = "DELETE FROM note WHERE note.note_id = $id";
			$result = mysqli_query($db,$sql_statement);
			if($result != 1){
				echo mysqli_error();
			}
			else{
				header("location: admin.php");
				exit();
			}
		}
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
				header("location: admin.php");
				exit();
			}
		}
		?>
		<tr>
			<form method="POST">
			<td><span class="label">Id</span></td>
			<td><input type="text" name="title"></td>
			<td><input type="text" name="desc"></td>
			<td><input type="text" name="price"></td>
			<td><input type="text" name="course_name"></td>
			<td><input style = 'background-color: #1fee0c;'type="submit" name="notesubmit" value="Add"></td>
			</form>
		</tr>
	</tbody>
</table>
<table class = "container">
	<h1>Orders</h1>
	<thead>
		<tr>
			<th><h1>Order id</h1></th>
			<th><h1>Price</h1></th>
			<th><h1>Date</h1></th>
			<th><h1>Actions</h1></th>
		</tr>
	</thead>
	<tbody>
		<?php 
		include "config.php";
		$sql_statement = "SELECT * FROM orders";	
		$result = mysqli_query($db,$sql_statement);
		while($row = mysqli_fetch_assoc($result)){
		$oid = $row['oid'];
		$price = $row['price'];
		$date = $row['date'];
		echo "<tr>"."<td>".$oid."<td>".$price."<td>".$date."<td>"."<form action = '' method = 'POST'>".
			"<input type = 'hidden' value=".$oid." name = 'deleteorder'>"."<button style = 'background-color: #ea061d;'> Delete </button>"."</form>" ."<tr>";		
		}
		if(isset($_POST['deleteorder'])){
			$id = $_POST['deleteorder'];
			$sql_statement = "DELETE FROM orders WHERE orders.oid = $id";
			$result = mysqli_query($db,$sql_statement);
			if($result != 1){
				echo mysqli_error();
			}
			else{
				header("location admin.php");
				exit();
			}
		}	
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
				header("location: admin.php");
				exit();
			}
		}
		?>
		<tr>
			<form method="POST">
			<td><span class="label">Id</span></td>
			<td><input type="text" name="price"></td>
			<td><input type="text" name="date"></td>
			<td><input style = 'background-color: #1fee0c;'type="submit" name="ordersubmit" value="Add"></td>
			</form>
		</tr>
	</tbody>
</table>
</body>
</html>