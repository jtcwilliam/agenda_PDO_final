<?php

 ini_set('display_errors',1);
  ini_set('display_startup_erros',1);
  error_reporting(E_ALL);
 
include_once '../classes/arquivo.php';

$objArquivo = new Arquivo();
 

 

 $file = file_get_contents($_FILES['arquivo']['tmp_name']);

 
 
 




$objArquivo->setArquivo($file);


$objArquivo->inserirArquivos();




?>