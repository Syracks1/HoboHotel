<?php

include '../html/RegisterHotel.html';
include '../data/DB.php';
include '../objects\listings\baseListing.php';

if(isset($_POST['CreateHome']))
{
  $Naam = $_POST['NaamId'];
  $Adres = $_POST['AdresId'];
  $City = $_POST['CityId'];
  $PhoneId = $_POST['PhoneId'];

    DB::query('INSERT INTO location VALUES (null, :Name, :SpaceId, :Adress, :City, :Phone)', array(':Name'=>$Naam, ':SpaceId'=> 1, ':Adress'=>$Adres, ':City'=>$City, ':Phone'=>$PhoneId));
}

?>
