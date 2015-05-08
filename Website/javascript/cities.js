$(document).ready(function(){

  $('#country').change(function(){

    var idPais = $( "#country" ).val();
    var link = "../database/util.php?idPais=" + idPais;

    $.ajax({
      url: link,
      dataType: "json",
      success: function(data) {
        $('#city').empty();

        $.each(data, function(i, value) {
          $('#city').append($('<option>').text(value.nome).attr('value', value.idcidade));
        });
      }
    });

  });

});
