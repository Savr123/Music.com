<?php
require_once "W:/domains/localhost/Music.com/Audio/php/config.php"; ?>
<header>
  <nav class="navbar navbar-expand-lg spec-navbar mb-5 mr-0 pr-0">
    <a class="navbar-brand" href="/Music.com/main.php"><span class="logo text-dark">MusicPlay</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <form class="form-inline my-2 my-lg-0 mr-auto">
      <input class="form-control mr-sm-2 spec-search" type="text" placeholder="Трек, альбом, исполнитель">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Поиск</button>
    </form>

    <div class="collapse navbar-collapse ml-1" id="navbarColor02">
      <ul class="navbar-nav ml-auto mr-auto">
        <li class="nav-item active">
          <a class="nav-link spec-nav-link spec-nav-link-anim" dats-src="/Music.com/main.php" href="/Music.com/main.php">Главная <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link spec-nav-link spec-nav-link-anim" dats-src="/Music.com/Audio/php/" href="#">Рекомендации</a>
        </li>
        <li class="nav-item">
          <a class="nav-link spec-nav-link spec-nav-link-anim" dats-src="/Music.com/Audio/php/" href="#">Жанры</a>
        </li>
        <li class="nav-item">
          <a class="nav-link spec-nav-link spec-nav-link-anim" dats-src="/Music.com/Audio/php/" href="#">Радио</a>
        </li>
      </ul>
    </div>

    <div class="collapse navbar-collapse" id="spec-nav-personal">
      <?php
      if (isset($_SESSION['logged_user'])) : ?>
        <div class="spec-dropdown-menu">


          <!-- катаог: Моя музыка -->
          <span class="spec-nav-link-anim"><a href="/Music.com/Audio/profile.php" dats-src="/Music.com/Audio/profile.php" id="spec-nav-link-liked" class="nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
              <path fill="none" fill-rule="evenodd" stroke="#222" stroke-width="2" d="M12 19.587c-1.116-1.104-3.173-3.126-3.917-3.87l-.317-.317c-.912-.914-1.69-1.712-2.335-2.393-1.867-1.975-1.894-4.871-.16-6.695 1.668-1.756 4.341-1.748 6 .017l.729.775.729-.775c1.659-1.765 4.331-1.773 6-.017 1.734 1.824 1.707 4.72-.16 6.695-.644.681-1.424 1.478-2.335 2.393l-.316.316c-.738.737-2.8 2.765-3.918 3.871z"/>
            </svg>
            Моя Музыка
          </a></span>
          <!-- профиль -->
          <a  class="spec-nav-link-profile" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-image:url()">
            <img class="img-thumbnail rounded-circle border" width="200" height="200" src="<?php echo '/Music.com/images/'.$_SESSION['logged_user']->name.'/'.basename($_SESSION['logged_user']['img_path']) ?>" alt="Нет картинки">
          </a>
          <?php include_once('W:/domains/localhost/Music.com/Audio/php/personFrame.php') ?>
        </div>
      <?php else : ?>
        <!-- Кнопка: Войти -->
        <button id="login" onclick='location.href="/Music.com/audio/php/login.php"' type="button" name="login" class="btn spec-btn-log">Войти</button>
      <?php endif; ?>
    </div>
  </nav>

  <!---->
</header>
