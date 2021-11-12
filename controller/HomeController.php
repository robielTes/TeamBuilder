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
        $state =$profile->state()[0];
        $role = $profile->role()[0];
        require_once 'view/profil.php';
    }

    public function member(int $id)
    {

        $profile = Member::find($id);
        $state =$profile->state()[0];
        $role = $profile->role()[0];
        require_once 'view/profil.php';
    }


}