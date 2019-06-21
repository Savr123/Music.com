<?php require_once 'config.php';

  // $link = mysqli_connect($host, $user, $password, $database)
  //   or die("Ошибка" . mysqli_error($link));

  set_include_path('W:/domains/localhost/');
  include_once('Music.com/Audio/php/head.php');

  $data=$_POST;
  if( isset($data['do_login']) ){
    $user=R::findOne('users', 'login=?',array( $data['login']) );
    if ($user){
      if (password_verify($data['password'],$user->password)){
        $_SESSION['logged_user']=$user;
      echo '<div class="alert alert-success">Вы успешно авторизованы</div>
        <script type="text/javascript">
        window.location = "/Music.com/main.php";
        </script>';
      }
      else  $errors[]='Пользователь не найден';
    }
    else
      $errors[]='Пароль введен не верно';
    if (!empty($errors))
      echo '<div class="alert alert-danger">'.array_shift($errors).'</div>';
  }


  if( isset($data['signUp_link']) ){
    // code...
    unset($data);
    echo '<script type="text/javascript">
    window.location = "/Music.com/Audio/php/signUp.php";
    </script>';
  }
?>
    <div class="container w-50 border pb-5 mt-5" >
      <h1>Форма Авторизации</h1>
      <form class=""  method="POST">
        <input type="text" id ="login" name="login" placeholder="Введите логин" class="form-control" value="<?php echo $data['login'];?>"><br>
        <input type="password" id="password" name="password" placeholder="Введите пароль" class="form-control" value=""><br>

        <button class="btn border spec-btn-focus" formaction="login.php" name="do_login" > Войти </button>
        <button class="btn border spec-btn-focus" name="signUp_link"> Зарегистрироваться </button>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php
  // mysqli_close($link);
?>
