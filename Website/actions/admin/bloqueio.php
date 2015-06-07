<?php
include_once ('../../config/init.php');
include_once ('../../database/admin.php');

if($_SESSION['usertype']  != 'admin')
{
	exit();
}

if(isset($_GET['idComentario']))
{
	blockComment($_GET['idComentario']);

}
else if(isset($_GET['idUser']))
{
	blockUser($_GET['idUser']);
}
else if(isset($_GET['idAuction']))
{
	blockAuction($_GET['idAuction']);
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
		exit();

?>