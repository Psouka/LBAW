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
            <a class="navbar-brand" href="{$BASE_URL}"><img alt="brand" src="{$BASE_URL}images/logo.png">
            </a>
            <a class="navbar-brand pull-right" data-toggle="collapse" href="#collapsedSearch" aria-expanded="false" aria-controls="collapseExample">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav window-right">
                <li>
                    <a href="{$BASE_URL}pages/profile.php?id={$USERID}">{$FIRSTNAME} + {$USERNAME} + {$USERID}</a>
                </li>
                <li>
                    <a href="{$BASE_URL}pages/settings.php">Settings</a>
                </li>

                {if $USERTYPE eq 'admin'}
                <li>
                    <a href="{$BASE_URL}pages/create-item.php">Create auction</a>
                </li>
                {else}
                <li>
                    <a href="{$BASE_URL}pages/create-item.php">Create auction</a>
                </li>
                {/if}
                <li>
                    <a href="{$BASE_URL}actions/users/logout.php">Logout</a>
                </li>
            </ul>
        </div>
        <form class="collapse small-margin-bottom no-padding" id="collapsedSearch" action="{$BASE_URL}pages/search.php" method="get">
            <div class="input-group">
                <input name="text" type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                    <button href="#search" class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>