<?php
//funcoes.php

//---------------------------------------
//E:matriz com os dados da tabela
//S:nada
function geraTRs($matrizColunas){
	foreach ($matrizColunas as $linha) {
		//limpa a variavel para cada linha
		$html = "";
		abreTag("tr");
		foreach ($linha as $dado) {
			//concatena pares de valores $atributo="$valor" em $html
			$html .= "<td>$dado</td>";
		}
		echo($html);
		fechaTag("tr");
		//nova linha para formatar o código fonte
		echo("\n");
	}
}


//---------------------------------------
//E0: nome da tag
//E1: vetor associativo de atributos
//S: nada
//exemplo de chamada desta funçao
//abreTag("textarea",array("rows"=>"80",
//						   "cols"=>"50",
//						   "name"=>"mensagem"	
//							));
function abreTag($tag,$vet=array()){
   echo("<$tag");
   if (count($vet) > 0) {
	foreach($vet as $atrib => $valor){
		echo(" $atrib='$valor'");
	}
   
	}
echo(">\n");
}

//---------------------------------------
//E: nome da tag
//S: nada
function fechaTag($tag){
	echo ("</$tag>");
}



function fazconexao(){
    $stringDeConexao = 'mysql:host=localhost;charset=utf8;dbname=cadastro;';
    $usuario = 'root';
    $senha = '';
    try{
        $link = new PDO($stringDeConexao,$usuario,$senha,
                    array(
                        PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                        PDO::ATTR_PERSISTENT => false
                    )
                );
        return($link);
        } 
    catch(PDOException $ex){
    die($ex->getMessage());
    }

}

function fazConsultaSegura($sql,$parametros=array(),&$id=-1){
    try {
        $conexaoBD = fazConexao();
        $consulta = $conexaoBD->prepare($sql);
        
        if (count($parametros) > 0) { 
            for($i=0;$i<count($parametros); $i++){
                $consulta->bindParam($i+1,$parametros[$i]);
            }
           
        }
        $consulta->execute();
        
        if ($id == 0) {
            $id = $conexaoBD->lastInsertId();
        }

        $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return($resultados);
    }
    catch (PDOException $e) {
        return($e);
    }
}


function validaForm($vetorDados, $vetorValidacao) {
    $erros = '';
    for ($i=0; $i<count($vetorValidacao); $i++){
        $vetItemValid = explode(":",$vetorValidacao[$i]);
        $campo = $vetItemValid[0];
        $tipo = $vetItemValid[1];
        $mensagem = $vetItemValid[2];
        //testa se campo deve ser validado
        if(array_key_exists($campo,$vetorDados) === true){
            $valor = trim($vetorDados[$campo]);
            switch($tipo) {
                case 'texto' :
                if (strlen($valor) == 0) {
                    $erros .=  $mensagem . "<BR>";
                }
                break;
                case 'email' :
                if (!filter_var($valor, FILTER_VALIDATE_EMAIL)) {
                    $erros .=  $mensagem . "<BR>";
                }
                break;
            }

        }
        
    }
return($erros);
}

function resumeTexto($texto,$numPal){
    $vetor = explode(" ",$texto);
    if (count($vetor) < $numPal) 
        $numPal = count($vetor);
    $texto = '';
    for($i=0; $i< $numPal; $i++){
        $texto .= $vetor[$i] . " ";
    }
    return($texto);
}

?>