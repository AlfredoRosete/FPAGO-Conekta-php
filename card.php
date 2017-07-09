<html>
	<head>
		<title>PHP-Conekta</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />		
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="https://conektaapi.s3.amazonaws.com/v0.3.2/js/conekta.js"></script>	
		<script type="text/javascript" src="conekta-ajax.js"></script>
		<style type="text/css">
		h1{
			font-size: 22px;
		}

		#donations{
			overflow: hidden;
		}

		.column{
			width: 30%;
			float: left;
		}
		</style>
	</head>
	<body>
										
	<div id="donations">
		<!--Tarjeta -->


	<div class="column" id="card">
			<h1>Tarjeta Credito/Debito</h1>
			<form action="" method="POST" id="payment-form" > 
				<p><input type="text" size="41" id="amount_card" placeholder="Monto" value="200" /></p>
				<p><input type="text" size="41" length="100" id="name_card" placeholder="Nombre Completo del Tarjetahabiente"  value="alfredo" /></p>
				<p><input type="text" size="41" length="20" id="number_card" placeholder="Numero de Tarjeta"  value="4242424242424242" /></p>
				<p><input type="text" size="4" length="3" id="cvc_card" placeholder="CVC"  value="456" /></p>
				<p><input type="text" size="2" length="2" id="exp_month_card" placeholder="MM" value="12" />/<input type="text" size="4" length="2" id="exp_year_card" placeholder="YY" value="2017" /></p>
				<p><input type="button" id="submit" value="Completar Donativo" onclick="send_payment_card()"></p>
			</form>
		</div>	

									
	</div>
									

	</body>
</html>

