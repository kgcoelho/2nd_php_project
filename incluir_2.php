<?php
$produto = $marca = $preco = '';


if (($_POST['botao']) === 'Enviar') { 
    $produto = $_POST['pronome'];
    $marca = $_POST['promarca'];
    $preco = $_POST['propreco'];
 

    // $erros = validaForm($_POST, array(
        // 'titulo:texto:Titulo ',
        // 'texto:texto:Texto '
    // ));
    if ($erros != '') {

        echo ("Preencha todos os campos que são obrigatórios:<br> ");
        echo($erros);
        include_once("incluir_form.php");

    } else {
        // $tipoArquivoImagem = strtolower(pathinfo($imagem, PATHINFO_EXTENSION));
        // if ($tipoArquivoImagem != "jpg" && $tipoArquivoImagem != "png" && $tipoArquivoImagem != "jpeg"&& $tipoArquivoImagem != "gif"&& $tipoArquivoImagem != "PNG"&& $tipoArquivoImagem != "JPG"
        
        // ) {
    
        //     echo "Apenas JPG, JPEG, PNG e GIF são permitidos.<br>";
        //     $uploadOk = 0;
        // }
        // if ($uploadOk == 0) {
        //     echo "Problema fazendo upload<br>";
    
        // } else {
    
    
    
    
            $id = 0;
            $sql = "INSERT INTO `produtos` (`pronome`,`promarca`,`propreco`,) VALUES (?,?,?);";
            $retorno = fazConsultaSegura($sql, array($produto,
                $marca,
                $preco), $id);
    
            echo ("Sem erros. <hr>");
    
            // if ($imagem) {
            //     include "upload.php";
    
            // }
            // $sql = "UPDATE `produtos` SET `artImage` = ? WHERE `artCodig` = ?";
                        // $retorno = fazConsultaSegura($sql,array(
                        // $arquivo,
                        // $id));
            header("Location: index.php");
    // }
    }

} else if ($_REQUEST['botao'] == 'Inserir') {
    include "inclui_produtos.php";
}
else if ($_REQUEST['botao'] == 'Cancelar') {
    header("Location: index.php");
}
