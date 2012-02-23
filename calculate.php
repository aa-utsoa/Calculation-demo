<!-- 
Can use short tags (<? ?>) - might not be as portable.Check on php.info.

PHP is dynamically interpreted, so you don't have to specify type beforehand.

Not whitespace dependent. 

$_POST is an array with keys and values (key value stores) — can hold anything, but stick to strings and integers

string literal: single or double quotes; but must escape when you actually want punctuation
For loops:  i++ (i plus one) i+=2 (i plus 2)
While loops: 
 -->
<?php
	$num1 = $_POST['num1'];
	$num2 = $_POST['num2'];
	$name = $_POST['myName'];
	
	$error ='';
	
	if(!is_numeric($num1)) {
		$error .= "Number 1 should be a number.<br/>";
	}	
	
	if(!is_numeric($num2)) {
		$error .= "Number 2 should be a number.<br/>";
	}	
	
	if($name == ''|| $name == null) {
		$error .="Name should not be blank.";
	} 
	
	function sum($number1, $number2){
	   return $number1 + $number2;
	}
	
	$sum = sum($num1, $num2);
	
	$db = mysql_connect('localhost', 'root', 'root') or die(mysql_error());  
	mysql_select_db ('Girldev', $db); //string $database_name [, resource $link_identifier ] )
	mysql_query("INSERT into sumResults(sum, name) VALUES ($sum, \"$name\");", $db) or die(mysql_error());
	
?>

<html>
	<head>
		<title>My Result</title>
	</head>
	<body>
		<? if ($error == ''){
			echo "<h1>Your sum is $sum </h1>";
		 } else { 	
			echo "<h1>Error: $error </h1>";
			}
		?>	
			<a href="form.php">Try Again!</a>
	</body>
	
</html>