<?php
  set_include_path('W:/domains/localhost/');
  include_once('Music.com/audio/php/head.php');
?>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <div class="container spec-dropdown-menu-name pb-5">
      <h5><?php echo $_SESSION['logged_user']->login; ?></h1>
    </div>
    <div class="container list-group list-group-flush py-2 ">
      <div class="drop-item"><a href="http://localhost/Music.com/Audio/profile.php" class="text-dark list-group-item list-group-item-action">моя музыка</a></div>
      <div class="drop-item"><a href="http://localhost/Music.com/audio/main/settings.php" class="text-dark list-group-item list-group-item-action">настройка</a></div>
      <div class="drop-item"><a href="audio/php/logout.php" class="text-dark list-group-item list-group-item-action">Выйти</a></div>
    </div>
  </div>
