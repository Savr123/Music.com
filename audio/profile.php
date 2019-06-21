<?php
  include_once 'W:/domains/localhost/Music.com/Audio/php/header.php';
  set_include_path('W:/domains/localhost/');
  include_once('Music.com/Audio/php/head.php');
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
          <img class="img-thumbnail mx-4 rounded-circle border" width="200" height="200" src="/Music.com/images/common/images.png" alt="">
        </div>
        <div class="col-9 px-0">
          <div class="text-muted">
            Моя музыка
          </div>
          <div class="">
            <h1><?php echo $_SESSION['logged_user']->login; ?></h1>
          </div>
        </div>
      </div>
    </div>
    <!-- нижняя часть -->
    <div class="mt-5 text-center">
      <div class="border-bottom">
          <div class=" pagination-lg  loadframe">
            <div class="page-item" >
              <a class="page-link spec-page-link text-dark border-0" data-src="Music.com/audio/tracks.php" href="/Music.com/Audio/profile.php?url=track" tabindex="-1">Треки</a>
            </div>
            <div class="page-item">
              <a class="page-link spec-page-link text-dark border-0" data-src="/Music.com/Audio/php/my_music/albums.php" href="/Music.com/audio/profile.php?url=Album">Альбомы</a>
            </div>
            <div class="page-item">
              <a class="page-link spec-page-link text-dark border-0" data-src="/Music.com/Audio/php/my_music/artists.php" href="/Music.com/audio/profile.php?url=Artist">Исполнители</a>
            </div>
            <div class="page-item">
              <a class="page-link spec-page-link text-dark border-0" data-src="/Music.com/Audio/php/my_music/playlist.php" href="/Music.com/audio/profile.php?url=Playlist">Плейлисты</a>
            </div>
            <div class="page-item">
              <a class="page-link spec-page-link text-dark border-0" data-src="/Music.com/Audio/php/my_music/history.php" href="/Music.com/audio/profile.php?url=history">История</a>
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
            include 'Music.com/audio/Albums.php';
            echo "</div>";
            // code...
            break;
          case 'Artist':
          echo "<div on></div>";
            echo "<div class='icluded'";
            include 'Music.com/audio/Artist.php';
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
      <iframe class="embed-responsive-item" src="/Music.com/audio/tracks.php" width="100%" height="" id="frame"></iframe>
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
