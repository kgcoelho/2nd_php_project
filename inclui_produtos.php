<div class="container">
<form> 
<form method="POST" class="contato-form grid-8" enctype="multipart/form-data">

<label for="nmproduto_form">*Nome do Produto</label>
<input type="text" name="nmproduto" value="<?=$produto?>" class="nmproduto_form" id="nmproduto_form"><br>

<label for="marcaproduto_form">*Marca</label>
<input type="text" name="marca" value="<?=$marca?>" class="marcaproduto_form" id="marcaproduto_form"><br>

<label for="categoriaproduto_form">*Categoria</label>
<select name="categoria" class="categoria_form" id="_form">
<option value="1">Árvores de Natal</option>
<option value="2">Enfeites</option>
<option value="3">Luzinhas</option>
</select>

<label for="precoproduto_form">*Preço</label>
<input type="text" name="preco" value="<?=$preco?>" class="precoproduto_form" id="precoproduto_form"><br>

</form>
</div>