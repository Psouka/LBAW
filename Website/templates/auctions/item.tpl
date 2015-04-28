{include file='common/header.tpl'}

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
                            {foreach $categories as $category}
                                {if $category.idcategoria == $auction.idcategoria}
                                    <a href="#" class="list-group-item active">{$category.tipo}</a>
                                {else}
                                    <a href="#" class="list-group-item">{$category.tipo}</a>
                                {/if}
                            {/foreach}
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
                            <a href="#" class="list-group-item active"><span class="badge">15.50 <span class="glyphicon glyphicon-euro" aria-hidden="true"></span></span> First Bidder</a>
                            <a href="#" class="list-group-item"><span class="badge">11.99 <span class="glyphicon glyphicon-euro" aria-hidden="true"></span></span> Second Bidder</a>
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
                        <small class="pull-right">Buyout: {$auction.precocompraimediata}</small>
                        <br>
                        <small class="ratings no-padding">{count($bids)} bids</small>
                    </h4>
                    <h4><a href="">{$auction.nome}</a></h4>
                    <h4><span class="glyphicon glyphicon-time" aria-hidden="true"></span> 07:59</h4>

                    <p>{$auction.descricao}</p>
                    <br>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Place bid...">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Bid!</button>
                      </span>
                    </div><!-- /input-group -->
                </div>
                <div class="ratings">
                    <h4>User rating: </h4>
                    <a href="#" class="pull-right">Report this auction</a>
                    <p>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star-empty"></span>
                        4 stars
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

{include file='common/footer.tpl'}