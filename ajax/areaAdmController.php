<?php

if (!isset($_SESSION)) {
    session_start();
}

include_once '../classes/Datas.php';
include_once '../classes/Agendamento.php';
include_once '../classes/Unidade.php';




$objAgendamento = new Agendamento();
$objDatas = new DatasAgendamento();
$objUnidade = new Unidade();




//responsavel por pesquisar os dias, em cada unidade
if (isset($_POST['verificarDatasPorUnidade'])) {
 
        $agendamentos = $objDatas->trazerHorariosAdmPorUnidade($_POST['unidadeUsuario']);
            
?>



        <div class="small-12 large-12 cell">
             
               
                 
                <div class="grid-x grid-padding-x">
                    <?php


                    foreach ($agendamentos as $key => $value) { ?>
                        <div class="small-12 large-2 cell">
                            <a class="button fundoBotoesTopo "
                                style="height: 3em; width: 100%; color: white;  border-radius: 10px;" id="enviarHorarios" data-open="adm_das_datas"
                                onclick="verificarDatasUnidadeSuperAdm(<?=$_POST['unidadeUsuario']  ?>,'<?= $value['dia']  ?>' )"><?= $value['dia']  ?></a>
                        </div>
                    <?php
                    }  ?>
                </div>
             
        </div>


    <?php
    






    exit();
}
