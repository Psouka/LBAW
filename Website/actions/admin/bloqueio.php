<?php
include_once ('../../config/init.php');


if($_SESSION['usertype']  != 'admin')
{
	exit();
}

if(isset($_POST['idComentario']))
{

}
?>