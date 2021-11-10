<?php

require_once 'model/Member.php';

class MemberController
{
    public function index()
    {
        $user = Member::find(USER_ID);
        $members = Member::orderBy();
        require_once 'view/MemberList.php';
    }

}