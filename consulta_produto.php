<?php
include("conecta.php");

$cod = $_REQUEST['cod'];

$sql = "select * from produtos where procodig=$cod";
//-----------------------------

try {
	//$link foi criado no conecta.php
	$consulta = $link->prepare($sql);
	$consulta->execute();
	//enquanto tem registros disponíveis 
	//na consulta, copia cada um deles 
	//para o vetor associativo $registro e guarda no vetor 
	//que será usado para resposta
	$vetResposta = array();
	$registro = $consulta->fetch(PDO::FETCH_ASSOC);
 	echo(json_encode($registro));

}
catch(PDOException $ex){
	echo($ex->getMessage());
}
