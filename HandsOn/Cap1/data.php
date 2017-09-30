<?php

echo '<pre>';

echo date('d/m/Y'); // formato, timestamp
echo '<br>';
echo date('d/m/y');

echo '<br>';
echo '<br>';

echo time(); // Hora atual

echo '<br>';
echo '<br>';

echo microtime(); // Booleano que fala se quer os segundos em float ou n

echo '<br>';
echo '<br>';

echo strtotime('now');
echo '<br>';
echo strtotime('next sunday');
echo '<br>';
echo strtotime("now"), "\n";
echo '<br>';
echo strtotime("10 September 2000"), "\n";
echo '<br>';
echo strtotime("+1 day"), "\n";
echo '<br>';
echo strtotime("+1 week"), "\n";
echo '<br>';
echo strtotime("+1 week 2 days 4 hours 2 seconds"), "\n";
echo '<br>';
echo strtotime("next Thursday"), "\n";
echo '<br>';
echo strtotime("last Monday"), "\n";

echo '<br>';
echo '<br>';

echo mktime(0,0,0,1,22,1990);

echo '<br>';
echo '<br>';

$data = new DateTime('2017-09-30');
$data->setDate(2017, 9,30);
$data->modify('+1 month');
$data->format('d-m-Y H:i:s');

var_dump($data);