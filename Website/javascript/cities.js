
var country = '';
var city = '';

$(document).ready(function(){

  $('#country1').change(c1);
  $('#country2').change(c2);

});

function c1(){
  country = '#country1';
  city = '#city1';
  updateOptions();
}

function c2(){
  country = '#country2';
  city = '#city2';
  updateOptions();
}

function updateOptions(){

  var idPais = $( country ).val();
  var link = "../database/util.php?idPais=" + idPais;

  $.ajax({
    url: link,
    dataType: "json",
    success: function(data) {
      $(city).empty();

      $.each(data, function(i, value) {
        $(city).append($('<option>').text(value.nome).attr('value', value.idcidade));
      });
    }
  });

}
