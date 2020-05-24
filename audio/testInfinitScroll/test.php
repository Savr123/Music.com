<?php
  set_include_path('Z:/home/localhost/www/');
  require_once "php/config.php";
?>
<html>
<head>
  <?php include_once('/Music.com/php/head.php'); ?>
  <!-- <script src="js/scriptTrack.js" type="text/javascript"></script> -->
    <meta charset="UTF-8">
    <title>Бесконечный скролл</title>
    <script type="text/javascript" src="http://ajax.googlesapi.com/ajax/libs/jquery/jquery.min.js"></script>
    <style>
        .news {
            padding: 0;
            list-style: none;
        }
        .news li {
            margin-top: 10px;
            padding: 100px 20px;
            background-color: RGB(200, 200, 200);
        }
        .news .new {
            background-color: lightblue;
        }
    </style>
</head>
<body>
<ul class="news">
    <li>Новость 1</li>
    <li>Новость 2</li>
    <li>Новость 3</li>
    <li>Новость 4</li>
    <li>Новость 5</li>
    <li>Новость 6</li>
</ul>
<div class="loading" style="text-align: center; display: none">
    <img src="loading.gif" style="width: 50px">
</div>
<script src="test.js"></script>
</body>
</html>
