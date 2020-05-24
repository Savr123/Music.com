<?php
  set_include_path("../");
  require(realpath('audio/php/config.php'));
  // $link = mysqli_connect($host, $user, $password, $database)
  //   or die("Ошибка" . mysqli_error($link));

?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">

<?php
  include_once(realpath('/audio/php/head.php'));
  require_once realpath("/audio/php/RedBeansPHP/rb.php");
  include realpath('/audio/track-list.php');
  // require_once "Music.comaudio/php/config.php";
  require_once realpath("/audio/mp3Class/mp3file.Class.php");
  require realpath("/getID3-master/getid3/getid3.php");

  $COUNT_PER_PAGE=10;
if($_GET['page']) {
  $page = (int)$_GET['page'];
  if(!$page) {
    $page = 1;
  }
}
else {
  $page = 1;
}?>

  <body>
    <script type="text/javascript">
    setTimeout(function(){
        $('#s').load(document.location.href);
    }, 3000);
    </script>
<?php
  function addPlaylist(){
    $data=$_POST;
    $playlist=R::dispense('playlist');
      $playlist->name=$data[''];
      $playlist->path_to_img=$data[''];
  }
  $tracks=R::find('song', "WHERE name=? ORDER BY id", array('%'.$text.'%'));
  function searchTrack($text){
    foreach($tracks as $track) {
      $path="audio/music/".basename($track['path']);
      echo "<li class='list-group-item'>
        <div class='for_text d-flex'>
        <button class='btn btn-active spec-btn-play'>
          <img data-src=\"".$path."\" class='spec-btn-imgCtrl' src='".$track['img_path']."' width='40' height='40 ' alt=''>
        </button>
          <div class='flex-grow-1 bd-highlight'>
            <div class=''>";
              if($track['name']!='') printf($track['name']);
              else printf(basename($track['path'],'.mp3'));
      echo "</div>

            <div class=''>".$track['artist']['name']."
            </div>
          </div>

          <div class='align-center'>
            <div class=''>".$track["duration"]."\n";
            echo "</div>
          </div>

        </div>
      </li>";
      echo "<script type='text/javascript' src='/Music.com/audio/addliEl.js'></script>";
    }
    return $tracks;
  }
 ?>
  <div class="container w-50 border pb-4 my-5" >
     <h1>Добавить плейлист</h1>
     <form id="playlist" class="" action="add_playlist.php" method="POST">
       <input type="text" id ="playList" name="playList" placeholder="Введите название плейлиста" class="form-control" value="<?php echo $data['playList'];?>"><br>
       <input type="text" id ="description" name="description" placeholder="Добавить описание" class="form-control" value="<?php echo $data['description'];?>"><br>

       <label for="upload_file">загузить картинку</label>
       <input type="file" class="form-control-file" id="upload_file" name="upload_file" accept=".png, .jpeg, .jpg"><br>

       <form class="form-inline my-2 my-lg-0 mr-auto">
         <input class="form-control mr-sm-2 spec-search" type="text" name="searchText" placeholder="Трек, альбом, исполнитель"><br>
         <button class="btn border spec-btn-focus" type="submit" name="search" >Поиск</button><br><br>
       </form>
       <ul id="posts" class="list-group list-group-flush pb-5">
         <? foreach($tracks as $track) :?>
         <!-- Вывод музыки -->
           <li class="list-group-item">
             <div class="for_text d-flex">
               <div class="button-play " style="position:relative">
                 <button class="btn btn-active spec-btn-play" >
                   <img class="spec-btn-imgCtrl" data-src="<?php echo '/Music.com/audio/music/'.basename($track['path'])?>" src='<?php echo $track['img_path']?>' width='40' height='40 ' alt=''>
                 </button>
               </div>
               <div class=" flex-grow-1 bd-highlight">
                 <div class="">
                   <? if($track['name']!='') printf($track['name']);
                   else printf(basename($track['path'],'.mp3'))?>
                 </div>

                 <div class="">
                   <?=$track['artist']['name']?>
                 </div>
               </div>

               <div class="pt-3">
                 <div class="">
                     <?php echo $track["duration"];?>
                 </div>
               </div>

             </div>
           </li>
           <? endforeach; ?>
       </ul>

       <button class="btn border spec-btn-focus" name="do_signUp" > создать </button>
     </form>
     <script type="text/javascript">
       Array.from(document.getElementsByClassName('spec-btn-focus')).forEach(function(element){
           element.onfocus=element.onmouseover=function(){
             this.classList.add('btn-dark');
           }
           element.onblur=element.onmouseout=function(){
             this.classList.remove('btn-dark');
           }
       })
     </script>
     <div id="errorMess"></div>
   </div>
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
 </html>
