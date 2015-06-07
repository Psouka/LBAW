
{include file='common/header.tpl'}
{include file='admin/admin-bar.tpl'}
<div id="wrapper">

  <!-- Sidebar -->
  <!-- Sidebar -->
  <div id="sidebar-wrapper">
    <ul id="sidebar_menu" class="sidebar-nav">
     <li class="sidebar-brand"><a id="menu-toggle" href="#">Admin<span id="main_icon" class="glyphicon glyphicon-align-justify"></span></a></li>
   </ul>
   <ul class="sidebar-nav" id="sidebar">     

    {if $blocked eq false}
    <li><a href="{$BASE_URL}actions/admin/bloqueio.php?idUser={$profile.idutilizador}">Block<span class="sub_icon glyphicon glyphicon-lock"></span></a></li>
    {else}
    <li><a href="{$BASE_URL}actions/admin/desbloqueio.php?idUser={$profile.idutilizador}">Unlock<span class="sub_icon glyphicon glyphicon-lock"></span></a></li>
    {/if}
  </ul>
</div>
<script type="text/javascript">
$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("active");
});
</script>
</div>



<div class="container">
 <div class="jumbotron changeme">
   <style>
   .jumbotron{
    height: 250px;
    position: relative;
    background-image: url(../{$imagem.Capa.localizacao});
    background-position: 0% 25%;
    background-size: cover;
    background-repeat: no-repeat;
    color: white;
    text-shadow: black 0.1em 0.1em 0.3em ;
    margin-bottom: 15px;
    opacity: 1.0;
    transition: 0.5s;
  }
  .changeme:hover{
    opacity: 0.50;
    transition: 0.7s;
  }
  .wrench{
    position: absolute;
    top: 200px;
    left: 10px;
    font-size: 3em;
    opacity: 0.2;
  }
  .changeme:hover>.wrench{
    opacity: 1.0;
  }
  #username{
    position: absolute;
    left: 60px;
    bottom: -30px;
  }
  </style>
  <span class="wrench glyphicon glyphicon-wrench" title="Change this cover"></span>
  <h1 id="username">{$profile.utilizador}</h1>
</div>
<div class="row">
  <div class="col-md-3">
    <legend><h2>About this user</h1></legend>
    <div class="panel panel-default">
     <div class="panel-body">
      <img class="img-responsive" src="../{$imagem.Perfil.localizacao}" alt="">
      <br>
      <p>Centered in <b> {$morada.nomecidade} , {$morada.nomepais} </b></p>
      <p>Ships from <b> {$ship.nomecidade} , {$ship.nomepais} </b></p>

      <p> <b> Rating: </b> <b>
        {if $avaliacao.estrelas eq ''}
        <a href="#">No Rating <span class="glyphicon glyphicon-thumbs-up"></span></a>
        <a href="#"> <span class="glyphicon glyphicon-thumbs-down"></span></a></b>
        {elseif $avaliacao.estrelas ge 3}
        <a href="#">$avaliacao.estrelas <span class="glyphicon glyphicon-thumbs-up"></span></a>
        {else}
        <a href="#">$avaliacao.estrelas <span class="glyphicon glyphicon-thumbs-down"></span></a></b>
        {/if}
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
    <legend><h2>Auctions</h1></legend>
  </hgroup>
  <div class="col-sm-12 col-lg-12 col-md-12">
    <div class="table-responsive">
      <table class="table table-bordered table-hover table-striped" width="100%" style="text-align: center;">
        <tbody>
          <tr>
            <td>Name</td>
            <td>Description</td>
            <td>Creation Date</td>
            <td>Closing Date</td>
            <td>Number of bids</td>
            <td>Current price</td>
          </tr>


          {foreach $leiloes as $leilao}
          <tr>
            <td> <a href="item.php?id={$leilao.idleilao}">{$leilao.nome}</a></td>
            <td>{$leilao.descricao}</td>
            <td>{$leilao.datadepublicacao}</td>
            <td>{$leilao.datalimite}</td>

            {if $leilao.nrlicitacao neq ''}
            <td>{$leilao.nrlicitacao}</td>
            {else}
            <td>0</td>
            {/if}

            {if $leilao.licitacao neq ''}
            <td>{$leilao.licitacao}</td>
            {else}
            <td>{$leilao.precoinicial}</td>
            {/if}

            <td>
              <form action="{$BASE_URL}actions/admin/bloqueio.php" method="GET">
                <input name="idAuction" value="{$leilao.idleilao}"type="hidden" class="btn btn-danger" >

                <input type="submit" class="btn btn-danger" value="Block" onclick="">
                </form>
                </td>
              </tr>
              {/foreach}



            </tbody></table>
          </div>
        </div>

        <div class="row">

          <div class="well"> <!-- comments -->

            <div class="row">
              <div class="col-md-12">
                <h2 class="page-header">
                  Reviews      </h2>
                  <section class="comment-list">
                    <!-- First Comment -->
                    <article class="row">
                      <div class="col-md-2 col-sm-2 hidden-xs">
                        <figure class="thumbnailReview">
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
                        <figure class="thumbnailReview">
                          <img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />
                          <figcaption class="text-center">username</figcaption>
                        </figure>
                      </div>
                    </article>
                    <!-- Fourth Comment -->
                    <article class="row">
                      <div class="col-md-2 col-sm-2 hidden-xs">
                        <figure class="thumbnailReview">
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
                        <figure class="thumbnailReview">
                          <img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />
                          <figcaption class="text-center">username</figcaption>
                        </figure>
                      </div>
                    </article>
                  </section>
                </div>
              </div>


            </div>
            <!-- /.well -->

          </div>

        </div>

      </div>

      {include file='common/footer.tpl'}
