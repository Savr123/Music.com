<?php
  set_include_path('W:/domains/localhost/');
  require_once 'Music.com/audio/php/config.php';
  include_once('Music.com/Audio/php/head.php'); ?>

  <!-- <nav class="flexy-nav">
    <button id="flexy-nav__toggle" class="flexy-nav__toggle">открыть</button>
    <ul id="flexy-nav__items" class="flexy-nav__items">
      <li class="flexy-nav__item"><a href="#" class="flexy-nav__link">Item 1</a></li>
      <li class="flexy-nav__item"><a href="#" class="flexy-nav__link">Item 2</a></li>
      <li class="flexy-nav__item"><a href="#" class="flexy-nav__link">Item 3</a></li>
      <li class="flexy-nav__item"><a href="#" class="flexy-nav__link">Item 4</a></li>
    </ul>
    <form action="" class="flexy-nav__form">
      <input class="flexy-nav__search" type="text" placeholder="Type search terms and hit enter...">
    </form>
  </nav> -->
  <?php include 'Music.com/audio/tracks.php'; ?>



  <!-- <script type="text/javascript">
  (function() {
    var toggle = document.querySelector("#flexy-nav__toggle");
    var nav = document.querySelector("#flexy-nav__items");
    toggle.addEventListener("click", function(e) {
      e.preventDefault();
      nav.classList.contains("flexy-nav__items--visible") ? nav.classList.remove("flexy-nav__items--visible") : nav.classList.add("flexy-nav__items--visible");
    });
  })();
  </script> -->
