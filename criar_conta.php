<form>
        <div class="container grid-8">
                <form method="POST" class="contato-form grid-8" enctype="multipart/form-data">
                        <br>
                        <br>
                        <br>
                        <div class="group">

                                <input type="text" required name="nome" value="<?= @$nome ?>" class="nome_form" id="name_form">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Nome</label>
                        </div>

                        <div class="group">

                                <input type="text" name="sobrenome" value="<?= @$sobrenome ?>" class="sobrenome_form" id="sobrenome_form" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Sobrenome</label>
                        </div>

                        <div class="group">
                                <input type="text" name="email" value="<?= @$email ?>" class="email_form" id="email_form" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Email</label>
                        </div>

                        <div class="group">
                                <input type="tel" name="telefone" value="<?= @$telefone ?>" class="telefone_form" id="telefone_form" pattern="[0-9]{2}[0-9]{5}[0-9]{4}" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Telefone</label>
                        </div>

                        <div class="group">
                                <input type="password" name="senha" value="<?= @$senha ?>" class="senha_form" id="senha_form" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Senha</label>
                        </div>

                        <input type="submit" name="botao_login" value="Enviar" class="enviar_post_form botao_base">
                        <input type="reset" name="botao" value="Cancelar" class="cancelar_post_form botao_base">
                </form>
        </div>