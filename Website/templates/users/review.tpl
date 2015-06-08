{include file='common/header.tpl'}

<!-- Main Page Content -->
<div class="container">

	{foreach $avaliacoes as $avaliacao}
    
	<div class="well"> <!-- comments -->
<form class="form-horizontal centered" role="form"  action="{$BASE_URL}actions/users/newReview.php" method="post">
		<h2><a href="item.php?id={$avaliacao.idleilao}">{$avaliacao.nome}</a></h2>
	<h4>Bet: {$avaliacao.preco}€</h4>

  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Stars:</label>
    <div class="col-sm-10">
      <input type="hidden" name="idlicitacao" value="{$avaliacao.idlicitacao}">
      <select class="form-control" name="stars">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3" selected>3</option>
  <option value="4">4</option>
  <option value="5">5</option>
</select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Comment:</label>
    <div class="col-sm-10"> 
     <textarea name="textComment" class="form-control" rows="3"></textarea>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>
  </div>
  <br>
  {/foreach}
</div>
</form>

</div>
<!-- Main Page Content -->

{include file='common/footer.tpl'}