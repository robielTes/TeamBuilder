<?php
session_start();

require_once 'controller/Authentication.php';
require_once 'controller/HomeController.php';
require_once 'controller/MemberController.php';
require_once 'controller/TeamController.php';

$home = new HomeController();
$member = new MemberController();
$team = new TeamController();

$auth = new Authentication();
$_SESSION['user'] = $auth->getUser();

$id = 1;
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
switch ($action){
    case "listMember":
        $member->memberList();
        break;
    case "listTeam":
        $member->memberTeams();
        break;
    case "myTeam":
        $team->team();
        break;
    case "profil":
        $home->profil();
        break;
    case "member":
        $home->member($id);
        break;
    default:
        $home->index();
        break;
}