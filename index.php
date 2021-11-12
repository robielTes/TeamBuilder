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


if (isset($_GET['action'])) {
    $action = $_GET['action'];
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
    default:
        $home->index();
        break;
}