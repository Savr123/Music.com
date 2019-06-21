<?php
  require_once "Music.com/Audio/php/config.php";
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

  function get_id3($remotefilename){
    if ($fp_remote = fopen($remotefilename, 'rb')) {
        $localtempfilename = tempnam('/tmp', 'getID3');
        if ($fp_local = fopen($localtempfilename, 'wb')) {
            while ($buffer = fread($fp_remote, 8192)) {
                fwrite($fp_local, $buffer);
            }
            fclose($fp_local);
            // Initialize getID3 engine
            $getID3 = new getID3;
            $ThisFileInfo = $getID3->analyze($localtempfilename);
            // Delete temporary file
            unlink($localtempfilename);
        }
        fclose($fp_remote);
    }
    return $ThisFileInfo;
  }

  function rel2abs($rel, $base)
  {
      /* return if already absolute URL */
      if (parse_url($rel, PHP_URL_SCHEME) != '')
          return ($rel);

      /* queries and anchors */
      if ($rel[0] == '#' || $rel[0] == '?')
          return ($base . $rel);

      /* parse base URL and convert to local variables: $scheme, $host, $path, $query, $port, $user, $pass */
      extract(parse_url($base));

      /* remove non-directory element from path */
      $path = preg_replace('#/[^/]*$#', '', $path);

      /* destroy path if relative url points to root */
      if ($rel[0] == '/')
          $path = '';

      /* dirty absolute URL */
      $abs = '';

      /* do we have a user in our URL? */
      if (isset($user)) {
          $abs .= $user;

          /* password too? */
          if (isset($pass))
              $abs .= ':' . $pass;

          $abs .= '@';
      }

      $abs .= $host;

      /* did somebody sneak in a port? */
      if (isset($port))
          $abs .= ':' . $port;

      $abs .= $path . '/' . $rel . (isset($query) ? '?' . $query : '');

      /* replace '//' or '/./' or '/foo/../' with '/' */
      $re = ['#(/\.?/)#', '#/(?!\.\.)[^/]+/\.\./#'];
      for ($n = 1; $n > 0; $abs = preg_replace($re, '/', $abs, -1, $n)) {
      }

      /* absolute URL is ready! */

      return ($scheme . '://' . $abs);
  }
?>
