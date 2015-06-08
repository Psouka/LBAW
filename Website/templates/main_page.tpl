{include file='common/header.tpl'}

<!-- Main Page Content -->
<div class="container">

    <div class="row">

        <div class="col-md-3">		
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
                            <a href="{$BASE_URL}pages/search.php?category={$categorie.idcategoria}" class="list-group-item">{$categorie.tipo}</a>
                            {/foreach}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <p class="lead">What's new</p>
            <div class="row carousel-holder">

                <div class="col-md-12">
                 <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        {if file_exists($firstLeilao.localizacao)}
                        <a href="pages/item.php?id={$firstLeilao.idleilao}"> 
                            <img class="slide-image" src="{$firstLeilao.localizacao}" alt="">    
                        </a>
                        <div class="carousel-caption">
                            <h2>{$firstLeilao.nome}</h2>
                        </div>
                        {else}
                        <a href="pages/item.php?id={$firstLeilao.idleilao}">
                            <img class="slide-image" src="http://placehold.it/800x400" alt="">
                        </a>
                        <div class="carousel-caption">
                            <h2>{$firstLeilao.nome}</h2>
                        </div>
                        {/if}
                        </div>
                        {foreach $firstLeiloes as $lei}

                        <div class="item">
                          {if file_exists($lei.localizacao)}
                          <a href="pages/item.php?id={$lei.idleilao}"> 
                              <img class="slide-image" src="{$lei.localizacao}" alt="">
                          </a>
                          <div class="carousel-caption">
                            <h2>{$lei.nome}</h2>
                        </div>
                        {else}
                        <a href="pages/item.php?id={$lei.idleilao}"> 
                          <img class="slide-image" src="http://placehold.it/800x400" alt="">
                      </a>
                      <div class="carousel-caption">
                        <h2>{$lei.nome}</h2>
                    </div>
                    {/if}

                </div>
                {/foreach}

        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>
</div>

<p class="lead">Last deals</p>

<div class="row">
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
    <h4>
        <a href="pages/item.php?id={$leilao.idleilao}">
         {$leilao.nome}
     </a>
 </h4>
 <p>{$leilao.descricao}</p>
</div>
<div class="ratings">
   <p class="pull-right">
    {$leilao.count} bids
</p>
<p>
  {if $leilao.estrelas gt 0}
  {round($leilao.estrelas)}

    <span class="glyphicon glyphicon-star"></span>
    {else}
    No rating
    {/if}

</p>
</div>
</div>
</div>
{/foreach}
</div>

</div>

</div>

</div>
<!-- Main Page Content -->
{include file='common/footer.tpl'}
