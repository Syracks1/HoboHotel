<?php

  //Insert Controller Stuffs
  include './clsLogin.php'; 
  include '../data/DB.php';
  if(!Login::IsLoggedIn())
  {
    include '../html/login.html';
  }
  else{echo 'Already Logged In!';}
  include '../objects/user/baseUser.php';

  if(isset($_POST['login']))
  {
    $username = $_POST['uname'];
    $pass = $_POST['pw'];
    $user = new BaseUser;

    if(DB::query('SELECT username FROM user WHERE username=:username', array(':username'=>$username)))
    {
      if (password_verify($pass, DB::query('SELECT password FROM user WHERE username=:username', array(':username'=>$username))[0]['password']))
      {
        $cstrong = TRUE;
        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));

        $user->setUserID(DB::query('SELECT ID FROM user WHERE username=:username', array(':username'=>$username))[0]['ID']);
        DB::query('INSERT INTO tokens VALUES(null, :ID, :token)', array(':token'=>sha1($token), ':ID'=>$user->getUserID()));

        setcookie('SNID', $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
        setcookie('SNID_', '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
      }
      else{echo 'Incorrect Password';}
    }
    else{echo 'User does not Exist';}
  }

?>
