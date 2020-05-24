<?php
  set_include_path('W:/domains/localhost/');
	require_once "config.php";
	require 'Music.com/getID3-master/getid3/getid3.php';
	require 'Music.com/audio/php/metaMP3.php';
?>
<html>
	<head>
		<title>Upload</title>
		<?php
			include_once('Music.com/audio/php/head.php');
		?>
		<script type="text/javascript">
		setTimeout(function(){
		    $('#s').load(document.location.href);
		}, 3000);
		</script>
	</head>
	<body>
  <div class="container  w-75 border py-3 my-5">
  	<form enctype="multipart/form-data" method="post" action="upload.php">
      <div class="form-group">
        <label for="upload_file[]">Загрузить трек</label>
        <input type="file" class="form-control-file" id="upload_file" name="upload_file[]" multiple accept=".mp3">
      </div>
			<?php
			$data=$_POST;

				if(isset($data['do_upload']) ){
          // upload many files

          // Count # of uploaded files in array
          $total = count($_FILES['upload_file']['name']);

					echo '<pre id="answer">';
          $count=0;
          $count_success=0;
          for($i=0;$i<$total;$i++){

  					$uploaddir = 'W:/domains/localhost/Music.com/audio/music/';
  					$uploadfile = $uploaddir . basename($_FILES['upload_file']['name'][$i]);


            // $trackInfo=get_id3($uploadfile);
            // echo "<pre>";
            // var_dump($trackInfo["id3v2"]["comments"]["title"][0]==NULL   );
            // echo "</pre>";

  					if(!R::find('song',"path = ?",[$uploadfile]) ){
  						if (move_uploaded_file($_FILES['upload_file']['tmp_name'][$i], $uploadfile)) {
  								// echo "Файл корректен и был успешно загружен.\n";
                  $count_success++;

                  $trackInfo=get_id3($uploadfile);
  								$track = new CMP3File;
  								$track->getid3($uploadfile);
                  if($trackInfo["id3v2"]["comments"]["title"][0]==NULL){
                    $track->name=basename($_FILES['upload_file']['name'][$i],'.mp3');
                  }
                  else {
                    $track->name=$trackInfo["id3v2"]["comments"]["title"][0];
                  }
                  $img_common_path="images/common/img_1.jpg";

  								$song= R::dispense('song');
  									$song->path =$uploadfile;               		// путь к файлу трека
                    if($trackInfo["id3v2"]["comments"]["year"][0]==NULL){
                      $song->datacreation=$track->year;
                    }
                    else{
                      $song->datecreation =$trackInfo["id3v2"]["comments"]["year"][0];   // дата выпуска
                    }
                    $song->name=$track->name;            		// название трека
  									$song->description =$track->comment;     // описание трека
  									$song->artist = $trackInfo["id3v2"]["comments"]['artist'][0];              // исполнитель
  									$song->auditions = 0;	// колличество прослушиваний
  									$song->Downloads = 0;	// колличество скачиваний
  									$song->rating = 0; //$data['rating'];							// рейтинг
  									$song->votes = 0;          // колличество проголосовавших
  									$song->link ='';  // $data['cliplink'];          		// ссылка на клип (ютуб)
  									$song->notmusic = 0; // $data ->notmusic;         // булевая переменная, делящая все на 2 категории: музыка  и аудиокниги
  									$song->size = ($_FILES['upload_file']['size'][$i]/1000000)."Mb";									// размер файла
  									$song->genre =$trackInfo["id3v2"]["comments"]["genre"][0];            			// жанр
  									$song->dateupload =date('m/d/Y h:i:s a', time());     	// дата закачивания на сервер
  									$song->album=$trackInfo["id3v2"]["comments"]['album'][0];        		   // альбом
  									$song->img_path =$img_common_path;//$data['img'];                 		// путь к картинке
                    $song->band = $trackInfo["id3v2"]["comments"]['band'][0];                 	// Группа
                    $song->trackNumber = $trackInfo["id3v2"]["comments"]['track_number'][0];                 	// номер трека в альбоме
                    $song->encoded_by = $trackInfo["id3v2"]["comments"]['encoded_by'][0];                 	// Кодирование
                    $song->commercial_information = $trackInfo["id3v2"]["comments"]['commercial_information'][0];                 	// Комерческая информация
                    $song->comment = $trackInfo["id3v2"]["comments"]['comment'][0];                 	// комментарий
                    $song->about_band = $trackInfo["id3v2"]["TPE2"][0]['framenamelong'];                 	// комментарий
                    $song->about_artist = $trackInfo["id3v2"]["TPE1"][0]['framenamelong'];                 	// комментарий
                    $song->language_name = $trackInfo["id3v2"]["COMM"][0]['languagename'];                 	// комментарий
                    $song->lang = $trackInfo["id3v2"]["COMM"][0]['language'];
                    $song->duration = $trackInfo["playtime_string"];                	// комментарий
                    $song->loader=$_SESSION['logged_user']->id;

                    // genre input
                    if($song->genre!=NULL){
                      $genre=R::findOrCreate('genre',[
                        'name' => $song->genre
                      ]);
                    }else {
                      $genre=R::findOrCreate('genre',[
                        'name' => 'нет жанра'
                      ]);
                    }
                    //genre binding
                    //----------------------------------------------------------
                    $song->genre = R::load('genre',$genre->id);
                    // artist input
                    if($song->artist!=NULL){
                      $artist=R::findOrCreate('artist',[
                        'name' => $song->artist
                      ]);
                    }else {
                      $artist=R::findOrCreate('artist',[
                        'name' => 'нет исполнителя'
                      ]);
                    }

                    //----------------------------------------------------------
                    // album input
                    if($song->album!=NULL){
                      $album=R::findOrCreate('album',[
                        'name' => $song->album
                      ]);
                    }else {
                      $album=R::findOrCreate('album',[
                        'name' => 'нет альбома'
                      ]);
                    }


                    if($album->performers==NULL) $album->performers = $song->artist;
                    if($album->path_to_img==NULL) $album->path_to_img = $song->img_path;
                    if($album->genre==NULL) $album->genre=$trackInfo["id3v2"]["comments"]["genre"][0];
                    $album->artist=$artist;
                    $album->genre=$genre;
                    R::store($album);

                    $artist->ownAlbumList[]=$album;
                    $song->album = R::load('album',$album->id);
                    //----------------------------------------------------------
                    //aritst binding
                    $song->artist = R::load('artist',$artist->id);
  								$id=R::store($song);
  								unset($data['do_upload'] );
  						} else {
  								echo "Возможная атака с помощью файловой загрузки!\n";
  						}

  					}else {
  						// echo "этот трек уже есть в базе";
              $count++;
  					}
  				}
          echo $count_success." файлов было загружено\n".$count." файлов уже существует</pre>";
        }
			?>
			<button class="btn border spec-btn-focus" type="submit" name="do_upload"> Загрузить </button>
  	</form>
  </div>
	<script type="text/javascript">
		Array.from(document.getElementsByClassName('spec-btn-focus')).forEach(function(element){
				element.onfocus=element.onmouseover=function(){
					this.classList.add('btn-dark');
				}
				element.onblur=element.onmouseout=function(){
					this.classList.remove('btn-dark');
				}
		})
	</script>
</body>
</html>
