<?php


include 'Envio.php';

$objEnvio = new Envio();

$objEnvio->setDestinatario('jtcwilliam@gmail.com');
$objEnvio->setAssunto('Teste de envio de email');
$objEnvio->setConteudo('Estamos tesstando o envio de senha');

$objEnvio->envioEmail();