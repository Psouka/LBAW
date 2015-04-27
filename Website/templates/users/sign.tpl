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
        
        <!-- Register Form -->
        <div class="col-md-6">
            <form class="form-horizontal" role="form" action="{$BASE_URL}actions/users/register.php" method="post">
                <fieldset>

                    <!-- Register -->
                    <legend class="text-left">Register</legend>

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
                    
                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Firstname</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Firstname" name="firstname" class="form-control">
                        </div>
                    </div>
                    
                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Lastname</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Lastname" name="lastname" class="form-control">
                        </div>
                    </div>
                    
                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Genre</label>
                        <div class="radio col-sm-5"><label><input type="radio" name="genre" value="Male" checked>Male</label></div>
                        <div class="radio col-sm-5"><label><input type="radio" name="genre" value="Female">Female</label></div>
                    </div>
                    
                    
                    
                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">E-mail</label>
                        <div class="col-sm-10">
                            <input type="email" placeholder="E-mail" name="email" class="form-control">
                        </div>
                    </div>
                    
                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Mobile Number</label>
                        <div class="col-sm-10">
                            <input type="number" placeholder="9** *** ***" name="mobile" class="form-control">
                        </div>
                    </div>
                    
                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Birthdate</label>
                        <div class="col-sm-10">
                            <input type="date" placeholder="**/**/**" name="birthdate" class="form-control">
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