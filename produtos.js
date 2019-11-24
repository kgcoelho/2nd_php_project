

var bt = document.getElementById('btSubmit');
var btSalvar =  document.getElementById('btSalvar');
btSalvar.style.display = 'none';
var form = document.getElementById('form1');
var mensagem = document.getElementById('dvProdutos');
var xhr = new XMLHttpRequest();

//////////////////////////
//inclusao
//////////////////////////
//funcao que chama o PHP por AJAX e envia os dados do form
bt.addEventListener('click', function(e){
    //funcao que formata os campos do form para serem enviados
    //esta funcao está definida no arquivo: serialize.js
    var dados = serialize(form);
    xhr.open('POST', 'inclui.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;charset=utf-8');
    xhr.send(encodeURI(dados));

    xhr.onreadystatechange = function() {
      if(xhr.readyState === 4) {
        //200 é o código do apache de página encontada  (404 não encontrado)
        if(xhr.status === 200) { 
        //testa a resposta do programa php, se for diferente de zero, mostra msg de erro
        if (xhr.responseText != '0'){
            alert('erro SQL' + xhr.responseText);
        }
        //console.log('Carregado');
        //recarrega a lista de produtos
        carregaProdutos();
        } else {
            alert('Erro na requisição: ' +  xhr.status + ' ' + xhr.statusText);
        } 
      }
    }
});


//////////////////////////
//// Listagem
//////////////////////////

///monta lista de produtos
//E1: string com os dados
//E2: id do elemento DOM de destino
//S: nada
function montaLista(dados,idDestino){
  //encontra a lista de destino <ul> no DOM pelo id
  var lt = document.getElementById(idDestino);
  //remove todo conteúdo da lista
  lt.innerHTML = '';
  //converte a string dados para um objeto JSON
  objJSON = JSON.parse(dados);
  //pega cada um dos itens do JSON 
  for (var i in objJSON){
      //cria uma variável contendo um elemento LI
      var div = document.createElement("div");
      div.className = 'dvLinha';
      //cria botao de excluir
      var botaoExclui = document.createElement("button");
      //adiciona a classe ao botao
      botaoExclui.className = 'excluir';
      //coloca o titulo do botao 
      botaoExclui.innerText = 'excluir';
      //coloca no atributo id do botao o codigo do produto
      botaoExclui.id= objJSON[i].procodig;
      //coloca os dados do objeto JSON no texto entre <li> </li>
      //decodeURI acert a acentuacao dos dados 
      div.innerText =  objJSON[i].procodig + ' ' +  decodeURI(objJSON[i].pronome)  + ' - ' + decodeURI(objJSON[i].promarca) + ' - ' + decodeURI(objJSON[i].catdescr);
      //cria o botao excluir de cada elemento da lista
      
      //atribui a funcao ao click do botao
      botaoExclui.addEventListener('click',function(e){
          //e.target.id contém o id do botão clicado
         //faz exclusao
         excluiProduto(e.target.id);  
      });

      //cria botao de alterar
      var botaoAltera = document.createElement("button");
      //adiciona a classe ao botao
      botaoAltera.className = 'alterar';
      //coloca o titulo do botao 
      botaoAltera.innerText = 'alterar';
      //coloca no atributo id do botao o codigo do produto
      botaoAltera.id= objJSON[i].procodig;
      
      //atribui a funcao ao click do botao
      botaoAltera.addEventListener('click',function(e){
          //e.target.id contém o id do botão clicado
         //faz exclusao
         carregaProduto(e.target.id);
         btSalvar.style.display = 'block';
         
         
      });
       //coloca o botao na lista
       div.appendChild(botaoExclui);
       div.appendChild(botaoAltera);
      //adiciona o novo div na div
      lt.appendChild(div);
  }
}

//E: nada
//S: nada
//carrega os produtos do banco por JSON
function carregaProdutos(){
  var request = new XMLHttpRequest();
  request.open('get', 'consulta.php');
  request.send();

  request.onreadystatechange = function() {
    if(request.readyState === 4) {
      //200 é o código do apache de página encontada  (404 não encontrado)
      if(request.status === 200) { 
        //chama a função que monta a lista de produtos
        montaLista(request.responseText,'lista');
      } else {
        alert('Erro na requisição: ' +  request.status + ' ' + request.statusText);
      } 
    }
  }
}

///////////////////////////
// exclusão
//////////////////////////
//E: codigo do produto
//S: nada
function excluiProduto(cod){
  var request = new XMLHttpRequest();
  request.open('get', 'exclui.php?cod=' + cod);
  request.send();

  request.onreadystatechange = function() {
    if(request.readyState === 4) {
      //200 é o código do apache de página encontada  (404 não encontrado)
      if(request.status === 200) { 
        //recarrega a lista
        carregaProdutos();
      } else {
          alert('Erro na requisição: ' +  request.status + ' ' + request.statusText);
      } 
    }
  }
}

//////////////////////
//alteracao
//////////////////////

//carrega um produto do banco de dados
function carregaProduto(cod){
  var request = new XMLHttpRequest();
  request.open('get', 'consulta_produto.php?cod=' + cod);
  request.send();

  request.onreadystatechange = function() {
    if(request.readyState === 4) {
      //200 é o código do apache de página encontada  (404 não encontrado)
      if(request.status === 200) { 
        //chama a função que monta a lista de produtos
        carregaDadosForm(request.responseText);
      } else {
        alert('Erro na requisição: ' +  request.status + ' ' + request.statusText);
      } 
    }
  }
}

//carrega os dados de um produto no form
function carregaDadosForm(dados){
  objJSON = JSON.parse(dados);
  var nome = document.getElementById('pronome');
  nome.value = decodeURI(objJSON.pronome);
  var marca = document.getElementById('promarca');
  marca.value = decodeURI(objJSON.promarca);
  var cod = document.getElementById('procodig');
  cod .value= objJSON.procodig;
  var categoria = document.getElementById('procateg');
  categoria.value = objJSON.procateg;
}


//grava a alteracao no banco da dados
btSalvar.addEventListener('click',function(){
   //funcao que formata os campos do form para serem enviados
    //esta funcao está definida no arquivo: serialize.js
    var dados = serialize(form);
    console.log(dados);
    xhr.open('POST', 'altera.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;charset=utf-8');
    xhr.send(encodeURI(dados));

    xhr.onreadystatechange = function() {
      if(xhr.readyState === 4) {
        //200 é o código do apache de página encontada  (404 não encontrado)
        if(xhr.status === 200) { 
        //testa a resposta do programa php, se for diferente de zero, mostra msg de erro
        if (xhr.responseText != '0'){
            alert('erro SQL' + xhr.responseText);
        }
        //console.log('Carregado');
        //recarrega a lista de produtos
        carregaProdutos();
        } else {
            alert('Erro na requisição: ' +  xhr.status + ' ' + xhr.statusText);
        } 
      }
    }
});


//carrega as categorias do banco
function carregaCategorias(){
  var request = new XMLHttpRequest();
  request.open('get', 'lista_categorias.php');
  request.send();

  request.onreadystatechange = function() {
    if(request.readyState === 4) {
        montaSelectCategorias(request.responseText,'procateg');
      } 
      else 
      {
        console.log('Erro na requisição: ' +  request.status + ' ' + request.statusText);
      } 
    
  }  
}

//monta a caixa select de categorias
function montaSelectCategorias(dados,idDestino){
  var select = document.getElementById(idDestino);
  var option = document.createElement("option");
  select.innerHTML= '';
  option.innerText =  "-----";
  option.value = '0';
  select.appendChild(option);
  objJSON = JSON.parse(dados);
  //pega cada um dos itens do JSON 
  for (var i in objJSON){
      option = document.createElement("option");
      option.innerText =  decodeURI(objJSON[i].catdescr);
      option.value = objJSON[i].catcodig;
      select.appendChild(option);
    }
   
}