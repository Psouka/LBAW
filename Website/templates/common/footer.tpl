    <div id="error_messages">
        {foreach $ERROR_MESSAGES as $error}
          <div class="error">{$error}<a class="close" href="#">X</a></div>
        {/foreach}
    </div>
    <div id="success_messages">
        {foreach $SUCCESS_MESSAGES as $success}
          <div class="success">{$success}<a class="close" href="#">X</a></div>
        {/foreach}
    </div>
    
    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{$BASE_URL}javascript/bootstrap.min.js"></script>

    </body>
</html>