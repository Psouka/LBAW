<?php
include_once ('../../config/init.php');
include_once ('../../database/admin.php');

if($_SESSION['usertype']  != 'admin')
{
	echo 'no admin';
	exit();
}

if(isset($_GET['idComentario']))
{
	unlockComment($_GET['idComentario']);
}
else if(isset($_GET['idUser']))
{
	unlockUser($_GET['idUser']);
}
else if(isset($_GET['idAuction']))
{
	unlockAuction($_GET['idAuction']);
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
		exit();
?>