{include file='common/header.tpl'}

<!-- Main Page Content -->
<div class="container">

    <div class="row">
        <!-- Login Form -->
        <div class="col-md-6">
            <form class="form-horizontal" role="form" action="{$BASE_URL}actions/users/login.php" method="post">
                <fieldset>

                    <!-- Login -->
                    <legend class="text-right">Login</legend>

                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Username</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Username" name="username" class="form-control">
                        </div>
                    </div>

                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Password</label>
                        <div class="col-sm-10">
                            <input type="password" placeholder="Password" name="password" class="form-control">
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>
        
        <!-- Login Form -->
        <div class="col-md-6">
            <form class="form-horizontal" role="form">
                <fieldset>

                    <!-- Login -->
                    <legend class="text-left">Register</legend>

                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Username</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Username" class="form-control">
                        </div>
                    </div>
                    
                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Password</label>
                        <div class="col-sm-10">
                            <input type="password" placeholder="Password" class="form-control">
                        </div>
                    </div>
                    
                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label text-left" for="textinput">Name</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Name" class="form-control">
                        </div>
                    </div>
                    
                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Surname</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Surname" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="card-number">E-mail</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" id="email" placeholder="address@domain.com"></textarea>
                        </div>
                    </div>
                    
                    <!-- Radio input -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Sex</label>
                        <div class="col-sm-10 input-group">
                            <div class="radio">
                                <label class="col-sm-5">
                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="male" checked>
                                    Male
                                </label>
                                <label class="col-sm-5">
                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="female">
                                    Female
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="expiry-month">Birth date</label>
                        <div class="col-sm-10">
                            {include file='common/datepicker.tpl'}
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>
    </div>

</div>
<!-- Main Page Content -->

{include file='common/footer.tpl'}