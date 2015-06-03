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
            </div>
			<div class="well row">
                <h3 class="text-center no-margin"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionTwo" href="#collapseTwo">Auctions' Filters <span class="caret"></span></a></h3>
                <div class="panel-collapse collapse in" id="collapseTwo">
                    <div>
                        <h4>Sort</h4>
                        <select class="form-control">
                            <option>Price: Lowest First</option>
							<option>Price: Highest First</option>
							<option>Time: Ending Soonest</option>
							<option>Time: Newly Listed</option>
                        </select>
                    </div>
                    <div>
                        <h4>Categories</h4>
                        <select class="form-control">
                            {foreach $categories as $category}
                            <option>{$category.tipo}</option>
                            {/foreach}
                        </select>
                    </div>
                    <div class="text-center small-margin-top">
                        <button class="btn btn-default">Apply</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search Results -->
        <section class="col-sm-9 col-sm-pull-3">
		
			<!-- Users Results -->
		
            <div class="row">
                <h2 class="pull-left no-margin text-justify lead"><strong class="text-danger">2 users</strong> were found for the search of <strong class="text-danger">SearchKey</strong></h2>
            </div>
			<legend class="search-result row small-margin-right small-margin-vertical no-padding">
				<div class="col-xs-12 col-sm-12 col-md-3 text-center no-padding-left">
					<a href="#" title="Lorem ipsum" class="profile-pic thumbnail">
						<img class="profile-pic" src="http://placehold.it/200x200" alt="Lorem ipsum" />
					</a>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-9 medium-padding-top no-padding-mobile">
					<h2 class="no-margin text-center-mobile"><a href="#" title="">Name Namesis Namorium</a></h2>
					<div>
						<h2 class="no-margin lead text-center-mobile">
							<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
							<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
							<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
							<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
							<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
						</h2>
						<h4 class="no-margin text-center-mobile"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Porto</h4>
						<h5 class="text-center-mobile"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> N auctions ongoing</h5>
					</div>
				</div>
				<span class="clearfix borda"></span>
			</legend>
			<legend class="search-result row small-margin-right small-margin-vertical no-padding">
				<div class="col-xs-12 col-sm-12 col-md-3 text-center no-padding-left">
					<a href="#" title="Lorem ipsum" class="profile-pic thumbnail">
						<img class="profile-pic" src="http://placehold.it/200x200" alt="Lorem ipsum" />
					</a>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-9 medium-padding-top no-padding-mobile">
					<h2 class="no-margin text-center-mobile"><a href="#" title="">Name Namesis Namorium</a></h2>
					<div>
						<h2 class="no-margin lead text-center-mobile">
							<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
							<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
							<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
							<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
							<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
						</h2>
						<h4 class="no-margin text-center-mobile"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Porto</h4>
						<h5 class="text-center-mobile"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> N auctions ongoing</h5>
					</div>
				</div>
			</legend>
			
			<!-- Auction Results -->
			
			<div class="row">
                <h2 class="pull-left no-margin text-justify lead"><strong class="text-danger">2 auctions</strong> were found for the search of <strong class="text-danger">SearchKey</strong></h2>
            </div>
			<legend class="search-result row small-margin-right small-margin-vertical no-padding">
				<div class="col-xs-12 col-sm-12 col-md-3 text-center no-padding-left">
					<a href="#" title="Lorem ipsum" class="profile-pic thumbnail">
						<img class="profile-pic" src="http://placehold.it/200x100" alt="Lorem ipsum" />
					</a>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-9 no-padding-mobile">
					<h3 class="no-margin text-center-mobile"><a href="#" title="">Auction Auctionis</a></h3>
					<div class="small-margin-bottom">
						<h5 class="no-margin text-center-mobile"><span class="glyphicon glyphicon-calendar span-padding" aria-hidden="true"></span> 02/15/2014</h5>
						<h5 class="no-margin text-center-mobile"><span class="glyphicon glyphicon-time span-padding" aria-hidden="true"></span> 04:28:34</h5>
						<h5 class="no-margin text-center-mobile"><span class="glyphicon glyphicon-tags span-padding" aria-hidden="true"></span> Category</h5>
					</div>
				</div>
			</legend>
			<legend class="search-result row small-margin-right small-margin-vertical no-padding">
				<div class="col-xs-12 col-sm-12 col-md-3 text-center no-padding-left">
					<a href="#" title="Lorem ipsum" class="profile-pic thumbnail">
						<img class="profile-pic" src="http://placehold.it/200x100" alt="Lorem ipsum" />
					</a>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-9 no-padding-mobile">
					<h3 class="no-margin text-center-mobile"><a href="#" title="">Auction Auctionis</a></h3>
					<div class="small-margin-bottom">
						<h5 class="no-margin text-center-mobile"><span class="glyphicon glyphicon-calendar span-padding" aria-hidden="true"></span> 02/15/2014</h5>
						<h5 class="no-margin text-center-mobile"><span class="glyphicon glyphicon-time span-padding" aria-hidden="true"></span> 04:28:34</h5>
						<h5 class="no-margin text-center-mobile"><span class="glyphicon glyphicon-tags span-padding" aria-hidden="true"></span> Category</h5>
					</div>
				</div>
			</legend>
        </section>
        <!-- Search Results -->
    </div>
</div>
<!-- Main Page Content -->
{include file='common/footer.tpl'}