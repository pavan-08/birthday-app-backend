<html>
<head>
	<title>Editor</title>
</head>
<body>
	<?php
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbName="bday";
	$conn = mysqli_connect($servername, $username, $password,$dbName);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
		if($_SERVER["REQUEST_METHOD"]=="POST")
		{
			$srNo = $_POST["srNo"];
			$msg = $_POST["msg"];
			$sql = "UPDATE `response` SET `message`=\"$msg\" WHERE `srNo`=\"$srNo\"";
			if(mysqli_query($conn,$sql)){
				header("location: thanks.html");
			} else{
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}
	?>
	<form method="post">
		<label>no: </label>
		<input type="text" name="srNo"/>
		<br/><label>msg: </label>
		<textarea name="msg" cols="40" rows="5"></textarea>
		<input type="submit" name="submit" value="Submit"/>
	</form>
</body>
</html>