$(document).ready(function() {

    $("#accounts").select2();



    $("#item-add").on("click", function (e) {
        e.preventDefault();



      //  $('#summ > tbody:last').append('<tr><td>1</td><td>Mark</td><td style="text-align: right"><span class="ia"></span> </td></tr>');
var copy = $( "#product" ).clone();
        copy.appendTo( ".products" );

      //  $.post( "test.php", $( "#testform" ).serialize() );

    });


});



// plugin

