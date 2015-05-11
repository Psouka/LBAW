<?php
include_once ('../../config/init.php');
include_once ($BASE_DIR . 'database/users.php');

if(isset($_POST['from']))
  changeResidence();
else if(isset($_POST['ship']))
  changeShiping();
else
  editProfile();

//  header ('Location: ' . $BASE_URL . '/pages/settings.php');
?>
