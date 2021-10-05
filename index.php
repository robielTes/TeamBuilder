<?php
session_start();

require 'controller/Authentication.php';
require 'controller/HomeController.php';

$auth = new Authentication();

$_SESSION['user'] = $auth->getUser();

$controller = new HomeController();

$controller->auth();