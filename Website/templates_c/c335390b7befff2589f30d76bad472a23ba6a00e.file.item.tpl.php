<?php /* Smarty version Smarty-3.1.15, created on 2015-04-28 13:24:07
         compiled from "/opt/lbaw/lbaw1443/public_html/proto/templates/auctions/item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1460007382553eb173a946a8-90940599%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c335390b7befff2589f30d76bad472a23ba6a00e' => 
    array (
      0 => '/opt/lbaw/lbaw1443/public_html/proto/templates/auctions/item.tpl',
      1 => 1430220243,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1460007382553eb173a946a8-90940599',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_553eb173b4dda0_28719319',
  'variables' => 
  array (
    'categories' => 0,
    'category' => 0,
    'auction' => 0,
    'bidders' => 0,
    'bidder' => 0,
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_553eb173b4dda0_28719319')) {function content_553eb173b4dda0_28719319($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-md-3">
            <div class="panel-group" id="accordionOne">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionOne" href="#collapseOne">Categories:</a> <span class="caret"></span>
                        </h4>
                    </div>
                    <div class="panel-collapse collapse in" id="collapseOne">
                        <div class="list-group">
                            <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
                                <?php if ($_smarty_tpl->tpl_vars['category']->value['idcategoria']==$_smarty_tpl->tpl_vars['auction']->value['idcategoria']) {?>
                                    <a href="#" class="list-group-item active"><?php echo $_smarty_tpl->tpl_vars['category']->value['tipo'];?>
</a>
                                <?php } else { ?>
                                    <a href="#" class="list-group-item"><?php echo $_smarty_tpl->tpl_vars['category']->value['tipo'];?>
</a>
                                <?php }?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-group" id="accordionTwo">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionTwo" href="#collapseTwo">Bidders</a> <span class="caret"></span>
                        </h4>
                    </div>
                    <div class="panel-collapse collapse in" id="collapseTwo">
                        <div class="list-group">
                            <?php  $_smarty_tpl->tpl_vars['bidder'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['bidder']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['bidders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['bidder']->key => $_smarty_tpl->tpl_vars['bidder']->value) {
$_smarty_tpl->tpl_vars['bidder']->_loop = true;
?>
                                <a href="#" class="list-group-item"><span class="badge"><?php echo $_smarty_tpl->tpl_vars['bidder']->value['preco'];?>
</span> <?php echo $_smarty_tpl->tpl_vars['bidder']->value['nomeproprio'];?>
</a>
                            <?php } ?>
                            
                            
                            <!--a href="#" class="list-group-item active"><span class="badge">15.50 <span class="glyphicon glyphicon-euro" aria-hidden="true"></span></span> First Bidder</a>
                            <a href="#" class="list-group-item"><span class="badge">11.99 <span class="glyphicon glyphicon-euro" aria-hidden="true"></span></span> Second Bidder</a-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-9">

            <div class="thumbnail">
                <img class="img-responsive" src="http://placehold.it/800x400" alt="">
                <div class="caption-full">
                    <h4 class="pull-right text-right">
                        <small class="pull-right">Buyout: <?php echo $_smarty_tpl->tpl_vars['auction']->value['precocompraimediata'];?>
</small>
                        <br>
                        <small class="ratings no-padding"><?php echo count($_smarty_tpl->tpl_vars['bidders']->value);?>
 bids</small>
                    </h4>
                    <h4><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
profile.php?id=<?php echo $_smarty_tpl->tpl_vars['auction']->value['idleiloeiro'];?>
"><?php echo $_smarty_tpl->tpl_vars['auction']->value['nomeproprio'];?>
</a>'s <a href=""><?php echo $_smarty_tpl->tpl_vars['auction']->value['nome'];?>
</a></h4>
                    <h4><span class="glyphicon glyphicon-time" aria-hidden="true"></span> 07:59</h4>

                    <p><?php echo $_smarty_tpl->tpl_vars['auction']->value['descricao'];?>
</p>
                    <br>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Place bid...">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Bid!</button>
                      </span>
                    </div><!-- /input-group -->
                </div>
                <div class="ratings">
                    <h4><?php echo $_smarty_tpl->tpl_vars['auction']->value['nomeproprio'];?>
's rating: </h4>
                    <a href="#" class="pull-right">Report this auction</a>
                    <p>
                        <?php $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['index']->step = 1;$_smarty_tpl->tpl_vars['index']->total = (int) ceil(($_smarty_tpl->tpl_vars['index']->step > 0 ? $_smarty_tpl->tpl_vars['auction']->value['rating']+1 - (1) : 1-($_smarty_tpl->tpl_vars['auction']->value['rating'])+1)/abs($_smarty_tpl->tpl_vars['index']->step));
if ($_smarty_tpl->tpl_vars['index']->total > 0) {
for ($_smarty_tpl->tpl_vars['index']->value = 1, $_smarty_tpl->tpl_vars['index']->iteration = 1;$_smarty_tpl->tpl_vars['index']->iteration <= $_smarty_tpl->tpl_vars['index']->total;$_smarty_tpl->tpl_vars['index']->value += $_smarty_tpl->tpl_vars['index']->step, $_smarty_tpl->tpl_vars['index']->iteration++) {
$_smarty_tpl->tpl_vars['index']->first = $_smarty_tpl->tpl_vars['index']->iteration == 1;$_smarty_tpl->tpl_vars['index']->last = $_smarty_tpl->tpl_vars['index']->iteration == $_smarty_tpl->tpl_vars['index']->total;?>
                            <span class="glyphicon glyphicon-star"></span>
                        <?php }} ?>
                        <?php $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['index']->step = 1;$_smarty_tpl->tpl_vars['index']->total = (int) ceil(($_smarty_tpl->tpl_vars['index']->step > 0 ? 5-$_smarty_tpl->tpl_vars['auction']->value['rating']+1 - (1) : 1-(5-$_smarty_tpl->tpl_vars['auction']->value['rating'])+1)/abs($_smarty_tpl->tpl_vars['index']->step));
if ($_smarty_tpl->tpl_vars['index']->total > 0) {
for ($_smarty_tpl->tpl_vars['index']->value = 1, $_smarty_tpl->tpl_vars['index']->iteration = 1;$_smarty_tpl->tpl_vars['index']->iteration <= $_smarty_tpl->tpl_vars['index']->total;$_smarty_tpl->tpl_vars['index']->value += $_smarty_tpl->tpl_vars['index']->step, $_smarty_tpl->tpl_vars['index']->iteration++) {
$_smarty_tpl->tpl_vars['index']->first = $_smarty_tpl->tpl_vars['index']->iteration == 1;$_smarty_tpl->tpl_vars['index']->last = $_smarty_tpl->tpl_vars['index']->iteration == $_smarty_tpl->tpl_vars['index']->total;?>
                            <span class="glyphicon glyphicon-star-empty"></span>
                        <?php }} ?>
                        <?php echo $_smarty_tpl->tpl_vars['auction']->value['rating'];?>
 stars
                    </p>
                </div>
            </div>

            <div class="well"> <!-- comments -->

                <div class="container">
                  <div class="row">
                    <div class="col-md-8">
                        <h2 class="page-header">
                            Comments
                            <a href="#" class="pull-right btn btn-default btn-sm"><i class="fa fa-reply"></i>Reply</a>
                        </h2>
                        <section class="comment-list">
                          <!-- First Comment -->
                          <article class="row">
                            <div class="col-md-2 col-sm-2 hidden-xs">
                              <figure class="thumbnail">
                                <img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />
                                <figcaption class="text-center">username</figcaption>
                              </figure>
                            </div>
                            <div class="col-md-10 col-sm-10">
                              <div class="panel panel-default arrow left">
                                <div class="panel-body">
                                  <header class="text-left">
                                    <div class="comment-user"><i class="fa fa-user"></i> That Guy</div>
                                    <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> Dec 16, 2014</time>
                                  </header>
                                  <div class="comment-post">
                                    <p>
                                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </article>
                          <!-- Third Comment -->
                          <article class="row">
                            <div class="col-md-10 col-sm-10">
                              <div class="panel panel-default arrow right">
                                <div class="panel-body">
                                  <header class="text-right">
                                    <div class="comment-user"><i class="fa fa-user"></i> That Guy</div>
                                    <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> Dec 16, 2014</time>
                                  </header>
                                  <div class="comment-post">
                                    <p>
                                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-2 col-sm-2 hidden-xs">
                              <figure class="thumbnail">
                                <img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />
                                <figcaption class="text-center">username</figcaption>
                              </figure>
                            </div>
                          </article>
                          <!-- Fourth Comment -->
                          <article class="row">
                            <div class="col-md-2 col-sm-2 hidden-xs">
                              <figure class="thumbnail">
                                <img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />
                                <figcaption class="text-center">username</figcaption>
                              </figure>
                            </div>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                              <div class="panel panel-default arrow left">
                                <div class="panel-body">
                                  <header class="text-left">
                                    <div class="comment-user"><i class="fa fa-user"></i> That Guy</div>
                                    <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> Dec 16, 2014</time>
                                  </header>
                                  <div class="comment-post">
                                    <p>
                                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </article>
                          <!-- Fifth Comment -->
                          <article class="row">
                            <div class="col-md-10 col-sm-10">
                              <div class="panel panel-default arrow right">
                                <div class="panel-body">
                                  <header class="text-right">
                                    <div class="comment-user"><i class="fa fa-user"></i> That Guy</div>
                                    <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> Dec 16, 2014</time>
                                  </header>
                                  <div class="comment-post">
                                    <p>
                                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-2 col-sm-2 hidden-xs">
                              <figure class="thumbnail">
                                <img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />
                                <figcaption class="text-center">username</figcaption>
                              </figure>
                            </div>
                          </article>
                        </section>
                    </div>
                  </div>
                </div>


            </div>
            <!-- /.well -->

        </div>

    </div>

</div>
<!-- /.container -->

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
