<?php 

echo "<pre>";

$hora_uma = strtotime('01:00');
$hora_onze = strtotime('23:00');
// $data_pagamento = new DateTime('2017-09-30 00:59');
// 	$hora_pagamento = strtotime(date('00:59'));

$isAgendamento = false;
if (!isset($_POST["salvar"])) {
	$_POST["salvar"] = false;
}


if ($_POST["salvar"]) {
	if (!isset($_POST['data_pagamento'])) {
		$data_pagamento = new DateTime();
		$hora_pagamento = strtotime(date('H:i'));
	} else {
		$isAgendamento = true;
		$data_pagamento = dataing($_POST['data_pagamento']);
		$data_pagamento = new DateTime($data_pagamento);
		$hora_pagamento = strtotime(date('01:00'));
	}

	if (isset($_POST['data_vencimento'])) {
		$data_vencimento = dataing($_POST['data_vencimento']);
		$data_vencimento = new DateTime($data_vencimento);
	} else {
		$data_vencimento = dataing($data_pagamento);
		$data_vencimento = new DateTime($data_vencimento);

	}
	if (($data_vencimento->format('w') == 6 )) {
		$data_vencimento->add(new DateInterval('P2D'));
	}
	if (($data_vencimento->format('w') == 7 )) {
		$data_vencimento->add(new DateInterval('P1D'));
	}

	$dias_vencidos = $data_vencimento->diff($data_pagamento);

	if ($data_vencimento < $data_pagamento ) {
		
		if ($isAgendamento) {
			$msg =  "<p>Não podemos agendar nesta data!</p>";
			$class = "danger";
		} else {
			$msg =  "<p>Boleto esta Vencido</p>";
			$msg =  $msg . "<p>Esta vencido a: " . $dias_vencidos->format("%Y anos, %M meses, %D dias, %H horas, %I minutos</p>");
			$class = "danger";
		}

	} elseif (($hora_pagamento >= $hora_uma) && ($hora_pagamento <= $hora_onze)) {
		if ($isAgendamento) {
			$msg =  "<p>Boleto Agendado para pagamento no dia " . $data_pagamento->format('d/m/Y') . "</p>";
			$class = "success";
		} else {
			$msg =  "<p>Boleto Pago!</p>";
			$class = "success";

		}
		
	}
	else{
		$msg =  "<p>Fora do horario de pagamento</p>";
		$class = "danger";
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
echo "</pre>";
?>


<!DOCTYPE html>
<html>
<head>
	<title>Pagamento Boleto</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>
<div class="container">
		<div class="row">
			<div class="col-6 align-self-center">
				<form method="POST" action="#" class="form">

				<div class="form-group">
					<label>Data Vencimento</label>
					<input class="form-control" type="date" name="data_vencimento">
				</div>		

				<div class="form-group">
					<label>Agendar Data Pagamento</label>
					<input class="form-control" type="date" name="data_pagamento">
				</div>
					
				<input class="hidden" type="hidden" name="salvar" value="true">
					<button type="submit" class="btn btn-success">Pagar</button>
					
				</form>

				<div>
					<?php 
					if ($_POST["salvar"]){
						echo "<div class='alert alert-" . $class . "' role='alert'>" . $msg . "</div>";
					}					
					?>
				</div>
			</div>
		</div>	
</div>
</body>
</html>


