<!-- criar separado no incluir_form -->
<!-- criar um botao que chame a inclusao -->

<!-- na home tem que aparecer os posts, e embaixo ou outro lugar q tu quiser colocar tem que ter o botão de alterar e de excluir -->
 <?php 

 if (@$_SESSION['email']) {
     ?>
     <form method="post" class="form_crud_add">
         <input type="submit" name="botao" value="Inserir" class="botao_base botao_inserir_post">
     </form>
     <?php
      if (isset($_REQUEST['botao']) == 'Inserir') {
           include "incluir.php";
       }
       if (isset($_GET['b'])) {
           include "incluir.php";
        }
       ?> <hr> <?php
     }
    
    $sql = "SELECT * FROM `produtos` ORDER BY `procodig` asc";
    $retorno = fazConsultaSegura($sql);

    if (@$_REQUEST['busca'] == 'ok') {
        include("produtos.php");
    } 
    ?>



        <form method="post" class="form_crud_normal">
                    <h2 class='title-show'>
                        <?= @$item['pronome']; ?>
                    </h2>
                    <p class="brand-show">
                        <?= @$item['promarca']; ?>
                    </p> 
                
                    <p class="text-show">
                        <?= @$item['propreco']; ?>
                    </p>
                
                <!-- arrumar -->
                <?php
                        if (@$item['artImage'] != null) {
                            ?>
                    
                        <img class="imagem_post" src="upload/<?= $item['artImage']; ?>" alt="imagem do post">
                        <br>
                <?php }
                        ?>
                <!--  -->
        </form>
        <!-- <form action="post.php" class="form_crud" method="POST">
            <button type="submit" name="ver" value="" class="ver_post_botao botao_base">Ver Post</button>
        </form> -->
        <?php
                if (@$_SESSION['email']) {
                
                    ?>
                      <form action="post.php" class="form_crud" method="POST">
            <button type="submit" name="ver" value="<?= $item['artCodig']; ?>" class="ver_post_botao botao_base">Ver Post</button>
        </form>
            <form action="alteracao_form.php" class="form_crud" method="POST">
                <button type="submit" name="alterar" value="<?= $item['artCodig']; ?>" class="altera_botao botao_base">Alterar</button>
            </form>
            <form action="teste-excluir.php" class="form_crud" method="POST">
                <button type="submit" name="excluir" value="<?= $item['artCodig']; ?>" class="exclui_botao botao_base">Excluir</button>
            </form>
            <hr>
 <?php
         }
    

?> 