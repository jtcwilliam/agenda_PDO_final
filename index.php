<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<?php


include_once 'includes/head.php';

?>

<body>


    <div class="full reveal" id="modalSucesso" data-reveal style="background-color:#2C255B;">
        <div style="display: grid;  justify-content: center; align-content: center; height: 100vh; padding-top: 0px;">
            <center style="color: white;">
                <h2>Ótimas Notícias!<br> Seu Agendamento foi registrado com Sucesso</h2>
                <h1 class="protocoloAgendamento"></h1>
                <p class="lead"></p>
                <h4 style="font-style: italic;"><b>Dica: </b>Anote o Número <span class='protocoloAgendamento'></span>, ou tire um print dessa tela e leve no dia do agendamento! Ela Serve de protocolo para o atendimento! </h4>
                <h4 style="font-style: italic;"><b> Não esqueça de levar seu documento com foto para identificação! <br>
                        <br><a class=" button " style="width: 30%; border-radius: 16px;" href="https://portalfacil.guarulhos.sp.gov.br">Acessar o portal do Fácil</a></h4>



                <img src="imgs/logoGoverno-1024x240.jpg" style="width: 60%; padding-top: 10em;" :) />
            </center>

        </div>
        <button class="close-button" data-close aria-label="Close modal" type="button">
            <span aria-hidden="true">&times;</span>
        </button>

    </div>




    <div class="grid-container">


        <div class="grid-x grid-padding-x">
            <div class="auto cell"></div>
            <div class="small-4 cell large-2">
                <img src="imgs/logoFacilTransparente.png" style="width: 70%; margin-top: 30px;" />


            </div>
            <div class="auto cell"></div>
        </div>


        <div class="grid-x grid-padding-x">
            <div class="auto cell">

            </div>



            <div class="small-12 large-6 cell" id="exibiAgendamento">
                <br>

                <div id="todosContainers">

                    <!-- primeiro formulario, consulta cpf -->
                    <div class="grid-x grid-padding-x" id="loginCPF">

                        <div class="small-12 large-12 cell">
                            <form action="#">
                                <label style="font-weight: bold;"> Digite o CPF para Iniciar o Agendamento
                                    <input type="text" placeholder="Digite aqui seu CPF" class="cpf" id="cpf"
                                        onkeydown="mudarMascara(this.value)" required />
                                </label>
                                <input type="submit" class="button succes" href="#" onclick="consultarCPF($('#cpf').val(),0 )"
                                    style="width: 100%;" value="consultar">
                                <br>
                            </form>
                        </div>

                    </div>

                    <!-- segundo formulario, consulta inseere nome-->
                    <div class="grid-x grid-padding-x" id="nomeUsuario">
                        <div class="small-12 large-12 cell">
                            <label style="font-weight: bold;"> Vamos continuar seu agendamento! Digite seu nome por
                                favor
                                <input type="text" placeholder="Digite aqui seu Aqui" class="nomeAgendamento"
                                    id="nomeAgendamento" />
                            </label>
                            <a class="button succes" href="#" onclick="inserirUsuario()" style="width: 100%;">Seguir
                                para Agendamento</a>
                            <br>
                        </div>
                    </div>

                    <div class="grid-x grid-padding-x" id="campoMensagemAgendamentosAtivos">
                        <div class="small-12 cell large-12">
                            <br>
                            <center>
                                <h4>Olá. Você Ja possui <span id="valorAgendamentos"></span> agendamentos ativos</h4>
                                </h5> Após encerrar esses atendimentos, você poderá agendar novos Horários</h5>
                            </center>
                        </div>
                    </div>


                    <!-- aqui faz o agendamento -->

                    <div class="grid-x grid-padding-x" id="formularioAgendamento">
                        <div class="small-12 cell large-12">
                            <br>
                            <label class="labels"> CPF</label>
                            <input type="text" name="txtCPF" id="txtCPF" readonly />

                        </div>

                        <div class="small-12 cell large-12" style="display: none;">
                            <br>
                            <label>idUsuario</label>
                            <input type="text" name="txtIdUsuario" id="txtIdUsuario" readonly />

                        </div>

                        <div class="small-12 cell large-12">
                            <label> Nome </label>

                            <input type="text" name="txtNome" id="txtNome" value="" readonly />

                        </div>

                        <div class="small-12 cell large-12">

                            <label> Em qual Unidade você deseja ser atendido? </label>

                            <select id="selectUnidade" onchange="$('.comboHorarios').html('<option value=\'0\'>Selecione o dia acima para ver os horários</option>')   ;datasNaUnidade(0,0)">

                            </select>

                        </div>
                        <div class="small-12 cell large-12" id="aparecerDatas">

                        </div>




                        <div class="small-12 medium-12  large-12 cell" id="horaDIV">
                            <label>Que bom! Agora selecione a hora do seu Atendimento.</label>
                            <select class="comboHorarios" onchange="$('#tipoAgendamentoDiv').show();     $('#concluirDIV').show();">
                                <option value="0">Não Há horários para selecionar</option>

                            </select>
                        </div>

                        <div class="small-12 cell large-12" id="tipoAgendamentoDiv">
                            <label> Escolha o tipo de Atendimento </label>
                            <select class="selectTipoAgendamento">
                                <option value='1'>Atendimento da Prefeitura</option>
                                <option value='2'>Atendimento da Profissionais</option>

                            </select>

                        </div>


                        <div class="small-12 cell large-12">
                            <Br>

                            <a class="button  " onclick="registrarAgendamento()" id="concluirDIV"
                                style="width: 100%; background-color: #28536b; color: white;">
                                Concluir Agendamento
                            </a>



                        </div>




                    </div>




                    <div class="grid-x grid-padding-x" id="agendamentosRealizadosAtivos">
                        <div class="small-12 cell large-12">
                            <fieldset class="fieldset">
                                <Legend style="font-weight: 800;">Seus Agendamentos Ativos</Legend>

                                <div class="grid-x grid-padding-x" id="exibirAgendamentosAntigos"></div>



                        </div>
                        </fieldset>
                    </div>




                </div>





            </div>

            <div class="auto cell">

            </div>
            <?php

            include_once 'includes/footer.php';

            ?>
        </div>









    </div>

    <script>
        $(document).ready(function() {
            $('#nomeUsuario').hide();
            $('#formularioAgendamento').hide();
            $('#campoMensagemAgendamentosAtivos').hide();

            $('#agendamentosRealizadosAtivos').hide();
            $('#horaDIV').hide();
            $('#tipoAgendamentoDiv').hide();
            $('#concluirDIV').hide();



        })


        function consultarCPF(cpf, validador) {


            alert(cpf);
          

           
           
            if (cpf.length == 0 || cpf.length == 1) {
                alert('insira o seu cpf ou cnpj');
                return false;
            }



            if (cpf.length != 18 && cpf.length != 14) {
                alert('Seu Documento está com erro! Tente novamente');
                return false;
            }


            if (cpf.length == 14) {
                if (validaCPF(cpf) == false) {
                    alert('Seu Documento está com erro! Tente novamente');
                    return false;

                }


            } else if (cpf.length == 18) {
                if (validaCNPJ(cpf) == false) {
                    alert('Seu Documento está com erro! Tente novamente');
                    return false;

                }
            }

            
        
        console.log(validador);

            var formData = {
                cpf: cpf

            };
            var condicao;
            $.ajax({
                    type: 'POST',
                    url: 'ajax/verificadorController.php',
                    data: formData,
                    dataType: 'json',
                    encode: true
                })
                .done(function(data) {

                    condicao = data.retornoCondicao.condicao;
                    if (condicao == false) {
                        //condição retornou false, a pessoa não ta cadastrada, abre o nome para gravar
                        $('#loginCPF').hide();
                        $('#nomeUsuario').delay('fast').fadeIn();

                    } else {
                        //condição retornou true, então pode seguir para o agendamento. ta fa

                        $('#loginCPF').hide();
                        $('#nomeUsuario').hide();
                        $('#formularioAgendamento').show();


                        $('#txtNome').val(data.retornoCondicao.dados[0].nomePessoa);
                        $('#txtCPF').val(cpf);
                        $('#txtIdUsuario').val(data.retornoCondicao.dados[0].idPessoas);

                        comboUnidadesComum();
                        agendamentosAtivos(data.retornoCondicao.dados[0].idPessoas);



                    }

                });



            event.preventDefault();
        }

        function inserirUsuario() {

            var nomeUsuario = $('#nomeAgendamento').val();
            var cpf = $('#cpf').val();



            if (nomeUsuario.length < 3) {

                alert('Por Favor, insira um nome Válido!');

            } else {



                var formData = {
                    cpf: cpf,
                    nomeUsuario: nomeUsuario

                };
                var condicao;
                $.ajax({
                        type: 'POST',
                        url: 'ajax/inserirUsuarioController.php',
                        data: formData,
                        dataType: 'json',
                        encode: true
                    })
                    .done(function(data) {

                        console.log(data);



                        if (data.retorno == true) {
                             
                            consultarCPF(cpf, 1);
                        }

                    });
            }
            event.preventDefault();
        }



        function registrarAgendamento() {
            var comboHorarios = $('.comboHorarios').val();
            var selectUnidade = $('#selectUnidade').val();

            if (selectUnidade != 0) {
                if (comboHorarios != 0) {
                    var formData = {
                        registrarAgendamento: 1,
                        idUsuario: $('#txtIdUsuario').val(),
                        comboHorarios: comboHorarios,
                        selectUnidade: selectUnidade,
                        selectAgendamento: $('.selectTipoAgendamento').val(),
                        idStatus: '3'
                    };
                    var condicao;
                    $.ajax({
                            type: 'POST',
                            url: 'ajax/agendamentoController.php',
                            data: formData,
                            dataType: 'json',
                            encode: true
                        })
                        .done(function(data) {
                            if (data.retorno == true) {
                                $('#formularioAgendamento').hide();
                                $('#modalSucesso').foundation('open');
                                $('.protocoloAgendamento').html('Seu Protocolo: ' + $('.comboHorarios')
                                    .val());
                                agendamentosAtivos($('#txtIdUsuario').val());


                            }
                        });
                    event.preventDefault();
                } else {
                    alert("Você deve selecionar um horário para seu atendimento");
                }
            } else {
                alert("Você deve selecionar uma unidade para seu atendimento");
            }
        }






        /*
                           window.setTimeout(() => {
                               window.location =
                                   "https://portaleducacao.guarulhos.sp.gov.br/wp_site/facil/paginaInicial/#";
                           }, 4600);
                           */

        //https://portalfacil.guarulhos.sp.gov.br/paginaInicial/


        //retorno das datas disponiveis da unidade
    </script>
</body>

</html>