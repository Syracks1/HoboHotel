<?php

  class BaseUser
  {
    protected $id;
    protected $uname;
    protected $pass;
    protected $userType;

    // User ID
    public function setUserID($userid)
    {
      $this->id = $userid;
    }

    public function getUserID()
    {
      return $this->id;
    }

    // User Name
    public function setUserName($uname)
    {
      $this->username = $uname;
    }

    public function getUserName()
    {
      return $this->username;
    }

    // User Password
    public function setUserPass($pass)
    {
      $this->password = $pass;
    }

    public function getUserPass()
    {
      return $this->password;
    }

    // User Type
    public function setUserType($userType)
    {
      $this->userType = $userType;
    }

    public function getUserType()
    {
      return $this->userType;
    }
  }

?>
