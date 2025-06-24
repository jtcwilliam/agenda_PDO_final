<?php

include_once '../classes/Report.php';

$objReport = new Report();


if (isset($_POST['porDias'])) {

    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');



    //data inicial
    $dataInicial =  $_POST['diaInicial'];
    $dataInicial = explode('/', $dataInicial);
    $dataInicial = $dataInicial['2'] . '-' . $dataInicial['1'] . '-' . $dataInicial['0'] . ' 00:00:00';

    //data final
    $dataFinal =  $_POST['diaFinal'];
    $dataFinal = explode('/', $dataFinal);
    $dataFinal = $dataFinal['2'] . '-' . $dataFinal['1'] . '-' . $dataFinal['0'] . ' 23:59:59';


    $diasRetornar = $objReport->agendasEmGeral($dataInicial, $dataFinal);



?>




    <?php


    foreach ($diasRetornar as $key => $value) {
    ?>
        <table  >
            

                <tr style="background-color:rgb(220, 217, 217) " > 
                    <td colspan="4"><b>Dia: </b>  <?= $value['dia']; ?>. &nbsp; &nbsp; <b>Quantidade: </b>   <?= $value['qtde']; ?></td>
                     
                </tr>
            
            <tbody>
                <?php




                $analiticoDia = $objReport->consultaDia($value['dataformatada']);

                    echo '<tr>';
                foreach ($analiticoDia as $key => $value) {
                    # code...

                ?>
                    
                        <td style="width: 30%;"><b><?= $value['descricao']; ?> </b>  <br> <?= $value['qtde']; ?> </td>
                        
                    
                <?php
                }
                echo '</tr>';

                ?>



            </tbody>


        </table>
    <?php
    }
    ?>



<?php



}
