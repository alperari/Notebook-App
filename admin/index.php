<?php
$userfilter = "id";
$notefilter = "id";
$orderfilter = "id";
?>

<?php
if(isset($_POST["userid_filter"])){
	$userfilter = $_POST["userid_filter"];
}
if(isset($_POST["usernick_filter"])){
	$userfilter = $_POST["usernick_filter"];
}
if(isset($_POST["userfullname_filter"])){
	$userfilter = $_POST["userfullname_filter"];
}
if(isset($_POST["usermail_filter"])){
	$userfilter = $_POST["usermail_filter"];
}
if(isset($_POST["noteid_filter"])){
	$notefilter = $_POST["noteid_filter"];
}
if(isset($_POST["notetitle_filter"])){
	$notefilter = $_POST["notetitle_filter"];
}
if(isset($_POST["noteprice_filter"])){
	$notefilter = $_POST["noteprice_filter"];
}
if(isset($_POST["notecname_filter"])){
	$notefilter = $_POST["notecname_filter"];
}
if(isset($_POST["orderid_filter"])){
	$orderfilter = $_POST["orderid_filter"];
}
if(isset($_POST["orderprice_filter"])){
	$orderfilter = $_POST["orderprice_filter"];
}
if(isset($_POST["orderdate_filter"])){
	$orderfilter = $_POST["orderdate_filter"];
}
?>

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
  background-color: #1F2739;

}

input[type=submit] {
    width: 8em;  height: 4em;
}

input, select, textarea{
    color: white;
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
	<form method="POST">
	<div style="display: table; margin-right: auto; margin-left: auto" id="filterContainer">
		<button class="btn active" value="id" name="userid_filter" style = 'background-color: #ebe534;'>By id</button>
		<button class = "btn" value ="nick" name = "usernick_filter" style = 'background-color: #ebe534;'>By nickname</button>
		<button class = "btn" value = "fullname" name = "userfullname_filter" style = 'background-color: #ebe534;'>By fullname</button>
		<button class = "btn" value = "email" name ="usermail_filter" style = 'background-color: #ebe534;'>By e-mail</button>
	</div>
	</form>
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
			include "../config.php";
			if($userfilter == "id"){
				$sql_statement = "SELECT * FROM users ORDER BY users.uid";
			}
			if($userfilter == "nick"){
				$sql_statement = "SELECT * FROM users ORDER BY users.nickname";
			}
			if($userfilter == "fullname"){
				$sql_statement = "SELECT * FROM users ORDER BY users.name";
			}
			if($userfilter == "email"){
				$sql_statement = "SELECT * FROM users ORDER BY users.e_mail";
			}
			$result = mysqli_query($db,$sql_statement);
			while($row = mysqli_fetch_assoc($result)){
				$id = $row['uid'];
				$nick = $row['nickname'];
				$pwd = $row['pwd'];
				$name = $row['name'];
				$email = $row['e_mail'];
				echo "<tr>"."<td>".$id."<td>".$nick."<td>".$pwd."<td>".$name."<td>".$email."<td>"."<form action = 'delete_user.php' method = 'POST'>"."<input type = 'hidden' value=".$id." name = 'delete'>"."<button style = 'background-color: #ea061d;'> Delete </button>"."</form>" ."<tr>";
			}
			
			?>
		<tr>
			<form action="add_user.php" method="POST">
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
	<form method="POST">
	<div style="display: table; margin-right: auto; margin-left: auto"  id="filterContainer">
		<button class="btn active" value = "id" name ="noteid_filter" style = 'background-color: #ebe534;'>By id</button>
		<button class = "btn" value = "title" name= "notetitle_filter" style = 'background-color: #ebe534;'>By title</button>
		<button class = "btn" value = "price" name ="noteprice_filter" style = 'background-color: #ebe534;'>By price</button>
		<button class = "btn" value = "course" name = "notecname_filter" style = 'background-color: #ebe534;'>By Course Name</button>
	</div>
	</form>
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
		include "../config.php";
		if($notefilter == "id"){
			$sql_statement = "SELECT * FROM note ORDER BY note.note_id";
		}
		if($notefilter == "title"){
			$sql_statement = "SELECT * FROM note ORDER BY note.title";
		}
		if($notefilter == "price"){
			$sql_statement = "SELECT * FROM note ORDER BY note.price";
		}
		if($notefilter == "course"){
			$sql_statement = "SELECT * FROM note ORDER BY note.course_name";
		}	
		$result = mysqli_query($db,$sql_statement);
		while($row = mysqli_fetch_assoc($result)){
			$id = $row['note_id'];
			$title = $row['title'];
			$desc = $row['description'];
			$price = $row['price'];
			$cname = $row['course_name'];
			echo "<tr>"."<td>".$id."<td>".$title."<td>".$desc."<td>".$price
			."<td>".$cname."<td>"."<form action = 'delete_note.php' method = 'POST'>".
				"<input type = 'hidden' value=".$id." name = 'deletenote'>"."<button style = 'background-color: #ea061d;'> Delete </button>"."</form>" ."<tr>";
		}
		
		?>
		<tr>
			<form action="add_note.php" method="POST">
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
	<form method="POST">
	<div style="display: table; margin-right: auto; margin-left: auto" id="filterContainer">
		<button class="btn active" value ="id" name = "orderid_filter" style = 'background-color: #ebe534;'>By id</button>
		<button class = "btn" value = "price" name = "orderprice_filter" style = 'background-color: #ebe534;'>By Price</button>
		<button class = "btn" value="date" name = "orderdate_filter" style = 'background-color: #ebe534;'>By Date</button>
	</div>
	</form>
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
		include "../config.php";
		if($orderfilter == "id"){
			$sql_statement = "SELECT * FROM orders ORDER BY orders.oid";
		}
		if($orderfilter == "price"){
			$sql_statement = "SELECT * FROM orders ORDER BY orders.price";
		}
		if($orderfilter == "date"){
			$sql_statement = "SELECT * FROM orders ORDER BY orders.date";
		}

			
		$result = mysqli_query($db,$sql_statement);
		while($row = mysqli_fetch_assoc($result)){
		$oid = $row['oid'];
		$price = $row['price'];
		$date = $row['date'];
		echo "<tr>"."<td>".$oid."<td>".$price."<td>".$date."<td>"."<form action = 'delete_order.php' method = 'POST'>".
			"<input type = 'hidden' value=".$oid." name = 'deleteorder'>"."<button style = 'background-color: #ea061d;'> Delete </button>"."</form>" ."<tr>";		
		}
		
		?>
		<tr>
			<form action = "add_order.php" method="POST">
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