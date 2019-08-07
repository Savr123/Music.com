<?php echo "4" ?>
<?php
  set_include_path('W:/domains/localhost/');
  require_once "Music.com/Audio/php/config.php";
  include_once('Music.com/audio/php/head.php');
  require_once "W:/domains/localhost/Music.com/audio/php/RedBeansPHP/rb.php";
  set_include_path('W:/domains/localhost/');
  include 'Music.com/audio/track-list.php';
  require_once "Music.com/audio/mp3Class/mp3file.Class.php";
  require "Music.com/getID3-master/getid3/getid3.php";

  $playlists=R::findALL('playlist');
  foreach ($playlists as $playlist) {
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
  foreach($playlists as $playlist) {
  }
  exit();
}
?>
<body>
  <script type="text/javascript">
  function openInNewTab(url) {
    var win = window.open(url, '_blank');
    win.focus();
  }
  </script>
  <div class="row pl-4 pt-2">
    <a class="spec-card text-dark" onclick="openInNewTab('http://localhost/music.com/Audio/add_playlist.php')" >
      <div class="card p-0">
        <img src="/Music.com/images/common/playlist-cover_no_cover.png" alt="" class="card-img-top" alt="card img alt">
        <div class="card-body p-1">
          <div class="card-text">Добавить плейлист</div>
        </div>
      </div>
    </a>
    <? foreach($playlists as $playlist) :?>
      <!-- Вывод музыки -->
      <a class="spec-card text-dark" href="/Music.com/Audio/profile.php?url=track&playlist=<?php echo $playlist->id ?>&filter=4" >
        <div class="card p-0">
          <img src="<?php echo $playlist->path_to_img;  ?>" alt="" class="card-img-top" alt="card img alt">
          <div class="card-body p-1">
            <div class="card-text"><?php echo $playlist->name ?></div>
          </div>
        </div>
      </a>
    <? endforeach; ?>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 </body>
