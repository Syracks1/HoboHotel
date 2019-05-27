<?php

  class BaseListing
  {
    protected $id;
    protected $name;
    protected $SpaceID;
    protected $adress;
    protected $city;
    protected $phone;

    // ID
    public function setID($listID)
    {
      $this->id = $listID;
    }

    public function getID()
    {
      return $this->id;
    }

    // Name
    public function setListName($name)
    {
      $this->name = $name;
    }

    public function getListName()
    {
      return $this->name;
    }

    // Space ID
    public function setSpaceID($spID)
    {
      $this->SpaceID = $spID;
    }

    public function getSpaceID()
    {
      return $this->SpaceID;
    }

    // Adress
    public function setListAdress($Adress)
    {
      $this->adress = $Adress;
    }

    public function getListAdress()
    {
      return $this->adress;
    }

    // City
    public function setListCity($City)
    {
      $this->city = $City;
    }

    public function getListCity()
    {
      return $this->city;
    }

    // Phone
    public function setListPhone($Cell)
    {
      $this->phone = $Cell;
    }

    public function getListPhone()
    {
      return $this->phone;
    }
  }

?>
