<!DOCTYPE html>
<html>
<head>
	<title>Pagamento Boleto</title>
</head>
<body>

	<form method="POST" action="#">

		<label>Data Vencimento</label>
		<input type="date" name="data_vencimento">

		<button type="submit">Pagar</button>
		
	</form>

</body>
</html>


<?php 

if (isset($_POST['data_vencimento'])) {

	$data_vencimento = dataing($_POST['data_vencimento']);


	$data_atual = new DateTime('2017-09-30 00:59');
	$hora_atual = strtotime(date('00:59'));

	$data_atual = new DateTime();
	$hora_atual = strtotime(date('H:i'));

	$hora_uma = strtotime('01:00');
	$hora_onze = strtotime('23:00');

	$data_vencimento = new DateTime($data_vencimento);

	echo "<pre>";

	// var_dump($data_atual);
	// var_dump($data_vencimento);
	// var_dump('hora_atual',$hora_atual);
	// var_dump('hora_uma',$hora_uma);
	// var_dump('hora_onze',$hora_onze);

	

	if ($data_vencimento < $data_atual ) {
		echo "<p>Boleto esta Vencido</p>";
			
		$dias_vencidos = $data_vencimento->diff($data_atual);
		// var_dump($dias_vencidos);

		echo "Esta vencido a: " . $dias_vencidos->format("%Y anos, %M meses, %D dias, %H horas, %I minutos");

	} elseif (($hora_atual > $hora_uma) && ($hora_atual <= $hora_onze)) {
		echo "<p>Boleto Pago!</p>";
	}
	else{
		echo "<p>Fora do horario de pagamento</p>";
	}
}


function dataing($databr)
{
 
	//explode a data recebida nas "/", separando dia, mes e ano
	$data = explode("/", $databr);

	//verifica se a data recebida é uma data valida utilizando a função checkdate
	$valida = checkdate((int)$data[1], (int)$data[0], (int)$data[2]);

	//"monta" a data no formato ingles (aaaa-mm-dd)
	$dataing = $data[2]."-".$data[1]."-".$data[0] . "23:59";
	 
	//Caso seja uma data valida ($valida == true), retorna a data no formato ingles
	if($valida)
	 	return $dataing;
	//Caso não seja uma data válida ($valida == false) retorna o valor falso
	else 
		return false;
 
}