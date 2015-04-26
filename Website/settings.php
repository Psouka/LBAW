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
                <legend>Settings</legend>
                
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="card-holder-name">First Name</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="first-name" id="card-holder-name" placeholder="Mariana">
                    </div> 
                    <label class="col-sm-2 control-label" for="card-holder-name">Last Name</label>
                    <div class="col-sm-2">  
                        <input type="text" class="form-control" name="last-name" id="card-holder-name" placeholder="Lages">
                    </div> 
                </div>
                
                <div class="form-group">
                    <label class="col-sm-3 control-label">Sex</label>
                    <div class="col-sm-4 input-group">
                        <div class="radio">
							<label>
								<input type="radio" name="optionsRadios" id="optionsRadios1" value="male" checked>
								Male
							</label>
                            <label>
								<input type="radio" name="optionsRadios" id="optionsRadios1" value="female">
								Female
							</label>
                        </div>
                    </div>
                </div>      

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="expiry-month">Birth date</label>
                    <div class="col-sm-4">
                        <?php require 'templates/datepicker.php'; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="card-number">E-mail</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" name="email" id="email" placeholder="john@gmail.com"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="card-number">Phone No</label>
                    <div class="col-sm-6">
                        <input type="tel" class="form-control" name="field2" id="card-number" placeholder="+351 919063054"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="card-holder-name">Profile Picture<p><small>1:1 Size Ratio Recommended</small></p></label>
                    <div class="col-sm-9 input-group" id="small-padding-horizontal">
                        <input type="file" id="profile-pic">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="card-holder-name">Cover Picture<p><small>1040x250 Size Recommended</small></p></label>
                    <div class="col-sm-9 input-group" id="small-padding-horizontal">
                        <input type="file" id="cover-pic">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-9">
                      <div class="pull-right">
                        <button type="submit" class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>
                    </div>
                  </div>
            </fieldset>
        </form>

        <div class="row">
            <div class="col-md-6">
              <form class="form-horizontal" role="form">
                <fieldset>

                  <!-- Form Name -->
                  <legend>Where I am</legend>

                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">Line 1</label>
                    <div class="col-sm-10">
                      <input type="text" placeholder="Address Line 1" class="form-control">
                    </div>
                  </div>

                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">Line 2</label>
                    <div class="col-sm-10">
                      <input type="text" placeholder="Address Line 2" class="form-control">
                    </div>
                  </div>

                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">City</label>
                    <div class="col-sm-10">
                      <input type="text" placeholder="City" class="form-control">
                    </div>
                  </div>

                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">State</label>
                    <div class="col-sm-4">
                      <input type="text" placeholder="State" class="form-control">
                    </div>

                    <label class="col-sm-2 control-label" for="textinput">Postcode</label>
                    <div class="col-sm-4">
                      <input type="text" placeholder="Post Code" class="form-control">
                    </div>
                  </div>



                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">Country</label>
                    <div class="col-sm-10">
                      <input type="text" placeholder="Country" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="pull-right">
                        <button type="submit" class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>
                    </div>
                  </div>

                </fieldset>
              </form>
            </div><!-- /.col-lg-12 -->


            <div class="col-md-6">
              <form class="form-horizontal" role="form">
                <fieldset>

                  <!-- Form Name -->
                  <legend>Where I ship from</legend>

                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">Line 1</label>
                    <div class="col-sm-10">
                      <input type="text" placeholder="Address Line 1" class="form-control">
                    </div>
                  </div>

                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">Line 2</label>
                    <div class="col-sm-10">
                      <input type="text" placeholder="Address Line 2" class="form-control">
                    </div>
                  </div>

                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">City</label>
                    <div class="col-sm-10">
                      <input type="text" placeholder="City" class="form-control">
                    </div>
                  </div>

                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">State</label>
                    <div class="col-sm-4">
                      <input type="text" placeholder="State" class="form-control">
                    </div>

                    <label class="col-sm-2 control-label" for="textinput">Postcode</label>
                    <div class="col-sm-4">
                      <input type="text" placeholder="Post Code" class="form-control">
                    </div>
                  </div>



                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">Country</label>
                    <div class="col-sm-10">
                      <input type="text" placeholder="Country" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="pull-right">
                        <button type="submit" class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>
                    </div>
                  </div>

                </fieldset>
              </form>
            </div><!-- /.col-lg-12 -->
        </div>

        
    </div>
    <!-- /.container -->

    <!--?php require 'templates/footer.php'; ?-->
    
    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
