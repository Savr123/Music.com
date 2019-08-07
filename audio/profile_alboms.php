<?php
  set_include_path('W:/domains/localhost/');
  require_once "Music.com/Audio/php/config.php";
  include_once('Music.com/audio/php/head.php');
  require_once "W:/domains/localhost/Music.com/audio/php/RedBeansPHP/rb.php";
  set_include_path('W:/domains/localhost/');
  include 'Music.com/audio/track-list.php';
  require_once "Music.com/audio/mp3Class/mp3file.Class.php";
  require "Music.com/getID3-master/getid3/getid3.php";

  $albums=R::findALL('album');
  foreach ($albums as $album) {
    // code...
  }


  $COUNT_PER_PAGE=10;
if($_GET['page']) {
  $page = (int)$_GET['page'];
  if(!$page) {
    $page = 1;
  }
}
else {
  $page = 1;
}
if($_GET['move'] == 1) {
  foreach($albums as $album) {
  }
  exit();
}
?>
<body>
  <div class="row pl-4 pt-2">
    <? foreach($albums as $album) :?>
      <!-- Вывод музыки -->
      <a class="spec-card text-dark" href="/Music.com/Audio/profile.php?url=track&album=<?php echo $album->id ?>&filter=2" >
        <div class="card p-0">
          <img src="<?php echo $album->path_to_img;  ?>" alt="" class="card-img-top" alt="card img alt">
          <div class="card-body p-1">
            <div class="card-text"><?php echo $album->name ?></div>
            <div class="text-muted"><?php echo $album->performers; ?></div>
            <small class="text-muted"><?php echo $album->genre->name ?></small>
          </div>
        </div>
      </a>
    <? endforeach; ?>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 </body>
