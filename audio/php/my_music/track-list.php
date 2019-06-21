<?php
  function get_posts($page,$count_per_page) {

    $start = ($page - 1)*$count_per_page;
    $songs = R::findALL('song','ORDER BY id LIMIT :start,:limit',
    array(
      ':start'=>$start,
      ':limit'=>$count_per_page)
    );
    // $songs= R::loadALL('song','ORDER BY id LIMIT ' )


    if(!$songs) {
      exit("<p>В базе данных не обнаружено таблицы проверте настройки</p>");
    }
    return $songs;
  }
?>
