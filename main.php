<?php
  require_once 'Audio/php/config.php';

  set_include_path('W:/domains/localhost/');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include_once 'Audio/php/head.php' ?>
  </head>
  <body>
    <div class="container-fluid">
      <!--header-------------------------------------------------------------->
      <?php include_once 'Audio/php/header.php' ?>


  		<!---Main---------------------------------------------------------------->
  		<main>
  			<div class="container container-fluid p-1 m-1">
          <div class="container p-1 text-center">
            <?php include_once('Music.com/Audio/php/mainPage.php') ?>
  			  </div>
        </div>
  		</main>
    </div>
</html>
