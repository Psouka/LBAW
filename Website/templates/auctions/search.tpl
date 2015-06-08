{include file='common/header.tpl'}

<!-- Main Page Content -->
<div class="container">
    <div class="container">
		<legend>
			<h1>Search Results</h1>
		</legend>
        <!-- Filters -->
        <div class="col-sm-3 col-sm-push-9">
            <div class="well row">
                 <form class="form-horizontal" role="form" action="{$BASE_URL}pages/search.php" method="GET">
                    <input name="text" type="text" value="{$hiddeninput}" hidden>
                <h3 class="text-center no-margin"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionOne" href="#collapseOne">Users' Filters <span class="caret"></span></a></h3>
                <div class="panel-collapse collapse in" id="collapseOne">
                    <div>
                        <h4>Sort</h4>
                        <select class="form-control">
                            <option>Rating: Lowest First</option>
                            <option>Rating: Highest First</option>
                        </select>
                    </div>
                    <div>
                        <h4>City</h4>
                        <select class="form-control">
                            {foreach $cities as $city}
                            <option>{$city.nome}</option>
                            {/foreach}
                        </select>
                    </div>
                    <div class="text-center small-margin-top">
                        <button class="btn btn-default">Apply</button>
                    </div>
                </div>
            </form>
            </div>
			<div class="well row">
                <form class="form-horizontal" role="form" action="{$BASE_URL}pages/search.php" method="GET">

                    <input name="text" type="text" value="{$hiddeninput}" hidden>
                <h3 class="text-center no-margin"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionTwo" href="#collapseTwo">Auctions' Filters <span class="caret"></span></a></h3>
                <div class="panel-collapse collapse in" id="collapseTwo">
                    <div>
                        <h4>Sort</h4>
                        <select name ="sort" class="form-control">
                            <option value = ""  disable select> -- Select an option -- </option>
                            <option value ="pricel">Price: Lowest First</option>
							<option value ="priceh">Price: Highest First</option>
							<option value ="times">Time: Ending Soonest</option>
							<option value ="timen">Time: Newly Listed</option>
                        </select>
                    </div>
                    <div>
                        <h4>Categories</h4> 
                        <select name="category" class="form-control">
                            <option value = "{$hiddencat}" disable select> -- Select an option -- </option>
                            {foreach $categories as $category}
                            <option value= "{$category.idcategoria}">{$category.tipo}</option>
                            {/foreach}
                        </select>
                    </div>
                    <div class="text-center small-margin-top">
                        <button class="btn btn-default" type="submit">Apply</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
        <!-- Search Results -->
        <section class="col-sm-9 col-sm-pull-3">
		
			<!-- Users Results -->
		
            <div class="row">
                <h2 class="pull-left no-margin text-justify lead"><strong class="text-danger">{sizeof($users)} users</strong> were found for "<strong class="text-danger">{$searchfield}</strong>"</h2>
            </div>
            {foreach $users as $user}
			<legend class="search-result row small-margin-right small-margin-vertical no-padding">
				<div class="col-xs-12 col-sm-12 col-md-3 text-center no-padding-left">
					<a href="#" title="Lorem ipsum" class="profile-pic thumbnail">
						<img class="profile-pic" src="{$BASE_URL}{$user.localizacao}" alt="{$user.nomeproprio}"/>
					</a>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-9 medium-padding-top no-padding-mobile">
					<font size="7" class="no-margin text-center-mobile"><a href="{$BASE_URL}pages/profile.php?id={$user.idutilizador}" title="">{$user.nomeproprio} {$user.sobrenome}</a></font size="7">
					<div>
						<h2 class="no-margin lead text-center-mobile">
                            {for $index = 1 to round($user.rating)}
                                <span class="glyphicon glyphicon-star"></span>
                            {/for}
                            {for $index = 1 to 5 - round($user.rating)}
                                <span class="glyphicon glyphicon-star-empty"></span>
                            {/for}
						</h2>
						<h3 class="no-margin text-center-mobile"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> {$user.cidade}, {$user.pais}</h3>
					</div>
				</div>
				<span class="clearfix borda"></span>
			</legend>
            {/foreach}
			
			<!-- Auction Results -->
			
			<div class="row">
                <h2 class="pull-left no-margin text-justify lead"><strong class="text-danger">{sizeof($auctions)} auctions</strong> were found for <strong class="text-danger">{$searchfield}</strong></h2>
            </div>
            {foreach $auctions as $auction}
                <legend class="search-result row small-margin-right small-margin-vertical no-padding">
                    <div class="col-xs-12 col-sm-12 col-md-3 text-center no-padding-left">
                        <a href="#" title="Lorem ipsum" class="profile-pic thumbnail">
                            <img class="profile-pic" src="{$BASE_URL}{$auction.localizacao}" alt="{$auction.nome}" />
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-9 no-padding-mobile">
                        <font size="7" class="no-margin text-center-mobile"><a href="{$BASE_URL}pages/item.php?id={$auction.idleilao}" title="">{$auction.nome}</a></font size="7">
                        <h4 class="no-margin text-center-mobile"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {$auction.nomeproprio}</h4>
                        <div class="small-margin-bottom">
                            <h5 class="no-margin text-center-mobile"><span class="glyphicon glyphicon-euro span-padding" aria-hidden="true"></span> 
                                {if isset($auction.topbid)}
                                {$auction.topbid} €
                                {else}
                                {$auction.precoinicial} €
                                {/if}
                                </h5>
                            <h5 class="no-margin text-center-mobile"><span class="glyphicon glyphicon-calendar span-padding" aria-hidden="true"></span> {date("d/m/Y", strtotime($auction.datalimite))} <span class="glyphicon glyphicon-time span-padding" aria-hidden="true"></span> {date("h:m:s", strtotime($auction.datalimite))}</h5>
                            <h5 class="no-margin text-center-mobile"><span class="glyphicon glyphicon-tags span-padding" aria-hidden="true"></span> {$auction.tipo}</h5>
                        </div>
                    </div>
                </legend>
            {/foreach}
        </section>
        <!-- Search Results -->
    </div>
</div>
<!-- Main Page Content -->
{include file='common/footer.tpl'}