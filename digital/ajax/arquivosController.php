<?php

 
include_once '../classes/arquivo.php';

$objArquivo = new Arquivo();
 

 

 $file = file_get_contents($_FILES['arquivo']['tmp_name']);

 
 
 




$objArquivo->setArquivo($file);


$objArquivo->inserirArquivos();




?>