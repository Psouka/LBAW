<?php /* Smarty version Smarty-3.1.15, created on 2015-04-28 12:32:34
         compiled from "/opt/lbaw/lbaw1443/public_html/proto/templates/common/nav_logged_in.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2030950932553ea49c45bb99-13555751%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '408ce96f56805389548196a4a7544465271c425f' => 
    array (
      0 => '/opt/lbaw/lbaw1443/public_html/proto/templates/common/nav_logged_in.tpl',
      1 => 1430217146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2030950932553ea49c45bb99-13555751',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_553ea49c523584_75551459',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'USERID' => 0,
    'FIRSTNAME' => 0,
    'USERNAME' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_553ea49c523584_75551459')) {function content_553ea49c523584_75551459($_smarty_tpl) {?><!-- Navigation -->
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
profile.php?id=<?php echo $_smarty_tpl->tpl_vars['USERID']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['FIRSTNAME']->value;?>
 + <?php echo $_smarty_tpl->tpl_vars['USERNAME']->value;?>
 + <?php echo $_smarty_tpl->tpl_vars['USERID']->value;?>
</a>
                </li>
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
settings.php" style="pointer-events: none;">Settings</a>
                </li>
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/create-item.php">Create auction</a>
                </li>
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/logout.php">Logout</a>
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
