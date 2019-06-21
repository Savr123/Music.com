<?


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
  // $trackInfo["id3v2"]["comments"]["genre"][0]
}


class CMP3File {
 var $name;var $artist;var $album;var $year;var $comment;var $genre;
  function getid3 ($file) {
    if (file_exists($file)) {
      $id_start=filesize($file)-129;
      $fp=fopen($file,"rb");
      // printf(fread($fp,3).'</br>');
      // printf(fread($fp,7).'</br>');
      // printf(fread($fp,10).'</br>');
      // printf(fread($fp,157).'</br>');

      fseek($fp,$id_start);
      $tag=fread($fp,3);
       if ($tag == "TAG") {


        $tmp=fread($fp,30);//Name
        $this->name=mb_convert_encoding($tmp, 'utf-8', mb_detect_encoding($tmp));
        $tmp=fread($fp,30);//artist
        $this->artist=mb_convert_encoding($tmp, 'utf-8', mb_detect_encoding($tmp));;
        $tmp=fread($fp,30);//album
        $this->album=mb_convert_encoding($tmp, 'utf-8', mb_detect_encoding($tmp));;
        $tmp=fread($fp,30);//year
        $this->year=mb_convert_encoding($tmp, 'utf-8', mb_detect_encoding($tmp));;
        $tmp=fread($fp,4);//comment
        $this->comment=mb_convert_encoding($tmp, 'utf-8', mb_detect_encoding($tmp));;
        $tmp=fread($fp,28);//NullByte
        $this->NUllByte=iconv(mb_detect_encoding($tmp), 'UTF-8//TRANSLIT', $tmp);//mb_convert_encoding($tmp, 'utf-8', mb_detect_encoding($tmp));;
        $tmp=fread($fp,1);//number
        $this->number=mb_convert_encoding($tmp, 'utf-8', mb_detect_encoding($tmp));;
        $tmp=fread($fp,1);//genre
        $this->genre=mb_convert_encoding($tmp, 'utf-8', mb_detect_encoding($tmp));;
        // $this-> =fread($fp,1)

        // if(fread($fp,4)=='TAG+') printf('asdasdasdasdasd');
        // else printf('nononono');
        fclose($fp);
        return true;
       } else {
        fclose($fp);
        return false;
       }
      } else { return false; }
 }
}
?>
