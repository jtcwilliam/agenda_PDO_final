<?php

$nome = 'Intadalável';

echo $nome;

exit();

$nome2= md5('Intadalável');

echo $nome.'<br>'.$nome2.'<br>';


 

if ($nome == $nome2) {
    echo 'igual';
}else
{
    echo 'erro final';
}