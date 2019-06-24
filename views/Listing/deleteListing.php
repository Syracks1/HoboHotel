<?php

  require '../../data/DB.php';

  $pdo = new PDO('mysql:host=127.0.0.1;dbname=HoboHotel;charset=utf8', 'root', '');
  $id = $_GET['id'];
  DB::query('DELETE FROM location WHERE ID=:id', array(':id'=>$id));

?>
