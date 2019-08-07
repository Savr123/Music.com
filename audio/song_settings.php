<?php
  set_include_path('W:/domains/localhost/');
  require_once 'Music.com/audio/php/config.php';

  // $link = mysqli_connect($host, $user, $password, $database)
  //   or die("Ошибка" . mysqli_error($link));

?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">

<?php
  set_include_path('W:/domains/localhost/');
  include_once('Music.com/Audio/php/head.php'); ?>

  <body>
    <!-- <script type="text/javascript">
    setTimeout(function(){
        $('#s').load(document.location.href);
    }, 3000);
    </script> -->
<?php



$errors=array();

  $data=$_POST;
  $user = $_SESSION['logged_user'];
  if( isset($data['change_email']) ){
    if (R::count('users',"email=?",array($data['email']))>0){
      $errors[]='Введенный email уже существует';
      echo '<div class="alert alert-danger">'.array_shift($errors)."</div>";
    }
    else if(empty($errors)){
      $user->email=$data['email'];
      R::store($user);
      echo '<div class="alert alert-success">электронный адрес изменен</div><hr>';
    }
  }
  if( isset($data['change_name']) ){
  $user->name = $data['name'];
  R::store($user);
  }
  if( isset($data['change_login']) ){
    if (R::count('users',"login=?",array($data['login']))>0){
      $errors[]='Такой логин уже существует';
      echo '<div class="alert alert-danger">'.array_shift($errors)."</div>";
    }else if(empty($errors)){
      $user->login = $data['login'];
      R::store($user);
      echo '<div class="alert alert-success">логин изменен</div><hr>';
    }
  }
  if( isset($data['change_phone']) ){
  $user->phone = $data['phone'];
  R::store($user);
  }
  if( isset($data['change_password']) ){

    if(	$data['password2'] != $data['password']){
      $errors[]='Введеные пароли не совпадают';
      echo '<div class="alert alert-danger">'.array_shift($errors)."</div>";
    }else {
      $user->password = password_hash($data['password'],PASSWORD_DEFAULT);
      R::store($user);
      echo '<div class="alert alert-success">пароль изменен</div><hr>';
    }
  }
  if( isset($data['change_img_path']) ){
    $uploaddir = 'W:/domains/localhost/Music.com/images/';
    @mkdir($uploaddir.$user->name."/".  $uploaddir, 0700,true);
    $uploadfile = $uploaddir .$user->name."/".basename($_FILES['upload_file']['name']);
    $user->img_path = $uploadfile;
    if (move_uploaded_file($_FILES['upload_file']['tmp_name'], $uploadfile)){
      $user->img_path = $uploadfile;
      R::store($user);
      echo '<div class="alert alert-success">аватар изменен</div><hr>';
    }else {
      echo "Возможная атака с помощью файловой загрузки!\n";
    }
  }


?>
    <div class="container w-50 border pb-4 my-5" >
      <h1>Изменение учетной записи</h1>
      <form id="changeForm" class="" action="#" method="POST" enctype="multipart/form-data">

        <label for="email">электронный адрес</label>
        <input type="email" id ="email" name="email" placeholder="Email" class="form-control" value="<?php echo @$data['email'];?>">
          <button class="mt-1 btn border spec-btn-focus" name="change_email" > изменить </button><br><br>

        <label for="login">логин</label>
        <input type="text" id ="login" name="login" placeholder="Введите логин" class="form-control" value="<?php echo $data['login'];?>">
          <button class="mt-1 btn border spec-btn-focus" name="change_login" > изменить </button><br><br>

        <label for="name">Имя</label>
        <input type="text" id="name" name="name" placeholder="Введите имя" class="form-control" value="<?php echo $data['name'];?>">
          <button class="mt-1 btn border spec-btn-focus" name="change_name" > изменить </button><br><br>

        <label for="phone">Номер телефона</label>
        <input type="tel" pattern="+7[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}" id="phone" name="phone" placeholder="+7 *** *** ** **" class="form-control" value="<?php echo $data['phone'];?>">
          <button class="mt-1 btn border spec-btn-focus" name="change_phone" > изменить </button><br><br>

        <label for="password">пароль</label>
        <input type="password" id="password" name="password" placeholder="Введите пароль" class="form-control" value=""><br>
        <label for="password2">пароль повторно</label>
        <input type="password" id="password2" name="password2" placeholder="Введите пароль повторно" class="form-control" value="">
          <button class="mt-1 btn border spec-btn-focus" name="change_password" > изменить </button><br><br>

        <label for="upload_file">загузить картинку</label>
        <input type="file" class="form-control-file" id="upload_file" name="upload_file" accept=".png, .jpeg, .jpg">
          <button class="mt-1 btn border spec-btn-focus" type="submit" name="change_img_path" > изменить </button><br><br>

        <!-- <button class="btn border spec-btn-focus" name="do_signUp" > Регистрация </button>
        <button class="btn border spec-btn-focus" name="login_link" > Войти </button> -->
      </form>
      <script type="text/javascript">
      var uploadField = document.getElementById("upload_file");

      uploadField.onchange = function() {
          if(this.files[0].size > 307200){
             alert("File is too big!");
             this.value = "";
          };
      };
        Array.from(document.getElementsByClassName('spec-btn-focus')).forEach(function(element){
            element.onfocus=element.onmouseover=function(){
              this.classList.add('btn-dark');
            }
            element.onblur=element.onmouseout=function(){
              this.classList.remove('btn-dark');
            }
        })
      </script>
      <div id="errorMess"></div>
    </div>
  </body>
</html>
