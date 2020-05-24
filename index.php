<?php
  require_once (realpath('audio/php/config.php'));

  set_include_path(realpath("/"));
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include_once realpath('audio/php/head.php') ?>
  </head>
  <body>
    <div class="container-fluid">
      <!--header-------------------------------------------------------------->
      <?php include_once realpath('audio/php/header.php') ?>


  		<!---Main---------------------------------------------------------------->
  		<main>
  			<div class="">
          <div class="p-1 text-center">
            <?php include_once(realpath('/audio/mainPage.php')) ?>
  			  </div>
        </div>
  		</main>
    </div>
</html>
