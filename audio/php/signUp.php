<?php require_once 'config.php';

  // $link = mysqli_connect($host, $user, $password, $database)
  //   or die("Ошибка" . mysqli_error($link));

?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">

<?php
  set_include_path(realpath("../../"));
  include_once('audio/php/head.php'); ?>

  <body>
    <script type="text/javascript">
    setTimeout(function(){
        $('#s').load(document.location.href);
    }, 3000);
    </script>
<?php
  $data=$_POST;
  if( isset($data['do_signUp']) ){
    //Нажали кнопку Регистрация


    $errors=array();
    if(trim($data['email']) == ''){
      $errors[]='введите email';
    }
    if(trim($data['login']) == ''){
      $errors[]='введите логин';
    }
    if(trim($data['name']) == ''){
      $errors[]='введите имя';
    }
    if(trim($data['phone']) == ''){
      $errors[]='введите Телефон';
    }
    if($data['password'] == ''){
      $errors[]='введите пароль';
    }
    if($data['password2'] == ''){
      $errors[]='введите пароль повторно';
    }

    if(	$data['password2'] != $data['password']){
      $errors[]='Введеные пароли не совпадают';
    }
    if (R::count('users',"login=?",array($data['login']))>0){
      $errors[]='Такой логин уже существует';
    }
      if (R::count('users',"email=?",array($data['email']))>0){
      $errors[]='Введенный email уже существует';
    }

    if(empty($errors)){
      //code..
      $user = R::dispense('users');
      $user->login = $data['login'];
      $user->email = $data['email'];
      $user->name = $data['name'];
      $user->phone = $data['phone'];
      $uploaddir = 'images/';
      @mkdir($uploaddir.$user->name."/".  $uploaddir, 0700,true);
      $uploadfile = $uploaddir .$user->name."/images.png";
      $user->img_path = $uploadfile;
      if (copy("/images/common/images.png",$uploadfile)){
        $user->img_path = $uploadfile;
      }else {
        echo "Возможная атака с помощью файловой загрузки!\n";
      }
      $user->password = password_hash($data['password'],PASSWORD_DEFAULT);
      $id=R::store($user);

      echo '<div class="alert alert-success">Вы успешно прошли регистрацию</div><hr>';
    }else {
      echo '<div class="alert alert-danger">'.array_shift($errors)."</div>";
    }




    // $result = R::getALL("SELECT * FROM `users` ORDER BY `id`");
    // print_r($result);
    // echo '<div class="alert alert-danger">'.."</div>";
}

if( isset($data['login_link']) ){
  // code...
  unset($data);
  echo '<script type="text/javascript">
  window.location = "audio/php/login.php";
  </script>';
}
?>
    <div class="container w-50 border pb-4 my-5" >
      <h1>Форма Регистрация</h1>
      <form id="mailForm" class="" action="signUp.php" method="POST">
        <input type="email" id ="email" name="email" placeholder="Email" class="form-control" value="<?php echo @$data['email'];?>"><br>
        <input type="text" id ="login" name="login" placeholder="Введите логин" class="form-control" value="<?php echo $data['login'];?>"><br>
        <input type="text" id="name" name="name" placeholder="Введите имя" class="form-control" value="<?php echo $data['name'];?>"><br>
        <input type="tel" pattern="+7[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}" id="phone" name="phone" placeholder="+7 *** *** ** **" class="form-control" value="<?php echo $data['phone'];?>"><br>
        <input type="password" id="password" name="password" placeholder="Введите пароль" class="form-control" value=""><br>
        <input type="password" id="password2" name="password2" placeholder="Введите пароль повторно" class="form-control" value=""><br>

        <button class="btn border spec-btn-focus" name="do_signUp" > Регистрация </button>
        <button class="btn border spec-btn-focus" name="login_link" > Войти </button>
      </form>
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
      <div id="errorMess"></div>
    </div>
  </body>
</html>
<?php
  // mysqli_close($link);
  R::close();
?>
