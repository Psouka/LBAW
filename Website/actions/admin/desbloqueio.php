<?php
include_once ('../../config/init.php');
include_once ('../../database/admin.php');

if($_SESSION['usertype']  != 'admin')
{
	exit();
}

if(isset($_POST['idComentario']))
{
	unlockComment($_POST['idComentario']);
}
else if(isset($_POST['idUser']))
{
	unlockUser($_POST['idUser']);
}
else if(isset($_POST['idAuction']))
{
	unlockAuction($_POST['idAuction']);
}

?>