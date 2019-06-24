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
  require '../../objects/listings/baseListing.php';
  require '../../data/DB.php';

  $newListing = new BaseListing;

  $pdo = new PDO('mysql:host=127.0.0.1;dbname=HoboHotel;charset=utf8', 'root', '');
  $sql = 'SELECT * FROM location';
  $statement = $pdo->prepare($sql);
  $product = $statement->fetchAll(PDO::FETCH_OBJ);

  if(isset($_POST['sub']))
  {
    $newListing->buildListing(NULL, $_POST['name'], $_POST['adress'], $_POST['city'], $_POST['cell']);
    DB::query('INSERT INTO location (Name, SpaceID, Adress, City, Phone) VALUES (:name, :space, :adress, :city, :phone)', array(':name'=>$newListing->getListName(), ':space'=>1, ':adress'=>$newListing->getListAdress(), ':city'=>$newListing->getListAdress(), ':phone'=>$newListing->getListPhone()));
  }
?>

<div class="jumbotron bg-dark m-5">
  <p class='h1 text-light ml-5'>Add Products</p>
  <form class="form ml-5 w-75" action="#" method="post">
    <div class="form-group mt-2" />
      <input class='form-control mr-sm-2' type="text" name="name" placeholder="Listing Name">
    <div class="form-group mt-2" />
      <input class='form-control mr-sm-2' type="text" name="adress" placeholder="Adress">
    <div class="form-group mt-2" />
      <input class='form-control mr-sm-2' type="text" name="city" placeholder="City">
    <div class="form-group mt-2" />
      <input class='form-control mr-sm-2' type="text" name="cell" placeholder="Phone">
    <input class='btn btn-primary mt-2' name='sub' type="submit" value="Add">
  </form>
</div>
