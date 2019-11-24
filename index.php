<?php

include ("funcoes.php");


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Atacado Natal</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon.ico">
</head>
<body>
    

<?php
include ("header.php");
?> 
<div class="container wrapper_content">

<?php
$pag="home";
$vetValidas = array ("sobre", "form_contato/form","pesquisa","alteracao_form","incluir_form","mensagem_adm/exibe_mensa");

if(isset($_GET['n'])){
   
   $pag = 'form_contato/form';
}
if(isset($_GET['m'])){
   
    $pag = 'alteracao_form';
 }
 if(isset($_GET['b'])){
   
    $pag = 'home';
 }
 if(isset($_GET['r'])){
   
   $pag = 'mensagem_adm/exibe_mensa';
}


if(isset($_REQUEST['p']))
{
$pag= $_REQUEST['p'];
}
include ($pag .".php");


?>
</div>
</body>

<?php
include ("footer.php");

?>
</html>