<!-- header -->
<?php session_start(); ?>
<header class="header altura_header">
    <div class="container">

        <div class="logo grid-2">
            <a href="?p=home">
                <img src="img/logo_atacado_natal.png" alt="Logo Atacado Natal">
            </a>
        </div>
        <nav class="header-menu grid-10">

            <a href="?p=home">Home</a>
            <a href="?p=sobre">Sobre</a>
            <?php
            // if (@$_SESSION['usuario']) {
                
                ?>
                <a href="">Criar Conta</a>
             <?php 
            //  } else { 
                ?>
                <a href="">Log In</a>
            <?php 
            // }
            ?>




            </ul>
        </nav>
        <?php
            include("pesquisa_form.php");
        // include("verificalogin.php");

        ?>
    </div>
</header>