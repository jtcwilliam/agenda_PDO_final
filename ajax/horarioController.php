<?php

// define o fuso horário padrão a ser usado.
date_default_timezone_set('UTC');


include_once '../classes/Adm.php';

$objAdm = new Adm();
//todas as variasveis vinda do post
$ultimoHorario = $_POST['ultimoHorario'];
$qtdeMesas = $_POST['qtdeMesas'];
$dataAgendamento = $_POST['dataAgendamento'];
$dataFinal = $_POST['dataFinal'];
$unidade = $_POST['selectUnidade'];
$i = 1;
$selectTipoAgendamento = $_POST['selectTipoAgendamento'];

//array que sera enviado para o banco
$envio = array();

//explodi a variavel para poder manipular a data
$dInicial = explode('/',  $dataAgendamento );

//manipulacao da data, primeiro ano, depois mes, depois dia
$diaInicial =  $dInicial[2].'-'.$dInicial[1].'-'.$dInicial[0];

echo 'dia hj'.$diaInicial;

//explodi a data final
$dFinal = explode('/',  $dataFinal );

//manipulacao data, primeiro ano, depois mes, depois dia
$diaFinal =  $dFinal[2].'-'.$dFinal[1].'-'.$dFinal[0];

 
//converter em formato de data
$date = new DateTime($diaInicial);
//echo $date->format('Y-m-d H:i:s');


 
//converter em formato de data
$dateFinal = new DateTime($diaFinal);
//echo $dateFinal->format('Y-m-d H:i:s');
 
//calcular a diferencia entre a data final e  a data inicial
$intervalo = $date->diff($dateFinal);

//formato esse valor de data para numeros
$dias =  $intervalo->format('%a');

  
echo date('Y-m-d', strtotime("+$dias days",strtotime($diaInicial))); 





exit();

//para cada mesa disponivel
while ($i <= $qtdeMesas) {
    $primeiroHorario = $_POST['primeiroHorario'];


    //o sistema cria o horário e insere no array
    while ($primeiroHorario <= $ultimoHorario) {

        $todos = array();

        $todos['data'] =  $dataAgendamento;
        $todos['hora'] = $primeiroHorario;
        $todos['unidade'] = $unidade;

        $todos['status'] = 7;
        $todos['protocolo'] = rand(1, 1907367) . '/2025';
        $todos['agendamento'] = $selectTipoAgendamento;

        array_push($envio, $todos);

        $primeiroHorario++;
    }


    $i++;
}


//aqui manda para a classe do banco inserir
if ($objAdm->inserirAgendamento($envio) == true) {
    echo json_encode(array('retorno' => true));
}
