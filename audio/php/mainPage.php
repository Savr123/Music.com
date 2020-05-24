<?php include_once('head.php'); ?>
<script type="text/javascript">
function iframeChange() {
  var buttons = document.querySelector(".loadiframe"),
      iframe = document.getElementById('frame');

  buttons.addEventListener("click", function (e) {
      iframe.src = e.target.dataset.src;
  });
  }
window.onload = iframeChange;

</script>
<div class="container conitainer-fluid ml-0">
  <div class="">
    <h1>Главное</h1>
  </div>
  <ul class="pagination pagination-lg  loadiframe">
    <li class="page-item">
      <a class="page-link spec-page-link text-dark" data-src="audio/php/main/all.php" href="#" tabindex="-1">Всё</a>
    </li>
    <li class="page-item">
      <a class="page-link spec-page-link text-dark" data-src="audio/php/main/New_releases.php" href="#">Новые релизы</a>
    </li>
    <li class="page-item">
      <a class="page-link spec-page-link text-dark" data-src="audio/php/main/Chart.php" href="#">Чарт</a>
    </li>
    <li class="page-item">
      <a class="page-link spec-page-link text-dark" data-src="audio/php/main/Not_music.php" href="#">Немузыка</a>
    </li>
    <li class="page-item">
      <a class="page-link spec-page-link text-dark" data-src="audio/php/main/Genre.php" href="#">Настроение и жанры</a>
    </li>
  </ul>
  <div class="embed-responsive embed-responsive-16by9" style="margin:0 10%;">
    <iframe class="embed-responsive-item" src="audio/php/main/all.php" width="100%" height="" id="frame"></iframe>
  </div>
  <script type="text/javascript">
    $('.loadiframe').on('click', function(){
      var src = $(this).data('src');
      $('#frame').attr('src', src);
    });
  </script>
</div>
