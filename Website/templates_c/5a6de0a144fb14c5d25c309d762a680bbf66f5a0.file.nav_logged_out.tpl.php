<?php /* Smarty version Smarty-3.1.15, created on 2015-04-28 12:32:30
         compiled from "/opt/lbaw/lbaw1443/public_html/proto/templates/common/nav_logged_out.tpl" */ ?>
<?php /*%%SmartyHeaderCode:136977678553ea416843c24-08913881%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a6de0a144fb14c5d25c309d762a680bbf66f5a0' => 
    array (
      0 => '/opt/lbaw/lbaw1443/public_html/proto/templates/common/nav_logged_out.tpl',
      1 => 1430217146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136977678553ea416843c24-08913881',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_553ea41685c2f2_76518534',
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_553ea41685c2f2_76518534')) {function content_553ea41685c2f2_76518534($_smarty_tpl) {?><!-- Navigation -->
<link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/header.css" rel="stylesheet">
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
"><img alt= "brand" src= "<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/logo.png"></a>
            <a class="navbar-brand pull-right" data-toggle="collapse" href="#collapsedSearch" aria-expanded="false" aria-controls="collapseExample">
              <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav window-right">
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/sign.php">Sign in or Sign up</a>
                </li>
            </ul>
        </div>
        <div class="collapse small-margin-bottom no-padding" id="collapsedSearch">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <a href="searchResults.php" class="btn btn-default" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
              </span>
            </div>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav><?php }} ?>
