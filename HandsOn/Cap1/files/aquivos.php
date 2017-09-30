<?php 

echo "<pre>";

// $file = fopen('teste.txt', 'r');

// $file = fopen('teste.txt', 'a+');
// fwrite($file, "--Abrindo arquivo; \r\n");

// var_dump($file);

// while (!feof($file)) {

// 	$line = fgets($file);

// 	$data = explode(';', $line);
// 	// var_dump($data);
// 	foreach ($data as $value) {
// 		echo $value;
// 	}
// }

echo (file_get_contents('teste.txt'));


file_put_contents('teste.txt', 'nova linha;', FILE_APPEND);