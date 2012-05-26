<!DOCTYPE html>
<html>
<head>
	<title>User List</title>
</head>
<body>
	<table>
		<tr><th>Email</th><th>Religion</th><th>Nationality</th><th>Race/Ethnicity</th></tr>
		<?php 
		// only show authenticated users
		foreach($userlist as $user){
			echo "<tr>";
			echo "<td>" . $user['email'] . "</td>";
			echo "<td>" . $user['religion'] . "</td>";
			echo "<td>" . $user['nationality'] . "</td>";
			echo "<td>" . $user['ethnicity'] . "</td>";
			echo "</tr>";
		}

		?>
	</table>
</body>
</html>