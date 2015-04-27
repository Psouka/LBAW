{include file='common/header.tpl'}

<!-- Main Page Content -->
<div class="container">
        <form class="form-horizontal" role="form" action="{$BASE_URL}actions/users/createItem.php" method="post">
            <fieldset>
                <legend>Create Auction</legend>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="card-holder-name">Title</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="title" id="card-holder-name" placeholder="Title of the auction">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="card-number">Description</label>
                    <div class="col-sm-9">
                        <textarea type="text" class="form-control" name="description" id="card-number" placeholder="Description of the product"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="card-holder-name">Starting bid</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="startingBid" id="card-holder-name" placeholder="Value">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="card-holder-name">Buyout</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="buyout" id="card-holder-name" placeholder="Value">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="card-holder-name">Category</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="category">
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
                        <input type="file" id="exampleInputFile" name = "image">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="expiry-month">Expiration Date</label>
                    <div class="col-sm-4">
                        <input type="date" placeholder="E-mail" name="birthdate" class="form-control">
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
<!-- Main Page Content -->

{include file='common/footer.tpl'}