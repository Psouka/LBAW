<?php
include_once ('../config/init.php');

if(!isset($_SESSION['userid'])) {
	header ('Location: ' . $BASE_URL . 'index.php');
	exit();
}

include_once ('../database/util.php');
include_once ('../database/users.php');


$prof = getUserById($_SESSION['userid']);
$from = getAdress($prof['idmorada']);
$ship = getAdress($prof['idship']);
$countries = getCountries();


$smarty->assign('profile', $prof);
$smarty->assign('from', $from);
$smarty->assign('ship', $ship);
$smarty->assign('countries', $countries);
$smarty->assign('nrAdress', 0);
$smarty->assign('TITLE', 'Settings');
$smarty->display ('users/settings.tpl');
?>
