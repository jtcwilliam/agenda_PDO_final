<?php

include_once '../classes/Pessoa.php';

require_once '../classes/LDAP.class.php';

$objPessoaMovimentar = new Pessoa();
$ldap = new LDAP();

//esse script apenas grava a pessoa

$emailUsuario = $_POST['usuario'];
$senha = $_POST['pwd'];




$usuario = $ldap->logar($emailUsuario, $senha);



if (isset($usuario['count'])  && $usuario['count'] == 1) {


    $objPessoaMovimentar->setEmailUsuario($emailUsuario);

    if ($dadosPessoa = $objPessoaMovimentar->logarPessoa()) {

 

        //se condição true, pode logar

        if ($dadosPessoa['condicao']) {
            session_start();
            $_SESSION['usuarioLogado'] = $dadosPessoa;
            echo json_encode(array('retorno' => true, 'dadosUsuario' => $dadosPessoa));
        } else {
            echo json_encode(array('retorno' => false));
        }



        //se condição false, retorna erro

    }
}





/*



if (isset($usuario['count'])  && $usuario['count'] == 1) {



$objPessoaMovimentar->setDocumentoPessoa($_POST['usuario']);

$objPessoaMovimentar->setSenha(md5($_POST['pwd']));




if ($dadosPessoa = $objPessoaMovimentar->logarPessoa()) {
 
    //se condição true, pode logar

    if ($dadosPessoa['condicao']) {
        session_start();
        $_SESSION['usuarioLogado'] = $dadosPessoa;
        echo json_encode(array('retorno' => true, 'dadosUsuario' => $dadosPessoa));
    } else {
        echo json_encode(array('retorno' => false));
    }



    //se condição false, retorna erro

}

*/