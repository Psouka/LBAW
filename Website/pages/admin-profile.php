<?php
include_once ('../config/init.php');
include_once ('../database/users.php');
include_once ('../database/admin.php');

if(isset($_GET['id'])) {

	if($_SESSION['usertype'] != 'admin')
	{
		header ('Location: ' . $BASE_URL . 'pages/profile.php?id=' . $_GET['id']);
		exit();
	}

	$profile = getUserById($_GET['id']);
	$avaliacao = getRating($_GET['id']);

	$blocked = false;

	if(checkBlockUser($_GET['id']) )
		$blocked = true;

	$smarty->assign ('blocked', $blocked);


	$smarty->assign ('avaliacao', $avaliacao);

	$dataRegisto =  date("Y-m-d", time($profile['dataRegisto']));
	$smarty->assign ('dataRegisto', $dataRegisto);
	$smarty->assign ('profile', $profile);
	//Imagens do Perfil
	$imagem = array();
	$imagem['Capa'] = getimagemUtilizador($profile['idimagemcapa']);
	$imagem['Perfil'] = getimagemUtilizador($profile['idimagemperfil']);
	$smarty->assign('imagem',$imagem);
	//Categorias dos Leiloes do Utilizador
	$categorias = getcategoriasUtilizador($_GET['id']);

	$smarty->assign('categories',$categorias);
	$smarty->assign('TITLE', 'Profile');

	$morada = getMoradaProfile($profile['idmorada']);
	$smarty->assign('morada', $morada);
	$ship = getMoradaProfile($profile['idship']);
	$smarty->assign('ship', $morada);


	$leiloes = getUserAuctions(15,0,$_GET['id']);
	$smarty->assign('leiloes', $leiloes);
	//print_r(array_combine($leiloes,$licitacoes));
	//print_r($biggerAuction);
	//print_r($avaliacao);

	$smarty->display ('admin/admin-profile.tpl');
}
else
{
	header ('Location: ' . $BASE_URL . 'pages/404.php');
}

?>
