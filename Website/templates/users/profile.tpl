
{include file='common/header.tpl'}
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
        <a href="#">No Rating <!--span class="glyphicon glyphicon-thumbs-up"></span></a>
        <a href="#"> <span class="glyphicon glyphicon-thumbs-down"></span--></a></b>
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
   <legend><h2>Most Recent Auctions</h1></legend>
 </hgroup>



 <div class="row">
  {if $biggerAuction}
  <div class="col-sm-8 col-lg-8 col-md-8">

    <div class="thumbnailBigger">
      <img class="img-responsive" src="../{$biggerAuction.localizacao}" alt="">
      <div class="caption-full">
        <h4 class="pull-right text-right">
          <small class="pull-right">
            {if $biggerAuction.preco eq 0}
            {$biggerAuction.precoinicial} €
            {else}
            {$biggerAuction.preco} €
            {/if}
          </small>
          <br>
          <small class="ratings no-padding">{$biggerAuction.count} Bids</small>
        </h4>
        <h4><a href="item.php?id={$biggerAuction.idleilao}">{$biggerAuction.nome}</a></h4>
        <h4><span class="glyphicon glyphicon-time" aria-hidden="true"></span> {$biggerAuction.datalimite}</h4>

        <p>{$biggerAuction.descricao} </p>
        <div class="ratings">
        <!--h4>User rating: </h4>
        <p>
          <span class="glyphicon glyphicon-star"></span>
          <span class="glyphicon glyphicon-star"></span>
          <span class="glyphicon glyphicon-star"></span>
          <span class="glyphicon glyphicon-star"></span>
          <span class="glyphicon glyphicon-star-empty"></span>
          4 stars
        </p-->
      </div>
    </div>
  </div>
</div>
{/if}

{foreach $leiloes as $leilao}
<div class="col-sm-4 col-lg-4 col-md-4">
  <div class="thumbnail">
    {if file_exists($leilao.localizacao)}
    <img src="{$leilao.localizacao}" alt="">
    {else}
    <img src="http://placehold.it/300x150" alt="">
    {/if}
    <div class="caption">
      <h4 class="pull-right">
        {if $leilao.preco eq 0}
        {$leilao.precoinicial} €
        {else}
        {$leilao.preco} €
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
<br>
<br>
<div class="well"> <!-- comments -->

  <link href="{$BASE_URL}css/comment.css" rel="stylesheet">

  {foreach $reviews as $review}
  <section class="comment-list">

    <article class="row">
      <div class="col-md-2 col-sm-2 hidden-xs">
        <div class="thumbnailUsers">
          <img class="img-responsive user-photo" src="{$BASE_URL}{$review.localizacao}">
        </div><!-- /thumbnail -->
      </div><!-- /col-sm-1 -->

      <div class="col-md-10 col-sm-10">
        <div class="panel panel-default">
          <div class="panel-heading">
            <a href="{$BASE_URL}pages/profile.php?id={$review.idavaliador}"><strong>{$review.avaliador}</strong></a>
            -
            <a href="{$BASE_URL}pages/item.php?id={$review.idleilao}"><strong>{$review.nome}</strong></a>

            <span class="text-muted"> {$review.data}</span>
            {if $review.estrelas ge 3}
            <a href="#"> {$review.estrelas} Stars <span class="glyphicon glyphicon-thumbs-up"></span></a>
            {else}
            <a href="#">{$review.estrelas} Stars <span class="glyphicon glyphicon-thumbs-down"> </span></a>
            {/if}
          </div>
          <div class="panel-body">
           {$review.texto}
         </div><!-- /panel-body -->
       </div><!-- /panel panel-default -->
     </div><!-- /col-sm-5 -->
   </article>
   <br>

 </section>
 {/foreach}



</div>
<!-- /.well -->

</div>

</div>

</div>

{include file='common/footer.tpl'}
