<?php /* Smarty version Smarty-3.1.15, created on 2015-04-28 12:32:30
         compiled from "/opt/lbaw/lbaw1443/public_html/proto/templates/common/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:816410024553ea416815171-79043515%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ce022ba73021e6a3babec7f38a8b00f0686b020' => 
    array (
      0 => '/opt/lbaw/lbaw1443/public_html/proto/templates/common/header.tpl',
      1 => 1430217146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '816410024553ea416815171-79043515',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_553ea416840214_70508970',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'USERNAME' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_553ea416840214_70508970')) {function content_553ea416840214_70508970($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="lbaw1443">
        <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/shortcut.ico">

        <title>Leilões da Bairrada</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/shop-homepage.css" rel="stylesheet">

    </head>
    <body>
        <header>
            <?php if ($_smarty_tpl->tpl_vars['USERNAME']->value) {?>
                <?php echo $_smarty_tpl->getSubTemplate ('common/nav_logged_in.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <?php } else { ?>
                <?php echo $_smarty_tpl->getSubTemplate ('common/nav_logged_out.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <?php }?>
        </header><?php }} ?>
