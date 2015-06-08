{include file='common/header.tpl'}

<!-- Main Page Content -->
<div class="container">

    <div class="row">
        <!-- Login Form -->
        <div class="col-md-6">
            <form class="form-horizontal" role="form" action="{$BASE_URL}actions/message/create-message.php" method="post">
                <fieldset>

                    <!-- Login -->
                    <legend class="text-right">Message</legend>
                        
                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Subject</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Subject" name="subject" class="form-control" required>
                        </div>
                    </div>

                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Text</label>
                        <div class="col-sm-10">
                            <textarea name="text" placeholder="Text" class="form-control" rows="5"></textarea>
                        </div>
                    </div>

                    <input type="hidden" name="idReceptor" value="{$idReceptor}">

                    {if $errorL neq ''}
                    <div class="alert alert-warning alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong>Error!</strong>
                      {$errorL}
                    </div>
                    {/if}
                     <!-- Button -->
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Send</button>
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