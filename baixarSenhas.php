<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<?php
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
include_once 'includes/head.php';

session_start();
 

$dadoTipoPessoa =     $_SESSION['usuarioLogado']['dados'][0]['idTipoPessoa'];
$responsavelPessoa =   $_SESSION['usuarioLogado']['dados'][0]['idUnidade'];

if ($_SESSION['usuarioLogado']['dados'][0]['idTipoPessoa'] != 5  &&  $_SESSION['usuarioLogado']['dados'][0]['idTipoPessoa'] != 4 && $_SESSION['usuarioLogado']['dados'][0]['idTipoPessoa'] != 3) {
    echo '<center><h1>Acesso Negado</h1> <h4>Você será redirecionado para a pagina inicial</h4></center>';


?>

    <script>
        window.setTimeout(() => {
            window.location =
                "logar.php";
        }, 4600);
    </script>

<?php


    exit();
}




?>

<body>

    <div class="reveal" id="adm_das_datas" data-reveal style="background-color:ivory">
        <div style="display: grid;  justify-content: center; align-content: center;   padding-top: 0px;">


            <div class="grid-x grid-padding-x" id="inforDatas">
                asd
            </div>

        </div>
        <button class="close-button" data-close aria-label="Close modal" type="button">
            <span aria-hidden="true">&times;</span>
        </button>

    </div>



    <?php

    $tipoUsuario = $_SESSION['usuarioLogado']['dados']['0']['tipoPessoa'];

    if ($tipoUsuario == '3') {
        include_once 'includes/linksAtendente.php';
    } else {
        include_once 'includes/linksAdm.php';
    }

    ?>

    <div class="grid-container">
        <div class="grid-x grid-padding-x">



            <div class="small-12 large-12 cell">







                <!-- liberação de datas para agendamento -->
                <fieldset class="fieldset">
                    <legend>
                        <h3>Check-In do Cidadão</h3>
                    </legend>

                    <form action="#">
                        <div class="grid-x grid-padding-x">





                            <div class="small-12 large-3 cell">
                                <label for="dadosEntrada">CPF OU CNPJ do Cidadão
                                    <input type="text" class="cpf" onkeydown="mudarMascara(this.value)" style="height: 2.8em;" placeholder="Digite o CPF ou CNPJ" />
                                </label>
                            </div>

                            <div class="small-12 large-2 cell">
                                <label for="qtdeMesas">&nbsp;<br>
                                    <input type="submit" class="button fundoBotoesTopo "
                                        style="height: 3em; width: 100%; color: white; font-weight: bold;"
                                        id="enviarHorarios" onclick="consultarDados($('.cpf').val())" value="Consultar" />
                                </label>
                            </div>

                        </div>
                        <div class="grid-x grid-padding-x">







                            <div class="small-12 large-7 cell">
                                <br>

                                <div class="grid-x grid-padding-x" id="agendamentosAtivosNoDia">

                                </div>

                            </div>





                        </div>
                    </form>
                </fieldset>
                <!-- todas as datas do agendamento disponível -->

            </div>

        </div>

    </div>

    <?php

    include_once 'includes/footer.php';

    ?>
    <script>
        $(document).ready(function() {


        })



        //função que o agendamento do usuario pesquisado por cpf ou cnpj
        function consultarDados(pesquisa) {
            var formData = {
                analiseDeDias: 1,
                envioDados: pesquisa,

                selectTipoAgendamento: '1'
            };
            var condicao;
            $.ajax({
                    type: 'POST',
                    url: 'ajax/analiticoDiasController.php',
                    data: formData,
                    dataType: 'html',
                    encode: true
                })
                .done(function(data) {
                    $('#agendamentosAtivosNoDia').html(data);
                });


            event.preventDefault();

        }

        function consultarDados_individual(docPessoa, idAgendamento) {
            var formData = {
                analiseDeDias_pesquisa: 1,
                docPessoa: docPessoa,
                idAgendamento: idAgendamento,

                selectTipoAgendamento: '1'
            };
            var condicao;
            $.ajax({
                    type: 'POST',
                    url: 'ajax/analiticoDiasController.php',
                    data: formData,
                    dataType: 'html',
                    encode: true
                })
                .done(function(data) {
                    $('#agendamentosAtivosNoDia').html();

                });


            event.preventDefault();

        }



        //função que o agendamento do usuario pesquisado por cpf ou cnpj
        function alterarStatusAgendamento(idAgendamento, idAcao) {
            var formData = {
                alterarStatusAgendamento: 1,
                idAgendamento: idAgendamento,
                idAcao: idAcao
            };
            var condicao;
            $.ajax({
                    type: 'POST',
                    url: 'ajax/analiticoDiasController.php',
                    data: formData,
                    dataType: 'json',
                    encode: true
                })
                .done(function(data) {

                    if (data.retorno == true) {

                        alert('Senha Baixada com Sucesso');


                        $('#agendamentosAtivosNoDia').html('<center><h4>Entregue a senha e encaminhe o cidadão ao atendimento</h4></center>');

                    }


                });


            event.preventDefault();

        }



        //carregar combo das unidades
        function comboUnidades() {

            var formData = {
                tipo: 1
            };

            $.ajax({
                    type: 'POST',
                    url: 'ajax/unidadeController.php',
                    data: formData,
                    dataType: 'html',
                    encode: true
                })
                .done(function(data) {
                    console.log(data);


                    $('#selectUnidade').html(data);

                });

        }
    </script>



</body>

</html>