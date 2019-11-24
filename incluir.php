<?php

$nome = $sobrenome  = $email = $telefone = $senha = '';

if (($_POST['botao']) === 'Enviar') { 
    $nome = $_POST['clinome'];
    $sobrenome = $_POST ['clisobrenome'];
    $email = $_POST['cliemail'];
    $telefone = $_POST['clitelefone'];
    $senha = $_POST['clisenha'];
}

$erros = validaForm($_POST, array(
    'titulo:texto:Titulo ',
    'texto:texto:Texto '

));
if ($erros != '') {

    echo ("Preencha todos os campos que são obrigatórios:<br> ");
    echo($erros);
    include_once("inclui_cadastro.php");
}
 else {
    $id = 0;
    $sql = "INSERT INTO `clientes` (`clinome`,`clisobrenome`,`cliemail`, `clitelefone`, `clisenha`) VALUES (?,?,?,?,?);";
    $retorno = fazConsultaSegura($sql, array($,
        $texto,
        $imagem,
        $posicao), $id);
 }