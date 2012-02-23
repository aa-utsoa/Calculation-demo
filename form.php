<?
	$db = mysql_connect('localhost', 'root', 'root') or die(mysql_error());  
	mysql_select_db ('Girldev', $db); //string $database_name [, resource $link_identifier ] )	
	$sums = mysql_query('SELECT * FROM sumResults WHERE name IS NOT NULL');
?>
<html>
	<head>
		<title>My PHP Form</title>
	</head>
	
	<body>
	<h1>My Form</h1>
		<form action="calculate.php" method="POST">
			<label>number 1:</label>
			<input type="text" name="num1">
			<label>number 2:</label>
			<input type="text" name="num2">
			<br />
			<label>your name:</label>
			<input type="text" name="myName">

			<input type="submit" value="Submit"/>
		</form>
		<table>
			<tr>
				<th>Time</th>
				<th>Name</th>
				<th>Sum</th>
			</tr>
			<?
				while($row =mysql_fetch_assoc($sums)){
					echo "<tr>
					<td>". $row['time'] ."</td>
					<td>". $row['name'] ."</td>
					<td>". $row['sum'] ."</td>
					</tr>";
				}	
			?>
			</table>
	</body>
</html>	