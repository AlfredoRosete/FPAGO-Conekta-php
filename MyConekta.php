<?php

require_once('lib/Conekta.php');

class MyConekta {



  public static function card($monto,$cliente,$token_id)
  {
 Conekta::setApiKey("key_aUDWXu5s9VvqWQBZMbH2xg");
 Conekta::setApiVersion("2.0.0");
 try{
  $order = Order::create(
    array(
      "line_items" => array(
        array(
          "name" => "Tacos",
          "unit_price" => 1000,
          "quantity" => 12
        )//first line_item
      ), //line_items
      "shipping_lines" => array(
        array(
          "amount" => 1500,
           "carrier" => "mi compañia"
        )
      ), //shipping_lines
      "currency" => "MXN",
      "customer_info" => array(
                "name" => "Jose Alfredo",
        "email" => "Ing.josealfredo@wecode.mx",
        "phone" => "2721975753"
      ), //customer_info
      "shipping_contact" => array(
        "phone" => "5555555555",
        "receiver" => "Bruce Wayne",
        "address" => array(
          "street1" => "Calle 123 int 2 Col. Chida",
          "city" => "Cuahutemoc",
          "state" => "Ciudad de Mexico",
          "country" => "MX",
          "postal_code" => "06100",
          "residential" => true
        )//address
      ), //shipping_contact
      "metadata" => array("reference" => "12987324097", "more_info" => "lalalalala"),
      "charges" => array(
          array(
              "payment_method" => array(
                      "type" => "card",

                      "token_id"=> $token_id
              )//payment_method
          ) //first charge
      ) //charges
    )//order
  );
} catch (\Conekta\ProccessingError $error){
  echo $error->getMesage();
} catch (\Conekta\ParameterValidationError $error){
  echo $error->getMessage();
} catch (\Conekta\Handler $error){
  echo $error->getMessage();
}

  echo "ID: ". $order->id;
echo "Status: ". $order->payment_status;
echo "$". $order->amount/100 . $order->currency;
echo "Order";
echo $order->line_items[0]->quantity .
      "-". $order->line_items[0]->name .
      "- $". $order->line_items[0]->unit_price/100;



}
  
	
	// Oxxo Pay
	public static function oxxo($amount, $email){	



		Conekta::setApiKey("key_aUDWXu5s9VvqWQBZMbH2xg");
		Conekta::setApiVersion("2.0.0");

		$request = array(
      "line_items" => array(
        array(
          "name" => "Tacos",
          "unit_price" => 1000,
          "quantity" => 12
        )//first line_item
      ), //line_items
      "shipping_lines" => array(
        array(
          "amount" => $amount,
          "carrier" => "Wecode"
        )
      ), //shipping_lines
      "currency" => "MXN",
      "customer_info" => array(
        "name" => "Jose Alfredo",
        "email" => "Ing.josealfredo@wecode.mx",
        "phone" => "2721975753"
      ), //customer_info
      "shipping_contact" => array(
        "phone" => "5555555555",
        "receiver" => "Bruce Wayne",
        "address" => array(
          "street1" => "Calle 123 int 2 Col. Chida",
          "city" => "Cuahutemoc",
          "state" => "Ciudad de Mexico",
          "country" => "MX",
          "postal_code" => "06100",
          "residential" => true
        )//address
      ), //shipping_contact
      "charges" => array(
          array(
              "payment_method" => array(
                "type" => "oxxo_cash"
              )//payment_method
          ) //first charge
      ) //charges
    );//order
		try {
			$response = Order::create($request);  	
		   
       $referencia = $response->charges[0]->payment_method->reference; 


echo '<html>';
 echo ' <head>';
  echo '  <link href="styles.css" media="all" rel="stylesheet" type="text/css" />';
  echo '  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">';
 echo ' </head>';
 echo ' <body>';
  echo '  <div class="opps">';
   echo '   <div class="opps-header">';
    echo '    <div class="opps-reminder">Ficha digital. No es necesario imprimir.</div>';
    echo '    <div class="opps-info">';
    echo '      <div class="opps-brand"><img src="oxxopay_brand.png" alt="OXXOPay"></div>';
    echo '      <div class="opps-ammount">';
     echo '       <h3>Monto a pagar</h3>';
     echo '       <h2>$'.$response->amount.'.00 <sup>'.$response->currency.'</sup></h2>';
     echo '       <p>OXXO cobrará una comisión adicional al momento de realizar el pago.</p>';
     echo '     </div>';
     echo '   </div>';
      echo '  <div class="opps-reference">';
      echo '    <h3>Referencia</h3>';
      echo '  <h1>'.substr($referencia, 0,4).'-'.substr($referencia, 4,4).'-'.substr($referencia, 8,4).'-'.substr($referencia, 12,4).'</h1>';
      echo '  </div>';
     echo ' </div>';
     echo ' <div class="opps-instructions">';
     echo '   <h3>Instrucciones</h3>';
     echo '   <ol>';
     echo '     <li>Acude a la tienda OXXO más cercana. <a href="https://www.google.com.mx/maps/search/oxxo/" target="_blank">Encuéntrala aquí</a>.</li>';
      echo '    <li>Indica en caja que quieres ralizar un pago de <strong>OXXOPay</strong>.</li>';
      echo '    <li>Dicta al cajero el número de referencia en esta ficha para que tecleé directamete en la pantalla de venta.</li>';
      echo '    <li>Realiza el pago correspondiente con dinero en efectivo.</li>';
        echo '<li>Al confirmar tu pago, el cajero te entregará un comprobante impreso. <strong>En el podrás verificar que se haya realizado correctamente.</strong> Conserva este comprobante de pago.</li>';
       echo ' </ol>';
        echo '<div class="opps-footnote">Al completar estos pasos recibirás un correo de <strong>Nombre del negocio</strong> confirmando tu pago.</div>';
     echo ' </div>';
    echo '</div>  ';
  echo '</body>';
echo '</html>';

       echo "ID: ". $response->id;
        echo "<br>";
       echo "Payment Method:". $response->charges[0]->payment_method->service_name;
        echo "<br>";
      // echo "Reference: ". $response->charges[0]->payment_method->reference;
       echo "referencia Madre".$referencia;
       echo "<br>";
       echo "Reference: ".substr($referencia, 0,4).'-'.substr($referencia, 4,4).'-'.substr($referencia, 8,4).'-'.substr($referencia, 12,4); 
       echo "<br>";
       echo "$". $response->amount/100 . $response->currency;
       echo "<br>";
       echo "Order";
       echo $response->line_items[0]->quantity .
       "-". $response->line_items[0]->name .
       "- $". $response->line_items[0]->unit_price/100;
		
		} 
		catch (Exception $e) {
		  	// Catch all exceptions including validation errors.
		  	echo $e->getMessage(); 
		}
  }
	}




