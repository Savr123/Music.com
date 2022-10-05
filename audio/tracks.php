<?php
  define('__ROOT__', dirname(dirname(__FILE__)));
  require_once(__ROOT__."/audio/php/RedBeansPHP/rb.php");
  set_include_path('../');
  include __ROOT__.'/audio/track-list.php';
  // require_once "Music.comaudio/php/config.php";
  require_once __ROOT__."/audio/mp3Class/mp3file.Class.php";
  require __ROOT__."/getID3-master/getid3/getid3.php";

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

$songs =  get_posts($page,$COUNT_PER_PAGE,$filter);


if($_GET['move'] == 1) {
  foreach($songs as $song) {
    $path="audio/music/".basename($song['path']);
    echo "<li class='list-group-item'>
      <div class='for_text d-flex'>
      <button class='btn btn-active spec-btn-play'>
        <img data-src=\"".$path."\" class='spec-btn-imgCtrl' src='".$song['img_path']."' width='40' height='40 ' alt=''>
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
          <div class=''>".$song["duration"]."\n";
          echo "</div>
        </div>

      </div>
    </li>";
    echo "<script type='text/javascript' src='/Music.com/audio/addliEl.js'></script>";

  }
  exit();
}
?>
<head>
  <?php include_once('Music.com/audio/php/head.php'); ?>
  <script type="text/javascript" src="audio/script/jquery-3.4.1.js"></script>
  <script type="text/javascript" src="audio/script/scriptTrack.js"></script>
  <script type="text/javascript" src="audio/domurl-master/url.min.js"></script>
</head>


<body>

  <div class="text-center " style="position:relative;">

    <audio style="position:fixed; z-index:1000; left:0;bottom:0; width:100%;" controls id="bjs" src="http://online.radiorecord.ru:8102/tm_128" preload="auto"></audio>
    <!-- <div class="">
      <button onClick="document.getElementById('bjs').play()" class="btn btn-active" ><img width=25 height=25 src="open-iconic-master/svg/media-play.svg"></button>
      <button onClick="document.getElementById('bjs').pause()" class="btn btn-active" ><img width=25 height=25 src="open-iconic-master/svg/media-pause.svg"></button>
      <button onClick="document.getElementById('bjs').volume += 0.1" class="btn btn-active" ><img width=25 height=25 src="open-iconic-master/svg/plus.svg"></button>
      <button onClick="document.getElementById('bjs').volume -= 0.1" class="btn btn-active" ><img width=25 height=25 src="open-iconic-master/svg/minus.svg"></button>
    </div> -->


    	<!-- <div class="js--timeline">
    		<a href="#" class="js--timeline-control"></a>
    	</div>
    	<a href="#" class="js--audio-mute">
    		<span class="glyphicon glyphicon-volume-up" data-toggle-class="glyphicon glyphicon-volume-off"></span>
    	</a> -->
  <script type="text/javascript">
    (function($) {
      $(document).ready(function() {
        /**
         * Перемотка трека по клику на timeline
         */
        $('.js--timeline').on('click', function (e) {
          audioTime = $(this).closest('.js--audio-wrap').find('.js--audio-cont');
          duration = audioTime.prop('duration');
          if (duration > 0) {
            offset = $(this).offset();
            left = e.clientX-offset.left;
            width = $(this).width();
            $(this).find('.js--timeline-control').css('left', left+'px');
            audioTime.prop('currentTime', duration*left/width);
          }
          return false;
        });
      });
    });
  </script>

  </div>

  <ul id="posts" class="list-group list-group-flush pb-5">
    <? foreach($songs as $key => $song) :?>
    <!-- Вывод музыки -->
      <li class="list-group-item">
        <div class="for_text d-flex">
          <div class="button-play " style="position:relative">
            <button class="btn btn-active spec-btn-play" >
              <img class="spec-btn-imgCtrl" data-src="<?php echo '/Music.com/audio/music/'.basename($song['path'])?>" src='<?php echo $song['img_path']?>' width='40' height='40 ' alt=''>
            </button>
          </div>
          <div class=" flex-grow-1 bd-highlight">
            <div class="">
              <? if($song['name']!='') printf($song['name']);
              else printf(basename($song['path'],'.mp3'))?>
            </div>

            <div class="">
              <?=$song['artist']['name']?>
            </div>
          </div>

          <div class="pt-3">
            <div class="">
                <?php echo $song["duration"];?>
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
      // console.log(this);
      // console.log(document.querySelector('audio').currentTime);
      // console.log(document.querySelector('audio').paused);
      // console.log(document.querySelector('audio').ended);
      // console.log(this.parentNode);



      var src =$(this).data('src');
      // console.log('src');
      // console.log(src);
      // console.log('bjs');
      // console.log(document.getElementById('bjs').src);
      // console.log('hideAudio');
      // console.log(document.getElementById('bjs').src);

      var tempAudio=document.createElement('audio');
      tempAudio.id="hideAudio";
      document.getElementById('bjs').parentNode.appendChild(tempAudio);
      $('#hideAudio').attr('src', src);

      if(document.getElementById('bjs').src!=document.getElementById('hideAudio').src){
        $('#bjs').attr('src', src);
        console.log('src!=src');
      }
      document.getElementById('hideAudio').parentNode.removeChild(document.getElementById('hideAudio'));

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
