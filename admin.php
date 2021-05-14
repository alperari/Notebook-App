<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
</head>
<body>
	<div align="center">
		<h2>Welcome to Notebook Admin Page</h2>
		<br>
		
	</div>
<div class="container">
	<p class="lead"> Users</p>
	<table>
		<thead>
			<tr>
				<th>uid</th>
				<th>nickname</th>
				<th>passwordd</th>
				<th>Name</th>
				<th>E-mail</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
				
			<?php

			include "config.php";
			$sql_statement = "SELECT * FROM user";
			$result = mysqli_query($db,$sql_statement);
			while($row = mysqli_fetch_assoc($result)){
				$id = $row['uid'];
				$nick = $row['nickname'];
				$pwd = $row['pwd'];
				$name = $row['name'];
				$email = $row['e_mail'];
				echo "<tr>"."<th>".$id."<th>"."<th>".$nick."<th>"."<th>".$pwd."<th>"."<th>".$name."<th>"."<th>".$email."<th>"."<tr>";				
			}
			?>
		</tbody>
	</table>
</div>
</body>
</html>