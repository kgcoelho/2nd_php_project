<!-- header -->
<?php session_start(); ?>
<header class="header altura_header">
    <div class="container">

        <div class="logo grid-2">
            <a href="?p=home">
                <img src="img/logo_atacado_natal.png" alt="Logo Atacado Natal">
            </a>
        </div>
        

        <?php
            include("pesquisa_form.php");
        // include("verificalogin.php");

        ?>
        <nav class="header-menu grid-4">
            <?php
             if (@$_SESSION['email']) {
                
                ?>
                <a href="?p=home">Sair</a>
             <?php 
            } else { 
                ?>
                <a href="?p=criar_conta">Login ou Cadastre-se</a>
                
            <?php 
            }
            ?>




            </ul>
        </nav>
        
    </div>
</header>