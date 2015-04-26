<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="lbaw1443">
  <link rel="shortcut icon" href="img/shortcut.ico">

  <title>Leilões</title>

  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="css/shop-item.css" rel="stylesheet">
  <link href="css/category.css" rel="stylesheet">

</head>

<body>

    <?php require 'templates/header.php'; ?>

    <!-- Page Content -->
    <div class="container" id="page-content">

        <hgroup class="row">
            <legend><h1>Users</h1></legend>
        </hgroup>

        <div class="row pull-right search">
            <input class="form-control" type="text" placeholder="Search">
        </div>

        <br>
        <br>

        <!-- Users results -->
        <div class="row users-results">
            <div class="panel-group" id="accordionUserOne">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionUserOne" href="#collapseUserOne">Ana Name2 Name3 <span class="caret"></span></a> <span class="badge pull-right">4 auctions</span>
                        </h4>
                    </div>
                    <div class="panel-collapse collapse" id="collapseUserOne">
                        <div class="list-group">
                            <a href="profile.php" class="list-group-item active">Profile</a>
                            <a href="item.php" class="list-group-item"><span class="badge">2 bids</span> First Auction</a>
                            <a href="item.php" class="list-group-item"><span class="badge">7 bids</span> Second Auction</a>
                            <a href="item.php" class="list-group-item"><span class="badge">1 bids</span> Third Auction</a>
                            <a href="item.php" class="list-group-item"><span class="badge">2 bids</span> Fourth Auction</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-group" id="accordionUserTwo">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionUserTwo" href="#collapseUserTwo">Amelia Name2 Name3 <span class="caret"></span></a> <span class="badge pull-right">4 auctions</span>
                        </h4>
                    </div>
                    <div class="panel-collapse collapse" id="collapseUserTwo">
                        <div class="list-group">
                            <a href="profile.php" class="list-group-item active">Profile</a>
                            <a href="item.php" class="list-group-item"><span class="badge">2 bids</span> First Auction</a>
                            <a href="item.php" class="list-group-item"><span class="badge">7 bids</span> Second Auction</a>
                            <a href="item.php" class="list-group-item"><span class="badge">1 bids</span> Third Auction</a>
                            <a href="item.php" class="list-group-item"><span class="badge">2 bids</span> Fourth Auction</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Users results -->

        <br>

        <hgroup class="row">
        <legend><h1>Auctions</h1></legend>
        </hgroup>

        <div class="row pull-right search">
            <input class="form-control" type="text" placeholder="Search">
        </div>

        <br>
        <br>

        <!-- Auction results -->
        <div class="row auction-results">
            <div class="panel-group" id="accordionAuctionOne">
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
            </div>

            <div class="panel-group" id="accordionAuctionTwo">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionAuctionTwo" href="#collapseAuctionTwo">ALeilao2 Name2 Name3 <span class="caret"></span></a><span class="badge pull-right" >Price €</span> <span class="badge pull-right">4 bids</span><span class="badge pull-right" style=" background-color: Green;">Ended</span>
                        </h4>
                    </div>
                    <div class="panel-collapse collapse" id="collapseAuctionTwo">
                        <div class="list-group">
                            <a href="profile.php" class="list-group-item active">Bids</a>
                            <a href="item.php" class="list-group-item"><span class="badge">€ Bid</span> User1</a>
                            <a href="item.php" class="list-group-item"><span class="badge">€ Bid</span> User2</a>
                            <a href="item.php" class="list-group-item"><span class="badge">€ Bid</span> User3</a>
                            <a href="item.php" class="list-group-item"><span class="badge">€ Bid</span> User4</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-group" id="accordionAuctionThree">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionAuctionThree" href="#collapseAuctionThree">ALeilao3 Name2 Name3 <span class="caret"></span></a> <span class="badge pull-right" >Price €</span><span class="badge pull-right">4 bids</span>
                        </h4>
                    </div>
                    <div class="panel-collapse collapse" id="collapseAuctionThree">
                        <div class="list-group">
                            <a href="profile.php" class="list-group-item active">Bids</a>
                            <a href="item.php" class="list-group-item"><span class="badge">€ Bid</span> User1</a>
                            <a href="item.php" class="list-group-item"><span class="badge">€ Bid</span> User2</a>
                            <a href="item.php" class="list-group-item"><span class="badge">€ Bid</span> User3</a>
                            <a href="item.php" class="list-group-item"><span class="badge">€ Bid</span> User4</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

    <!--?php require 'templates/footer.php'; ?-->

    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
