<?php


include 'Envio.php';

$objEnvio = new Envio();

$objEnvio->setDestinatario('viniciuscostapmg@gmail.com');
$objEnvio->setAssunto('Ve ai se recebe');
$objEnvio->setConteudo('Estamos   enviando a senha');

$objEnvio->envioEmail();