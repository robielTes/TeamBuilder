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


    public function memberEdit(int $id)
    {

        $profile = Member::find($id);
        $states =$profile->state();
        $role = $profile->role()[0];
       if($role->name === 'Member'){
           require_once 'view/editMember.php';
       }elseif($role->name === 'Moderator'){
           require_once 'view/editModerator.php';
       }
    }
}