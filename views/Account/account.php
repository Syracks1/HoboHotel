<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>HoboHotel - Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="stylesheet" href="../../css/bootstrap.css"/>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  </head>
  <body>
<?php

  require '../../data/DB.php';
  require '../../controllers/clsLogin.php';
  require '../../objects/user/baseUser.php';

  $newUser = new BaseUser;
  if(isset($_COOKIE['SNID']))
  {
    $id = DB::query('SELECT UserID FROM tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['SNID'])));
    $UserTypeID = DB::query('SELECT UserTypeID FROM user WHERE ID=:id', array(':id'=>$id));
  }

  $pdo = new PDO('mysql:host=127.0.0.1;dbname=HoboHotel;charset=utf8', 'root', '');
  if($UserTypeID = 1)
  {
    $sql = 'SELECT * FROM dakloze WHERE ID=(SELECT ID FROM user WHERE ID=$id)';
  }
  else if($UserTypeID = 2)
  {
    $sql = 'SELECT * FROM medewerker WHERE ID=(SELECT ID FROM user WHERE ID = $id)';
  }

  $statement = $pdo->prepare($sql);
  $statement->execute();
  $listing = $statement->fetchAll(PDO::FETCH_OBJ);

?>

<nav class="navbar navbar-toggleable-md navbar-dark bg-dark">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button><a class="navbar-brand" href="#">Navbar</a>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active"><a class="nav-link" href="../index.php">Home</a></li>
      <li class="nav-item"><a class="nav-link" href="../controllers/loginController.php">Login</a></li>
      <li class="nav-item"><a class="nav-link" href="../controllers/regController.php">Register</a></li>
      <li class="nav-item"><a class="nav-link active" href="./views/listings.php">Listings</a></li>
    </ul>
  </div>
</nav>
