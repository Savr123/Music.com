<?php
  require_once "RedBeansPHP/rb.php";
  R::setup('mysql:host=localhost;dbname=library',
        'root', '');


  $user = 'root'; // имя пользователя
  $host = 'localhost'; // адрес сервера
  $database = 'library'; // имя базы данных
  $password = ''; // пароль

  session_start();

  // mysql_select_db('library') or die('Не удалось выбрать базу данных');
  // $link = mysqli_connect($host,$user,$password,$database);
  //
  // if(!$link) {
  // 	exit('No connection with database');
  // }
  //
  // if(!mysqli_select_db($link,$database)) {
  // 	exit('Wrong database');
  // }
  // mysqli_query($link,"SET NAMES UTF8");
  // try {
  //   # MySQL через PDO_MYSQL
  //   $linkH = new PDO("mysql:host=$host;dbname=$database", $user, $password);
  // }
  // catch(PDOException $e) {
  //     echo $e->getMessage();
  // }
?>
