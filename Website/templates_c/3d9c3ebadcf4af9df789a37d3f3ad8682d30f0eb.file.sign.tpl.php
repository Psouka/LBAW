<?php /* Smarty version Smarty-3.1.15, created on 2015-04-28 12:32:32
         compiled from "/opt/lbaw/lbaw1443/public_html/proto/templates/users/sign.tpl" */ ?>
<?php /*%%SmartyHeaderCode:140704440553ea43cd4d6e4-72729942%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d9c3ebadcf4af9df789a37d3f3ad8682d30f0eb' => 
    array (
      0 => '/opt/lbaw/lbaw1443/public_html/proto/templates/users/sign.tpl',
      1 => 1430217146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '140704440553ea43cd4d6e4-72729942',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_553ea43cdf0877_35523530',
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_553ea43cdf0877_35523530')) {function content_553ea43cdf0877_35523530($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!-- Main Page Content -->
<div class="container">

    <div class="row">
        <!-- Login Form -->
        <div class="col-md-6">
            <form class="form-horizontal" role="form" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/login.php" method="post">
                <fieldset>

                    <!-- Login -->
                    <legend class="text-right">Login</legend>

                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Username</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Username" name="username" class="form-control">
                        </div>
                    </div>

                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Password</label>
                        <div class="col-sm-10">
                            <input type="password" placeholder="Password" name="password" class="form-control">
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>
        
        <!-- Register Form -->
        <div class="col-md-6">
            <form class="form-horizontal" role="form" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/register.php" method="post">
                <fieldset>

                    <!-- Register -->
                    <legend class="text-left">Register</legend>

                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Username</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Username" name="username" class="form-control">
                        </div>
                    </div>

                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Password</label>
                        <div class="col-sm-10">
                            <input type="password" placeholder="Password" name="password" class="form-control">
                        </div>
                    </div>
                    
                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Firstname</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Firstname" name="firstname" class="form-control">
                        </div>
                    </div>
                    
                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Lastname</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Lastname" name="lastname" class="form-control">
                        </div>
                    </div>
                    
                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Genre</label>
                        <div class="radio col-sm-5"><label><input type="radio" name="genre" value="Male" checked>Male</label></div>
                        <div class="radio col-sm-5"><label><input type="radio" name="genre" value="Female">Female</label></div>
                    </div>
                    
                    
                    
                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">E-mail</label>
                        <div class="col-sm-10">
                            <input type="email" placeholder="E-mail" name="email" class="form-control">
                        </div>
                    </div>
                    
                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Mobile Number</label>
                        <div class="col-sm-10">
                            <input type="number" placeholder="9** *** ***" name="mobile" class="form-control">
                        </div>
                    </div>
                    
                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Birthdate</label>
                        <div class="col-sm-10">
                            <input type="date" placeholder="**/**/**" name="birthdate" class="form-control">
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>
    </div>

</div>
<!-- Main Page Content -->

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
