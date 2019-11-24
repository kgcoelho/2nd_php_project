<?php
//inclui o arquivo de conexao
include("conecta.php");

//atribui o valor $_REQUEST['nome'] à variável $nome
$nome = ($_REQUEST['pronome']);
//atribui os campos da data para a variável $nascimento
$marca = $_REQUEST['promarca'];

$categoria = $_REQUEST['procateg'];
//monta a consulta para inserir no banco
$sql = "insert into produtos (pronome,promarca,procateg) values ('$nome','$marca','$categoria')";
try {
	//$link foi criado no conecta.php
	//cria $consulta que é o objeto de consulta ao banco
	$consulta = $link->prepare($sql);
	//executa a consulta ao banco
	$consulta->execute();
	//tudo ok, retorna o valor 0 (não deu erro)
	echo (0);
}
catch(PDOException $ex){
	echo($ex->getMessage());
}

?>