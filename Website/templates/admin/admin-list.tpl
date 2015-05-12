{include file='common/header.tpl'}
<script src="{$BASE_URL}javascript/jquery.js"></script>
<script src="{$BASE_URL}javascript/admin.js"></script>

<!-- Main Page Content -->
    <div class="container" id="page-content">

        <hgroup class="row">
            <legend><h1>Users</h1></legend>
        </hgroup>

        <div class="row pull-right search">
            <input id="wordUser" class="form-control" type="text" placeholder="Search">
        </div>

        <br>
        <br>

        <!-- Users results -->
        <div class="row users-results" id='listUsers'>

            <!--div class="panel-group" id="accordionUser1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionUser1" href="#collapseUser1">Ana Name2 Name3 <span class="caret"></span></a> <span class="badge pull-right">4 auctions</span>
                        </h4>
                    </div>
                    <div class="panel-collapse collapse" id="collapseUser1">
                        <div class="list-group">
                            <a href="profile.php" class="list-group-item active">Profile</a>
                            <a href="item.php" class="list-group-item"><span class="badge">2 bids</span> First Auction</a>
                            <a href="item.php" class="list-group-item"><span class="badge">7 bids</span> Second Auction</a>
                            <a href="item.php" class="list-group-item"><span class="badge">1 bids</span> Third Auction</a>
                            <a href="item.php" class="list-group-item"><span class="badge">2 bids</span> Fourth Auction</a>
                        </div>
                    </div>
                </div>
            </div-->

        </div>
        <!-- Users results -->

        <br>

        <hgroup class="row">
        <legend><h1>Auctions</h1></legend>
        </hgroup>

        <div class="row pull-right search">
            <input id="wordAuction" class="form-control" type="text" placeholder="Search">
        </div>

        <br>
        <br>

        <!-- Auction results -->
        <div class="row auction-results" id='listAuctions'>

            <!--div class="panel-group" id="accordionAuctionOne">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionAuctionOne" href="#collapseAuctionOne">ALeilao Name2 Name3 <span class="caret"></span></a><span class="badge pull-right">Price €</span><span class="badge pull-right">4 bids</span><span class="badge pull-right" style=" background-color: red;">Reported</span>
                        </h4>
                    </div>
                    <div class="panel-collapse collapse" id="collapseAuctionOne">
                        <div class="list-group">
                            <a href="profile.php" class="list-group-item active">Bids</a>
                            <a href="item.php" class="list-group-item"><span class="badge">€ Bid</span> User1</a>
                            <a href="item.php" class="list-group-item"><span class="badge">€ Bid</span> User2</a>
                            <a href="item.php" class="list-group-item"><span class="badge">€ Bid</span> User3</a>
                            <a href="item.php" class="list-group-item"><span class="badge">€ Bid</span> User4</a>
                        </div>
                    </div>
                </div>
            </div-->

        </div>
        <br>
    </div>
    <!-- Page content -->

    <footer class="navbar navbar-inverse navbar-fixed-bottom" style="padding: 0;  min-height: 20px; color: white;">
        <div class="container text-center" id="byLetter">
            <a href="#a" class="active">
                A
            </a>
                -
            <a href="#b">
                B
            </a>
                -
            <a href="#c">
                C
            </a>
                -
            <a href="#d">
                D
            </a>
                -
            <a href="#e">
                E
            </a>
                -
            ...
        </div>
    </footer>
<!-- Main Page Content -->

{include file='common/footer.tpl'}