<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>HoboHotel - Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="stylesheet" href="../css/bootstrap.css"/>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  </head>
  <body>
    <?php
      require '../data/DB.php';
      require '../controllers/clsLogin.php';
      require '../objects/listings/baseListing.php';

      $newListing = new BaseListing;

      $pdo = new PDO('mysql:host=127.0.0.1;dbname=HoboHotel;charset=utf8', 'root', '');
      $sql = 'SELECT ID, Name, SpaceID, Adress, City, Phone FROM location';
      $statement = $pdo->prepare($sql);
      $statement->execute();
      $listing = $statement->fetchAll(PDO::FETCH_OBJ);

      echo '    <nav class="navbar navbar-toggleable-md navbar-dark bg-dark">
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
';


      echo '<div class="jumbotron bg-light m-4">';
      echo '<table class="table table-dark">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Adress</th>
              <th>City</th>
              <th>Phone</th>
            </tr>
            ';
      foreach ($listing as $list) {
        echo '<tr><td>';

        $newListing->setID($list->ID);
        echo $newListing->getID();

        echo '</td><td>';

        $newListing->setListName($list->Name);
        echo $newListing->getListName();

        echo '</td><td>';

        $newListing->setListAdress($list->Adress);
        echo $newListing->getListAdress();

        echo '</td><td>';

        $newListing->setListCity($list->City);
        echo $newListing->getListCity();

        echo '</td><td>';

        $newListing->setListPhone($list->Phone);
        echo $newListing->getListPhone();

        echo '</td>';
        echo '</tr>';
        echo '</div>';
      }
    ?>

  </body>
</html>
