<?php
include_once ('../../config/init.php');
include_once ($BASE_DIR . 'database/users.php');
include_once ($BASE_DIR . 'database/util.php');

$username = $_POST['username'];
$email = $_POST['email'];

$newPassword = resetPass($username,$email);


if($newPassword != 'notUpdated')
sendPassword($email,$newPassword);

header ('Location: ' . $BASE_URL . 'pages/sign.php');
?>
