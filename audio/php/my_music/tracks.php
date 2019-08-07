<?php
  set_include_path('W:/domains/localhost/');
  include 'track-list.php';
  require_once "Music.com/php/config.php";
  require_once "Music.com/php/my_music/mp3Class/mp3file.Class.php";

if($_GET['page']) {
  $page = (int)$_GET['page'];
  if(!$page) {
    $page = 1;
  }
}
else {
  $page = 1;
}

$songs =  get_posts($page,$COUNT_PER_PAGE);


if($_GET['move'] == 1) {
  foreach($songs as $song) {

    echo "<li class='list-group-item'>
      <div class='for_text d-flex'>
      <button class='btn btn-active spec-btn-play'>
        <img data-src='".$song['path']."' class='spec-btn-imgCtrl' src='".$song['img_path']."' width='40' height='40 ' alt=''>
      </button>
        <div class='flex-grow-1 bd-highlight'>
          <div class=''>";
            if($song['name']!='') printf($song['name']);
            else printf(basename($song['path'],'.mp3'));
    echo "</div>

          <div class=''>".$song['artist']['name']."
          </div>
        </div>

        <div class='align-center'>
          <div class=''>";
                $mp3file = new MP3File($song['path']);
                $duration = $mp3file->getDuration();
                echo MP3File::formatTime($duration)."\n";
          echo "</div>
        </div>

      </div>
    </li>";
    echo "<script type='text/javascript' src='script/addliEl.js'></script>";

  }
  exit();
}
?>
<head>
  <?php include_once('Music.com/php/head.php'); ?>
  <script type="text/javascript" src="script/jquery-3.4.1.js"></script>
  <script type="text/javascript" src="script/scriptTrack.js"></script>
</head>


<body>
  <audio id="bjs" src="http://online.radiorecord.ru:8102/tm_128" preload="auto"></audio>

  <div class="text-center">

    <button onClick="document.getElementById('bjs').play()" class="btn btn-active" ><img width=25 height=25 src="open-iconic-master/svg/media-play.svg"></button>
    <button onClick="document.getElementById('bjs').pause()" class="btn btn-active" ><img width=25 height=25 src="open-iconic-master/svg/media-pause.svg"></button>
    <button onClick="document.getElementById('bjs').volume += 0.1" class="btn btn-active" ></button>
    <button onClick="document.getElementById('bjs').volume -= 0.1" class="btn btn-active" ></button>

  </div>

  <ul id="posts" class="list-group list-group-flush ">
    <? foreach($songs as $key => $song) :?>
    <!-- Вывод музыки -->
      <li class="list-group-item">
        <div class="for_text d-flex">
          <div class="button-play " style="position:relative">
            <button class="btn btn-active spec-btn-play" >
              <img class="spec-btn-imgCtrl" data-src='<?php echo basename($song['path'],'.mp3')?>' src='<?php echo $song['img_path']?>' width='40' height='40 ' alt=''>
            </button>
          </div>
          <div class=" flex-grow-1 bd-highlight">
            <div class="">
              <? if($song['name']!='') printf($song['name']);
              else printf(basename($song['path'],'.mp3'))?>
            </div>

            <div class="">
              <?=echo $song['artist']['name']?>
            </div>
          </div>

          <div class="pt-3">
            <div class="">
                <?php
                  $mp3file = new MP3File($song['path']);
                  $duration = $mp3file->getDuration();
                  echo MP3File::formatTime($duration)."\n";
                ?>
            </div>
          </div>

        </div>
      </li>
    <? endforeach; ?>
  </ul>

  <script type="text/javascript">
  Array.from(document.getElementsByClassName('spec-btn-imgCtrl')).forEach(function(element){
    element.onfocus=element.onmouseover=function(){
      //code..
    }
    element.onblur=element.onmouseout=function(){
      //code..
    }
    element.onmouseup=function(){
      //code...
    }
    element.onclick = function(){
      console.log(this);
      console.log(document.querySelector('audio').currentTime);
      console.log(document.querySelector('audio').paused);
      console.log(document.querySelector('audio').ended);
      // if(document.querySelector('audio').ended){
        src ='http://localhost/Music.com/audio/music/5ivesta%20Family%20-%20%D0%9F%D1%80%D0%BE%D1%81%D0%B8%D0%BF%D0%B0%D0%B9%D1%81%D1%8F%20%D0%B4%D1%80%D1%83%D0%B3,%20%D0%BF%D0%BE%D1%81%D0%BC%D0%BE%D1%82%D1%80%D0%B8%20%D0%B2%D0%BE%D0%BA%D1%80%D1%83%D0%B3....mp3';
        // console.log(src);
        // $('#bjs').attr('src', src);
      // }

      // var src ='loaclhost/Music.com/audio/music/'+ $(this).data('src')+'.mp3';
      // console.log(src);
      console.log(document.getElementById('bjs').src);
      console.log(src);
      if(document.getElementById('bjs').src!=src){
        $('#bjs').attr('src', src);
        console.log($('bjs'));
      }

      if(document.querySelector('audio').currentTime>0 && !document.querySelector('audio').paused && !document.querySelector('audio').ended){
        document.querySelector('audio').pause();
      }
      else {
        document.querySelector('audio').play();
      }
    }
  })
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 </body>
