<?php
	require "db.php";
?>
<html>
	<head>
		<title>Админка</title>
		<?php
			include_once ("head.php");
		?>
	</head>
	<body>
		<?php
			include_once ("header.php");
		?>
<?php
	$data=$_POST;
	$book_road=$data['book_road'];
	$folder=$data['folder'];
@mkdir('./files/book/'.$folder."/".$book_road, 0700,true);
if (isset ($_FILES['photo']['name']))
{
	$uploads_photo = './files/book/'.$folder."/".$book_road;
    $source_photo=$_FILES['photo']['tmp_name'];
 	$name_photo = $_FILES["photo"]["name"];
 	 move_uploaded_file($source_photo, $uploads_photo."/".$name_photo);
}
if (isset ($_FILES['file']['name']))
{
	$uploads_file ='./files/book/'.$folder."/".$book_road;
    $source_file=$_FILES['file']['tmp_name'];
 	$name_file = $_FILES["file"]["name"];
 	 move_uploaded_file($source_file, $uploads_file."/".$name_file);
}
if( isset($data['do']) ){
				$errors=array();
				if (R::count('book',"book_road=?",array($data['book_road']))>0)
				{
					$errors[]='Файл с таким названием уже существует';
				}
				if(	empty($errors) )
				{
			$book= R::dispense('book');
					$book->img =$data['img'];
					$book->book_road =$data['book_road'];
					$book->folder =$data['folder'];
					$book->id_genre=$data['genre'];
					$book->page=$data['page_number'];
					$book->name =$data['book_name'];
					$book->file =$data['filename'];
					$book->author =$data['author'];
					$book->year =$data['year'];
					$book->izdat =$data['izdat'];
					R::store($book);
					echo '<div style="color:green">запиь внесена</div>';
				}else
				{
					echo '<div style="color:red;">'.array_shift($errors).'</div>';
				}
			}

?>
<form enctype="multipart/form-data" method="post" action="data.php">
	<fieldset>
	  	<legend>Для создания папки необходимо указать предмет книги </legend>
 		<select name="folder">
 			<option value="discrete_math" selected="selected">Дискретная математика</option>
 			<option value="math_analyz">Математический анализ </option>
 			<option value="physics">Физика </option>
 			<option value="computational_methods">Вычислительные методы</option>
 			<option value="computer_networks">Компьютерные сети </option>
 			<option value="optimization_methods">Методы оптимизации</option>
 			<option value="php">Программирование в php</option>
 			<option value="pascal">Программирование в Pascal </option>
 			<option value="c++">Программирование в c++ </option>
		</select>
		<legend>Имя новой папки </legend>
		<input type="text" name="book_road">
	</fieldset>
	<fieldset>
	  	<legend>Укажите картинку </legend>
 		<input type="file" name="photo" />
 		<legend>Название картинки</legend>
 		<input type="text" name="img" >
	</fieldset>
	<fieldset>
 		 <legend>Укажите книгу </legend>
 		 <input type="file" name="file"/>
 		 <legend>Укажите название книги</legend>
 		 <input type="text" name="book_name"/>
 		  <legend>Укажите название файла</legend>
 		 <input type="text" name="filename"/>
	</fieldset>
	<fieldset>
		<legend>К какому предмету относится книга</legend>
		<select name="genre">
 			<option value="1" selected="selected">Дискретная математика</option>
 			<option value="2">Математический анализ </option>
 			<option value="7">Физика </option>
 			<option value="3">Вычислительные методы</option>
 			<option value="8">Компьютерные сети </option>
 			<option value="9">Методы оптимизации</option>
 			<option value="4">Программирование в php</option>
 			<option value="5">Программирование в Pascal </option>
 			<option value="6">Программирование в c++ </option>
		</select>
	</fieldset>
	<fieldset>
		<legend>Укажите количество страниц</legend>
 			<input type="text" name="page_number" >
 	</fieldset>
 	<fieldset>
		<legend>Укажите издательство</legend>
 			<input type="text" name="izdat" >
 	</fieldset>
 	<fieldset>
		<legend>Укажите автора</legend>
 			<input type="text" name="author" >
 	</fieldset>
 	<fieldset>
		<legend>Укажите год издания</legend>
 			<input type="text" name="year" >
 	</fieldset>
      <button name="do"type="submit">Отправить</button>
</form>
</body>
</html>
