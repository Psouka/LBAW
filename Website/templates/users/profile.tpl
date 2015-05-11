
{include file='common/header.tpl'}
<div class="container">
 <div class="jumbotron changeme" style = "url( {$imagem.Capa} );">
   <span class="wrench glyphicon glyphicon-wrench" title="Change this cover"></span>
   <h1 id="username">{$profile.utilizador}</h1>
 </div>
 <div class="row">
  <div class="col-md-3">
    <legend><h2>About this user</h1></legend>
    <div class="panel panel-default">
     <div class="panel-body">
      <img class="img-responsive" src="url( {$imagem.Perfil} );" alt="">
      <br>
      <p>Centered in <b> {$morada.nomecidade} , {$morada.nomepais} </b></p>
      <p>Ships from <b> {$ship.nomecidade} , {$ship.nomepais} </b></p>

      <p> <b> Rating: </b> <b>
        <a href="#">400 <span class="glyphicon glyphicon-thumbs-up"></span></a>
        <a href="#">90 <span class="glyphicon glyphicon-thumbs-down"></span></a></b>
      </p>
      Member since {$dataRegisto}
    </div>
  </div>


  <div class="panel-group" id="accordionTwo">
   <div class="panel panel-default">
    <div class="panel-heading">
     <h4 class="panel-title">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionTwo" href="#collapseFour">Categorias</a> <span class="caret"></span>
    </h4>
  </div>
  <div class="panel-collapse collapse in" id="collapseFour">
   <div class="list-group">
    {foreach $categories as $categorie}
    <a href="#" class="list-group-item">{$categorie.tipo}</a>
    {/foreach}
  </div>
</div>
</div>
</div>

</div>

<div class="col-md-9">
  <hgroup class="mb20">
   <legend><h2>Most Recent Auctions</h1></legend>
 </hgroup>



 <div class="row">

  <div class="col-sm-8 col-lg-8 col-md-8">
    <div class="thumbnail">
      <img class="img-responsive" src="http://placehold.it/600x300" alt="">
      <div class="caption-full">
        <h4 class="pull-right text-right">
          <small class="pull-right">€ 24.99</small>
          <br>
          <small class="ratings no-padding">3 bids</small>
        </h4>
        <h4><a href="#">Featured Product</a></h4>
        <h4><span class="glyphicon glyphicon-time" aria-hidden="true"></span> 07:59</h4>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla ... </p>
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
  </div>


  {foreach $leiloes as $leilao}
  <div class="col-sm-4 col-lg-4 col-md-4">
    <div class="thumbnail">
      <img src="http://placehold.it/300x150" alt="">
      <div class="caption">
        <h4 class="pull-right">
          {if $leilao.preco eq 0}
          {$leilao.precoinicial}
          {else}
          {$leilao.preco}
          {/if}
        </h4>
        <h4><a href="item.php?id={$leilao.idleilao}"> {$leilao.nome}</a>
        </h4>
        <p>{$leilao.descricao}</p>
      </div>
      <div class="ratings">
        <p class="pull-right">{$leilao.count} bids</p>
        <p>
          <span class="glyphicon glyphicon-star"></span>
          <span class="glyphicon glyphicon-star"></span>
          <span class="glyphicon glyphicon-star"></span>
          <span class="glyphicon glyphicon-star"></span>
          <span class="glyphicon glyphicon-star"></span>
        </p>
      </div>
    </div>
  </div>
  {/foreach}



</div>

<div class="well"> <!-- comments -->

  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h2 class="page-header">
          Reviews
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

{include file='common/footer.tpl'}
