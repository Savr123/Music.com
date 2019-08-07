<?php
  set_include_path('W:/domains/localhost/');
  include_once('Music.com/audio/php/head.php'); ?>

  <nav class="flexy-nav">
    <button id="flexy-nav__toggle" class="flexy-nav__toggle">Toggle Nav</button>
    <ul id="flexy-nav__items" class="flexy-nav__items">
      <li class="flexy-nav__item">Песни</li>
      <li class="flexy-nav__item"> </li>
    </ul>
    <form action="" class="flexy-nav__form">
      <input class="flexy-nav__search" type="text" placeholder="Type search terms and hit enter...">
    </form>
  </nav>

  <script type="text/javascript">
  (function() {
    var toggle = document.querySelector("#flexy-nav__toggle");
    var nav = document.querySelector("#flexy-nav__items");
    toggle.addEventListener("click", function(e) {
      e.preventDefault();
      nav.classList.contains("flexy-nav__items--visible") ? nav.classList.remove("flexy-nav__items--visible") : nav.classList.add("flexy-nav__items--visible");
    });
  })();
  </script>
