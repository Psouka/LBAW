<?php /* Smarty version Smarty-3.1.15, created on 2015-04-28 18:15:21
         compiled from "/opt/lbaw/lbaw1443/public_html/proto/templates/auctions/create-item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:555571580553ea5a485fcb0-74114251%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '30bc675fd2dbcabc646b8ab29b0d1d86c2721dc7' => 
    array (
      0 => '/opt/lbaw/lbaw1443/public_html/proto/templates/auctions/create-item.tpl',
      1 => 1430217145,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '555571580553ea5a485fcb0-74114251',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_553ea5a49161d6_46019851',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'categories' => 0,
    'categorie' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_553ea5a49161d6_46019851')) {function content_553ea5a49161d6_46019851($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!-- Main Page Content -->
<div class="container">
    <form class="form-horizontal" role="form" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/auctions/create.php" method="post">
        <fieldset>
            <legend>Create Auction</legend>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="card-holder-name">Title</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="title" id="card-holder-name" placeholder="Title of the auction">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="card-number">Description</label>
                <div class="col-sm-9">
                    <textarea type="text" class="form-control" name="description" id="card-number" placeholder="Description of the product"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="card-holder-name">Starting bid</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="startingBid" id="card-holder-name" placeholder="Value">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="card-holder-name">Buyout</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="buyout" id="card-holder-name" placeholder="Value">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="card-holder-name">Category</label>
                <div class="col-sm-9">
                    <select class="form-control" name="category">
                        <?php  $_smarty_tpl->tpl_vars['categorie'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['categorie']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['categorie']->key => $_smarty_tpl->tpl_vars['categorie']->value) {
$_smarty_tpl->tpl_vars['categorie']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['categorie']->value['idcategoria'];?>
"><?php echo $_smarty_tpl->tpl_vars['categorie']->value['tipo'];?>
</option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="expiry-month">Expiration Date</label>
                <div class="col-sm-4">
                    <input type="date" placeholder="Expiration date" name="expirationDate" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-success">Create Now</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>
<!-- Main Page Content -->

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
