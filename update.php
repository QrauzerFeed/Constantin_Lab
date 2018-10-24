<?php
$connection = mysqli_connect('localhost', 'root', '', 'web2');
$queryString = "
    SELECT
        books.id,
        title, 
        year,
        pages,
        author
    FROM
        books 
";
$books = mysqli_query($connection, $queryString);
foreach ($books as $b) {
	if ($b['id'] === $_GET['id']) {
		$book = $b;
	};
};
if(!empty($_POST['title']) && !empty($_POST['year'])){
    $queryString = "
      UPDATE books 
      SET 
        title = '{$_POST['title']}', 
        year = '{$_POST['year']}', 
        pages = {$_POST['pages']},
        author = {$_POST['author']}
      WHERE id = {$_GET['id']}
        ";
    if(mysqli_query($connection, $queryString)) {
        $message = 'Update success';
    }else{
        $message = 'Update error';
    }
}
?>
<? if(empty($message)){?>

<form action="" method="post">
    <table border="1">
        <tr>
            <td>Title</td>
            <td><input type="text" name="title" value="<?=$book['title'];?>"></td>
        </tr>
        <tr>
            <td>Year</td>
            <td><input type="number" name="year" value="<?=$book['year'];?>"></td>
        </tr>
        <tr>
            <td>Pages</td>
            <td><input type="number" name="pages" value="<?=$book['pages'];?>"></td>
        </tr>
		<tr>
            <td>Author</td>
            <td><input type="text" name="author" value="<?=$book['author'];?>"></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="save">
            </td>
        </tr>
    </table>
</form>
<? }else{?>
    <strong><?=$message;?></strong>
<? }?>