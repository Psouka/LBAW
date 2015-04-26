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

</head>

<body>

    <?php require 'templates/header.php'; ?>

    <!-- Page Content -->
    <div class="container">
        <form class="form-horizontal" role="form">
            <fieldset>
                <legend>Create Auction</legend>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="card-holder-name">Title</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="field1" id="card-holder-name" placeholder="Title of the auction">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="card-number">Description</label>
                    <div class="col-sm-9">
                        <textarea type="text" class="form-control" name="field2" id="card-number" placeholder="Description of the product"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="card-holder-name">Starting bid</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="field3" id="card-holder-name" placeholder="Value">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="card-holder-name">Buyout</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="field4" id="card-holder-name" placeholder="Value">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="card-holder-name">Category</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="field5">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="card-holder-name">Image<p><small>2:1 Size Ratio Recommended</small></p></label>
                    <div class="col-sm-9 input-group" id="small-padding-horizontal">
                        <input type="file" id="exampleInputFile">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="expiry-month">Expiration Date</label>
                    <div class="col-sm-4">
                        <?php require 'templates/datepicker.php'; ?>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-success">Create Now</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    <!-- /.container -->

    <!--?php require 'templates/footer.php'; ?-->
    
    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
