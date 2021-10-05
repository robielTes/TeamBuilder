<?php

class HomeController
{
    public function auth()
    {
        require_once 'view/Homepage.php';
    }
    public function membre()
    {
        require_once 'view/MemberList.php';
    }


}