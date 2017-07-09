/*---------------------------------------------------------------------------
                            ONLINE PAYMENTS WITH CONEKTA INC.
---------------------------------------------------------------------------*/
 

function send_payment_oxxo(){	

    var dataString = {
        'amount' : $("#amount_oxxo").val(),
        'email' : $("#email_oxxo").val()
    };

    $.ajax({
        type: "POST",
        url: "conekta_oxxo.php",
        data: dataString,
        success: function(resp) {                               
            //window.open('report.php?'+resp, '_blank');          
            $('#oxxo').html(resp);
        }
    }); 
}


function send_payment_card(){      

// key llave publica para crear el token
Conekta.setPublishableKey('key_OGRYWeoY4Js77Amf5vZ4kwQ');


// recibe el token para almacenar en el servidor 
var successResponseHandler = function(token) {
  alert(token.id);



var datos_card = {

'amount_card': $("#amount_card").val(),
'name_card': $("#name_card").val(),
'number_card': $("#number_card").val(),
'cvc_card': $("#cvc_card").val(),
'exp_month_card': $("#exp_month_card").val(),
'exp_year_card': $("#exp_year_card").val(),
'token': token.id
};

console.log(datos_card);

    $.ajax({
        type: "POST",
        url: "conekta_card.php",
        data: datos_card,
        success: function(resp) {                               
            //window.open('report.php?'+resp, '_blank');          
            $('#card').html(resp);
        }
    }); 
  



};



var errorResponseHandler = function(error) {

alert("el token no se creo");
};


var tokenParams = {
  "card": {
    "number": $("#number_card").val(),
    "name": $("#name_card").val(),
    "exp_year": $("#exp_year_card").val(),
    "exp_month": $("#exp_month_card").val(),
    "cvc": $("#cvc_card").val(),
    "address": {
        "street1": "Calle 123 Int 404",
        "street2": "Col. Condesa",
        "city": "Ciudad de Mexico",
        "state": "Distrito Federal",
        "zip": "12345",
        "country": "Mexico"
     }
  }
};


Conekta.token.create(tokenParams, successResponseHandler, errorResponseHandler);





}
 