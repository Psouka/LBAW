<?php
include_once ('../config/init.php');
include_once ('../database/users.php');

$profile = "";
if(isset($_GET['id'])) {

	$profile = getProfile($_GET['id']);

	$dataRegisto =  date("Y-m-d", time($profile['dataRegisto']));
	$smarty->assign ('dataRegisto', $dataRegisto);

	$smarty->assign ('profile', $profile);


	//Imagens do Perfil
	$imagem = array();
	$imagem['Capa'] = imagemUtilizador($profile['idImagemCapa']);
	$imagem['Perfil'] = imagemUtilizador($profile['idImagemPerfil']);
	$smarty->assign('imagem',$imagem);


	//Categorias dos Leiloes do Utilizador
	$categorias = categoriasUtilizador($_GET['id']);
	$smarty->assign('categorias',$categorias);


}

$smarty->display ('profile.tpl');
?>