<?php 

echo "<pre>";


if (!isset($_POST["salvar"])) {
	$_POST["salvar"] = false;
}

if (!isset($_POST["buscar"])) {
	$_POST["buscar"] = false;
}


$isFind = false;
if ($_POST["buscar"]) {

	$nome = $_POST["nome"];

	$file = fopen('bd.txt', 'r');
	while (!feof($file)) {
		
		$line = fgets($file);
		if ($line) {
			
			if (!$isFind) {
				$pessoa = explode(';',$line);

				if ($nome == $pessoa[0] && $pessoa[0] != 'NOME') {
					$isFind = true;
					$find_pessoa = array(
						'nome' => $pessoa[0],
						'sobrenome' => $pessoa[1],
						'idade' => $pessoa[2],
					 );
				}
			}
		}   
	}

	fclose($file);

}

if ($_POST["salvar"]) {


	if (!isset($_POST["nome"])) {
		$_POST["nome"] = "";
	}
	if (!isset($_POST["sobrenome"])) {
		$_POST["sobrenome"] = "";
	}
	if (!isset($_POST["idade"])) {
		$_POST["idade"] = "";
	}
	
	$data = "\r\n" . $_POST["nome"] .";". $_POST["sobrenome"] .";". $_POST["idade"];

	file_put_contents('bd.txt', $data , FILE_APPEND);

	$class  = "success";
	$msg    = "Cadastrado com Sucesso!";
}

$pessoas = array();

$file = fopen('bd.txt', 'r');
while (!feof($file)) {
	
	$line = fgets($file);

	$line = explode(';', $line);

	if ($line[0] != 'NOME') {
			$pessoa = array(
			'nome' => $line[0],
			'sobrenome' => $line[1],
			'idade' => $line[2],
		 );
		
		$pessoas[] = $pessoa;
	} 
}
fclose($file);

echo "</pre>";
?>


<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar Pessoa</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>
<div class="container">
		<div class="row">
			<div class="col-4">
				<form method="POST" action="#" class="form">

				<div class="form-group">
					<label>Nome</label>
					<input class="form-control" type="text" name="nome">
				</div>      

				<div class="form-group">
					<label>Sobrenome</label>
					<input class="form-control" type="text" name="sobrenome">
				</div>

				<div class="form-group">
					<label>Idade</label>
					<input class="form-control" type="number" name="idade">
				</div>
					
					<input class="hidden" type="hidden" name="salvar" value="true">

					<button type="submit" class="btn btn-success">Salvar</button>
					
				</form>

				<div>
					<?php 
					if ($_POST["salvar"]){
						echo "<div class='alert alert-" . $class . "' role='alert'>" . $msg . "</div>";
					}                   
					?>
				</div>
			</div>
			<div class="col-4">
				<form method="POST" action="#" class="form">
					<div class="form-group">
						<label>Buscar por Nome</label>
						<input class="form-control" type="text" name="nome">
					</div> 

					<input class="hidden" type="hidden" name="buscar" value="true">
					<button type="submit" class="btn btn-info">Buscar</button>
				</form>

				<?php if ($isFind): ?>
					<div>
						<div class="card">
					  	<div class="card-block">
						    <?php 

								echo "<p class='card-title'> Nome: {$find_pessoa['nome']} {$find_pessoa['sobrenome']} Idade: {$find_pessoa['idade']} anos</p>";

							 ?>
						</div>
						</div>							
					</div>
				<?php endif; ?>
			</div>
			<div class="col-4">
			<table class="table">
				<thead>
					<tr>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Age</th>
					</tr>
				</thead>
				<tbody>
					<?php 

						foreach ($pessoas as $pessoa) {
							
							echo "  <tr><td>{$pessoa['nome']}</td><td>{$pessoa['sobrenome']}</td><td>{$pessoa['idade']}</td></tr>";
						}

					?>
				</tbody>
			</table>
				
			</div>
		</div>  
</div>
</body>
</html>
