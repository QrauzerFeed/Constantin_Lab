<html>
<head>
	<title>Carti-Mysql-crud-master</title>
</head>
<body>
	<? 
	require_once 'functions.php';
	error_reporting(E_ALL);
	$connection = mysqli_connect('localhost', 'root', '', 'web2');
	
	if(mysqli_connect_errno() !== 0){
		die('Database error');
	}
	$books = mysqli_query($connection, 'SELECT * FROM books');
	
	
	?>
	<?
		if(!empty($_GET['delete'])){
			$queryString = "DELETE FROM books WHERE id = {$_GET['id']}";
			if(mysqli_query($connection, $queryString)) {
				$message = 'Delete success';
			}else{
				$message = 'Delete error';
			}
		}
	?>

	<table border="1">
	<thead>
		<tr>
			<th>Title</th>
			<th>Year</th>
			<th>Pages</th>			
			<th>Author</th>			
		</tr>
	</thead>
	<tbody>
	<?
	foreach ($books as $book) {?>
			<tr>
				<td><?=formatName($book['title']);?></td>
				<td><?=$book['year'];?></td>
				<td><?=$book['pages'];?></td>			
				<td><?=formatName($book['author']);?></td>
				<td>
					<a href="?module=books&action=list&delete=1&id=<?=$book['id'];?>" onclick="return confirm('Delete this record?')">X</a>
					<a href="http://crcars/update.php?module=books&action=update&id=<?=$book['id'];?>">U</a>
				</td>
			</tr>	
	<?}?>
	</tbody>
	</table>
	
	<button style="margin: 50px; width: 100px; height: 50px; background-color: grey border: 0; border-radius: 5px">
		<a href="http://crcars/write_json.php">New Book</a>
	</button>
</body>
</html>