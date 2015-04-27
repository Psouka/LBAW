<!-- Navigation -->
<link href="{$BASE_URL}css/header.css" rel="stylesheet">
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{$BASE_URL}"><img alt= "brand" src= "{$BASE_URL}images/logo.png"></a>
            <a class="navbar-brand pull-right" data-toggle="collapse" href="#collapsedSearch" aria-expanded="false" aria-controls="collapseExample">
              <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav window-right">
                <li>
                    <a href="{$BASE_URL}pages/sign.php">Sign in or Sign up</a>
                </li>
            </ul>
        </div>
        <div class="collapse small-margin-bottom no-padding" id="collapsedSearch">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <a href="searchResults.php" class="btn btn-default" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
              </span>
            </div>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>