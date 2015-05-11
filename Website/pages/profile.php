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
	$smarty->assign('TITLE', 'Profile');

	$morada = getMoradaProfile($profile['idmorada']);
	$smarty->assign('morada', $morada);
	$ship = getMoradaProfile($profile['idship']);
	$smarty->assign('ship', $morada);


	$leiloes =  getLastAuctions($_GET['id']);
	$licitacoes = leiloes_addlicitacao($leiloes);

	$biggerAuction = $licitacoes[0];
	unset($licitacoes[0]);


	$smarty->assign('leiloes', $licitacoes);
	$smarty->assign('biggerAuction', $biggerAuction);


	//print_r(array_combine($leiloes,$licitacoes));
	//print_r($leiloes);
	//print_r($licitacoes);

	$smarty->display ('users/profile.tpl');
}

?>
