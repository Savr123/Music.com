<?php
require 'Music.com/Audio/php/metaMP3.php';
  function fillBD(){
    $dir="W:/domains/localhost/Music.com/audio/music/";
    $files=scandir($dir);
    foreach ($files as $file) {
      // code...

      $uploadfile = $dir . $file;
      echo $file;
      $link=mysqli_connect("127.0.0.1", "mysql", "mysql", "library");
      move_uploaded_file($_FILES['upload_file']['tmp_name'], $uploadfile);
        $track = new CMP3File;
        $track->getid3($uploadfile);
        // print_r($track);

        $song= R::dispense('song');
          $song->path =$uploadfile;               		// путь к файлу трека
          $song->datecreation =$track->year;   // дата выпуска
          $song->name=$track->name;                 		// название трека
          $song->description =$track->comment;     // описание трека
          $song->artist = $track->artist;              // исполнитель
          $song->auditions = 0;	// колличество прослушиваний
          $song->Downloads = 0;	// колличество скачиваний
          // $song->rating = $data['rating'];							// рейтинг
          // $song->tags = $data['tags'];                 	// теги
          $song->votes = 0;          // колличество проголосовавших
          // $song->link = $data['cliplink'];          		// ссылка на клип (ютуб)
          // $song->notmusic = $data ->notmusic;         // булевая переменная, делящая все на 2 категории: музыка  и аудиокниги
          // $song->nominations = $data ['nominations'];		// номинации
          $song->size = ($_FILES['upload_file']['size']/1000000)."Mb";									// размер файла
          $song->genre =$track->genre;            			// жанр
          $song->dateupload =date('m/d/Y h:i:s a', time());     	// дата закачивания на сервер
          // $song->id_genre=$data['id_genre'];        		// id жанра
          // $song->id_album=$data['id_album'];        		// id альбома
          // $song->id_artist=$data['id_artist'];      		// id исполнителя
          // $song->img =$data['img'];                 		// путь к картинке
          // $song->text = $data['text'];                  // слова песни
          // $song->authorm =$data['authorm'];             // автор музыки
          // $song->authorw =$data['authorw'];             // автор слов
          // $song->duration =$data['duration'];           // длительность трека
        R::store($song);
    }
  }
 ?>
