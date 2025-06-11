<?php


/* oh dev, se liga. nesse aquivo vamos verificar se a pessoa está ou não cadastrada (para agendamento somente)
dependendo do resultado que vem no json, na chave condição, a pessoa é cadastrada no banco de usuarios (pessoa) 
ou segue para a página de agendamento*/




include_once '../classes/Pessoa.php';

$objConsultar = new Pessoa();

$cpf = md5($_POST['cpf']);

$dadoUsuario = $objConsultar->pesquisarCPF($cpf);

if (isset($_POST['esqueciSenha'])) {


    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');

    $dataVerificadora =  date('Y-m-d');
    $dataVerificadora=  md5($dataVerificadora);




    if ($dadoUsuario['condicao'] == 1) {



        ob_start();

?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

        </head>

        <body style="font-family: Arial, Helvetica, sans-serif;">
            <center>
                <h2>Olá. Somos do Sistema Agenda Fácil da Prefeitura de Guarulhos </h2>

                <h2>Você solicitou para alterar sua senha e vamos ajudá-lo por aqui. </h2>


                <a style="color: green;"
                    href="https://agendafacil.guarulhos.sp.gov.br/redefinirSenha.php?verifyT=<?=$dataVerificadora ?>&dwp=<?=$dadoUsuario['dados']['0']['idPessoas'] ?>&slash=<?=md5($dadoUsuario['dados']['0']['idPessoas']) ?>  " target="_blank">
                    <h4>Clique aqui para alterar sua senha com segurança</h4>
                </a>
                <br>

                Estamos á Disposição!

                <b>Equipe Agenda Fácil <br>
                    Prefeitura de Guarulhos</b>

                <img src="https://agendafacil.guarulhos.sp.gov.br/imgs/logoFacilTransparente.png" style="width: 10%;" />

            </center>
        </body>

        </html>
<?php
        $dados = ob_get_contents();
        ob_end_clean();



        include '../classes/Envio.php';

        $objEnvio = new Envio();

        $objEnvio->setDestinatario($dadoUsuario['dados']['0']['emailUsuario']);
        $objEnvio->setAssunto('Recuperação de Senha');
        $objEnvio->setConteudo($dados);

        if ($objEnvio->envioEmail()) {


            $nome = explode(' ', $dadoUsuario['dados']['0']['nomePessoa']);

            $nome = $nome[0];
            echo json_encode(array('retorno' => true, 'nome' => ucfirst($nome)));
            exit();
        } else {
            exit();
        }
    }
}




echo json_encode(array('retornoCondicao' => $dadoUsuario));
