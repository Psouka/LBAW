<?php
include_once ('../config/init.php');
include_once ('../database/users.php');
$profile = "";
if(isset($_GET['id'])) {
	$profile = getUserById($_GET['id']);
	$dataRegisto =  date("Y-m-d", time($profile['dataRegisto']));
	$smarty->assign ('dataRegisto', $dataRegisto);
	$smarty->assign ('profile', $profile);
	//Imagens do Perfil
	$imagem = array();
	$imagem['Capa'] = getimagemUtilizador($profile['idImagemCapa']);
	$imagem['Perfil'] = getimagemUtilizador($profile['idImagemPerfil']);
	$smarty->assign('imagem',$imagem);
	//Categorias dos Leiloes do Utilizador
	$categorias = getcategoriasUtilizador($_GET['id']);

	$smarty->assign('categories',$categorias);
}
$smarty->display ('users/profile.tpl');
?>
