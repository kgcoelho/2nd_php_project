<?php
include("conecta.php");

$sql = "select * from produtos,categorias where procateg = catcodig order by procodig";
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
	while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
		array_push($vetResposta,$registro);
	}
	echo(json_encode($vetResposta));

}
catch(PDOException $ex){
	echo($ex->getMessage());
}

?>