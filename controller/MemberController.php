<?php

require_once 'model/Member.php';

class MemberController
{
    public function memberList()
    {
        $user = Member::find(USER_ID);
        $members = Member::orderBy();
        require_once 'view/memberList.php';
    }
    public function memberTeams()
    {
        $user = Member::find(USER_ID);
        $teams = $user->teams();
        require_once 'view/memberTeams.php';
    }

}