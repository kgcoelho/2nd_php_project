
<div class="container">
<form>
<form method="POST" class="contato-form grid-8" enctype="multipart/form-data">

<label for="name_form">*Nome</label>
<input type="text" name="name" value="<?=$nome?>" class="name_form" id="name_form"><br>

<label for="sobrenome_form">*Sobrenome</label>
<input type="text" name="sobrenome" value="<?=$sobrenome?>" class="sobrenome_form" id="sobrenome_form"><br>
     
<label for="email_form">*Email</label>
<input type="text" name="email" value="<?=$email?>" class="email_form" id="email_form"><br>

<label for="telefone_form">Telefone</label>
<input type="text" name="telefone" value="<?=$telefone?>" class="telefone_form" id="telefone_form"><br>

<label for="senha_form">*Senha</label>
<input type="password" name="senha" value="<?=$senha?>" class="senha_form" id="senha_form"><br>

        <input type="submit" name="botao" value="Enviar" class="enviar_post_form botao_base">
        <input type="reset" name="botao" value="Cancelar" class="cancelar_post_form botao_base">
</form>
</div>