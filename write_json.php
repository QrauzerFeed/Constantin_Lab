<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<? 
		// Create connection
	$connect = new mysqli('localhost', 'root', '', 'web2');
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $connect->connect_error);
	}
	if(!empty($_POST['title']) && !empty($_POST['year'])) {
		$sql = "INSERT INTO books (title, year, pages, author)
		VALUES ('".$_POST['title']."', ".$_POST['year'].", ".$_POST['pages'].", '".$_POST['author']."')";

		if ($connect->query($sql) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $connect->error;
		}
	}
	

	$connect->close();
	?>	

	<form method="post">
		Title <input type="text" name="title"><br>
		Year <input type="number" name="year"><br>
		Pages <input type="number" name="pages"><br>
		Author <input type="text" name="author"><br>
		<input type="submit" value="Add"><br>
	</form>

	<button><a href="http://crcars/">Show List</a></button>

</body>
</html>