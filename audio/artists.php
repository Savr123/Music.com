<?php
$artists=R::findALL('artist');
foreach ($artists as $artist) {
  // code...
}


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
if($_GET['move'] == 1) {
foreach($artists as $artist) {
}
exit();
}
?>
  <!-- img of profile -->
  <div class="row pl-4 pt-2">
    <? foreach($artists as $artist) :?>
      <!-- Вывод музыки -->
      <a class="spec-card text-dark" href="Audio/profile.php?url=track&artists=<?php echo $artist->id ?>&filter=3" >
        <div class="card p-0">
          <img class="img-thumbnail rounded-circle border" width="200" height="200" src="<?php
          if(reset( $artist->ownAlbumList)->path_to_img!=NULL) echo reset( $artist->ownAlbumList)->path_to_img;
          else echo 'http://localhost/music.com/images/common/img_8.png';
          ?>" alt="Нет картинки">
          <div class="card-body p-1">
            <div class="card-text"><?php echo $artist->name ?></div>
            <div class="text-muted">Рейтинг <?php echo $artist->rating; ?></div>
            <small class="text-muted"><?php echo reset( $artist->ownAlbumList)->genre->name;?></small>
          </div>
        </div>
      </a>
    <? endforeach; ?>
  </div>
