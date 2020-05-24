<?php
  include_once 'W:/domains/localhost/Music.com/audio/php/header.php';
  set_include_path('W:/domains/localhost/');
  include_once('Music.com/audio/php/head.php');
  $filter=1;
?>
<body>
  <!-- <script type="text/javascript">
  function iframeChange() {
    var buttons = document.querySelector(".loadframe"),
        iframe = document.getElementById('frame');

    buttons.addEventListener("click", function (e) {
        iframe.src = e.target.dataset.src;
    });
    }
  window.onload = iframeChange;
  </script> -->
  <script type="text/javascript" src='script/removeDIV.js'></script>

  <div class="wrapper">
    <!-- верхняя часть -->
    <div class="container">
      <div class="row my-2">
        <div class="col-3">
          <!-- img of profile -->
          <img class="img-thumbnail mx-4 rounded-circle border" width="200" height="200" src="<?php
            $uploaddir = '/Music.com/images/';
            $uploadfile = $uploaddir .$_SESSION['logged_user']->name."/".basename($_SESSION['logged_user']['img_path']);
          echo $uploadfile; ?>" alt="Нет картинки">
        </div>
        <div class="col-6 px-0">
          <!-- profle Name -->
          <div class="text-muted">
            Моя музыка
          </div>
          <div class="">
            <h1><?php echo $_SESSION['logged_user']->login; ?></h1>
          </div>
        </div>
        <div class="col-3 row align-items-center">
          <div class="col">
            <a class="btn btn-outline-secondary" onclick="openInNewTab('http://localhost/Music.com/audio/main/settings.php');" href="#">Настройки</a>
          </div>

          <div class="col">
            <a class="btn btn-outline-secondary" onclick="openInNewTab('http://localhost/Music.com/audio/php/upload.php');" href="#">Загрузить</a>
          </div>
        </div>
        <script type="text/javascript">
        function openInNewTab(url) {
          var win = window.open(url, '_blank');
          win.focus();
        }
        </script>
      </div>
    </div>
    <!-- нижняя часть -->
    <div class="mt-5 text-center">
      <div class="border-bottom">
          <div class=" pagination-lg  loadframe">
            <div class="page-item" >
              <a class="page-link spec-page-link text-dark border-0" data-src="Music.com/audio/tracks.php" href="Audio/profile.php?url=track&filter=1" tabindex="-1">Треки</a>
            </div>
            <div class="page-item">
              <a class="page-link spec-page-link text-dark border-0" data-src="audio/php/my_music/albums.php" href="audio/profile.php?url=Album&filter=2">Альбомы</a>
            </div>
            <div class="page-item">
              <a class="page-link spec-page-link text-dark border-0" data-src="audio/php/my_music/artists.php" href="audio/profile.php?url=artist&filter=3">Исполнители</a>
            </div>
            <div class="page-item">
              <a class="page-link spec-page-link text-dark border-0" data-src="audio/php/my_music/playlist.php" href="audio/profile.php?url=Playlist&filter=4">Плейлисты</a>
            </div>
            <div class="page-item">
              <a class="page-link spec-page-link text-dark border-0" data-src="audio/php/my_music/history.php" href="audio/profile.php?url=history&filter=5">История</a>
            </div>
          </div>
      </div>
      <div class="">
        <?php switch ($_GET['url']) {
          case 'track':
            echo "<div on></div>";
            echo "<div class='icluded'";
            include 'Music.com/audio/tracks.php';
            echo "</div>";
            break;
          case 'Album':
            echo "<div on></div>";
            echo "<div class='icluded'";
            include 'Music.com/Audio/profile_alboms.php';
            echo "</div>";
            // code...
            break;
          case 'artist':
            echo "<div on></div>";
            echo "<div class='icluded'";
            include 'Music.com/audio/artists.php';
            echo "</div>";
            // code...
            break;
          case 'Playlist':
            echo "<div on></div>";
            echo "<div class='icluded'";
            include 'Music.com/audio/Playlist.php';
            echo "</div>";
            // code...
            break;
          case 'history':
            echo "<div on></div>";
            echo "<div class='icluded'";
            include 'Music.com/audio/history.php';
            echo "</div>";
            // code...
            break;
        } ?>
      </div>
    <!-- <div class="embed-responsive embed-responsive-16by9">
      <iframe class="embed-responsive-item" src="audio/tracks.php" width="100%" height="" id="frame"></iframe>
    </div>
    <script type="text/javascript">
      $('.loadframe').on('click', function(){
        var src = $(this).data('src');
        $('#frame').attr('src', src);
      });
      // if($(window).height() + $(window).scrollTop() >= $(document).height()){
      //   $('.loadframe').style.overflow='hidden';
      // }
    </script> -->
    </div>
  </div>

</body>
