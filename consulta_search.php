<?php

if ((@$_REQUEST['busca']) == 'ok') {
    if (isset($_REQUEST['textBusca'])) {
        @$busca = trim($_REQUEST['textBusca']);


        if ((strlen($busca) > 0)) {
            $sql = "select * from artigo where artTitul LIKE ?";
            $busca = "$busca" . "%";
            $vetorPars = array($busca);
            $resultado = fazConsultaSegura($sql, $vetorPars);
        }

        if (is_array(@$resultado) && $busca != '') {

            if (count($resultado) > 0) {

                foreach ($resultado as $item) {
                    include('template_post.php');
                }
            } else {
                echo ("Nenhum registro encontrado");
            }
        } else { //caso contrário mostra o erro retornado
            echo ("<pre>");
            print_r(@$resultado);
            echo ("</pre>");
        }
    }
}
