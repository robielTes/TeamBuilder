<?php

require_once 'model/Member.php';

class Authentication
{
    public $user;


    public function __construct()
    {
        $this->user = Member::find(USER_ID);
    }

    /**
     * @return Member
     */
    public function getUser(): Member
    {
        return $this->user;
    }

}