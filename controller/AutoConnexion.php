<?php

require 'model/Member.php';

class AutoConnexion
{
    public $user;
    public $user_name;


    public function __construct()
    {
        $this->user = Member::find(1);
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->user_name;
    }

    /**
     * @param mixed $user_name
     */
    public function setUserName($user_name): void
    {
        $this->user_name = $user_name;
    }



}