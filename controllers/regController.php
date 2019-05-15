<?php

  include '../data/DB.php';
  include '../html/register.html';

  if(isset($_POST['createaccount']))
  {
    $username = $_POST['uname'];
    $pass = $_POST['pw'];
    $passr = $_POST['pwr'];

    if(!DB::query('SELECT username FROM user WHERE username=:username', array(':username'=>$username)))
    {
      if(strlen($username) >= 3 && strlen($username) <= 32)
      {
        if(preg_match('/[a-zA-Z0-9_]+/', $username))
        {
          if(strlen($pass) >= 6 && strlen($pass) <= 60)
          {
            if($pass == $passr)
            {
              DB::query('INSERT INTO user VALUES (null, :username, :password, 1)', array(':username'=>$username, ':password'=>password_hash($pass, PASSWORD_BCRYPT)));
            }
          }
        }
      }
    }
  }

?>
