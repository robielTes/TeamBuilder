<?php

require_once 'model/Member.php';

class MemberController
{
    public function index()
    {
        $user = Member::find(USER_ID);
        $members = Member::all();
        require_once 'view/MemberList.php';
    }

}