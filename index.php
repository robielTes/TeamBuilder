<?php
session_start();

require_once 'controller/Authentication.php';
require_once 'controller/HomeController.php';
require_once 'controller/MemberController.php';

$Home = new HomeController();
$Member = new MemberController();

$auth = new Authentication();
$_SESSION['user'] = $auth->getUser();

if (isset($_GET['controller'])) {
    $action = $_GET['controller'];
}
switch ($action){
    case "listMember":
        $Member->index();
        break;
    default:
        $Home->index();
        break;
}