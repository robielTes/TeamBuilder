<?php
require_once 'model/Member.php';

class HomeController
{
    public function index()
    {
        require_once 'view/Homepage.php';
    }

    public function profil()
    {
        $profile = Member::find(USER_ID);
        $states =$profile->state();
        $roles = $profile->role();
        require_once 'view/profil.php';
    }

}