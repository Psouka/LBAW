<script src="{$BASE_URL}javascript/jquery.js"></script>
<script src="{$BASE_URL}javascript/cities.js"></script>

<!-- Text input-->
<div class="form-group">
  <label class="col-sm-2 control-label" for="textinput">Line 1</label>
  <div class="col-sm-10">
    <input type="text" name="line1" placeholder="Address Line 1" class="form-control" required>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-sm-2 control-label" for="textinput">Line 2</label>
  <div class="col-sm-10">
    <input type="text" name="line2" placeholder="Address Line 2" class="form-control">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-sm-2 control-label" for="textinput">Country</label>
  <div class="col-sm-10">
    <select id="country2" name="country" class="form-control" required>
      {foreach $countries as $country}
      <option value="{$country.idpais}">{$country.nome}</option>
      {/foreach}
</select>
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-sm-2 control-label" for="textinput">City</label>
  <div class="col-sm-10">
    <select id="city2" name="city" class="form-control" required>
    </select>
  </div>
</div>

<!-- Text input>
<div class="form-group">
  <label class="col-sm-2 control-label" for="textinput">State</label>
  <div class="col-sm-4">
    <input type="text" name="state" placeholder="State" class="form-control" required>
  </div-->
  <div class="form-group">
  <label class="col-sm-2 control-label" for="textinput">Postcode</label>
  <div class="col-sm-4">
    <input type="text" name="postcode" placeholder="Post Code" class="form-control" required>
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
