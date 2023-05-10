
<!DOCTYPE html>
<html>
<head>
    <style>
           body{
    background: orange;
}
*{
    margin: 0;
    padding: 0;
    color: black;
}
h1{
    margin-bottom: 20px;
    text-align: center;
}
button{
    padding:4px;
}
.container{
    width: 70%;
    margin-right: auto;
    margin-left: auto;
}
.content{
    margin-bottom: 10px;
    display: flex;
}
.sanduiche{
    margin-bottom: 10px;
    display: flex;
}
.content > input{
    width: 100%;
    height: 25px;
    border: solid 1px;
    background: white;
    color: black;
    border: 0px;
    border-radius: 2px;
    margin-left: 10px;
}
.content > textarea{
    width: 100%;
    border: solid 1px;
    background: white;
    color: black;
    border: 0px;
    border-radius: 2px;
    margin-left: 10px;
}
#fone{
    height: 70px;
}
.sanduiche > label{
    margin-right: 15px;
}
.sanduiche > select{
    width: 30%;
    height: 25px;
    margin-right: 15px;
}
.sanduiche > input{
    width: 30%;
    height: 25px;
    border: solid 1px;
    background: white;
    color: black;
    border: 0px;
    border-radius: 2px;
}
#qtd{
    margin-right: 10px;
}
.adicionados{
    border: solid 2px white;
}
.rowtabela{
    display: flex;
}
.item{
    margin-right: 15%;
    margin-left: 15%;
}
.enviar{
    width: 100%;
    margin-top: 5px;
}
    </style>
    <script src="/scripts/snippet-javascript-console.min.js?v=1"></script>
</head>
<body>
        <div class="container">
        <h1>Faça seu pedido</h1>
        <form action="@" method="get">
            <div class="content">
                <label for="">Nome: </label>
                <input id="nome" type="text">
            </div>
            <div class="content">
                <label for="">Fone: </label>
                <textarea name="textarea" cols="40" rows="5"></textarea>
            </div>
            <div class="content">
                <label for="">Endereço: </label>
                <input id="endereco" type="text">
            </div>
            <div class="sanduiche">
                <label for="">Pedido</label>
                <select name="" id="pedido">
                    <option value="n001">Pedido Doidao 001</option>
                    <option value="n002">Pedido Doidao 002</option>
                    <option value="n003">Pedido Doidao 003</option>
                    <option value="n004">Pedido Doidao 004</option>
                </select>
                <label for="">Pão</label>
                <select name="" id="pao">
                    <option value="pao1">Pão 1</option>
                    <option value="pao2">Pão 2</option>
                    <option value="pao3">Pão 3</option>
                    <option value="pao4">Pão 4</option>
                </select>
                <label for="">Quantidade</label>
                <input id="qtd" type="number">
                <button type="button" onclick="adicionar()">Adicionar</button>
            </div>
        </form>
        <div class="adicionados" id="tabela">
            <div class="rowtabela">
                <div class="item">
                    <b>Quantidade</b>
                </div>
                <div class="item">
                    <b>Sanduíche</b>
                </div>
                <div class="item">

                </div>
            </div>
            <div class="rowtabela" id="1">
                <div class="item">
                    20
                </div>
                <div class="item">
                    Sanduíche Brabissimo
                </div>
                <div class="botao">
                    <button onclick="remover(this)">X</button>
                </div>
            </div>
        </div>
        <button type="submit" class="enviar">Enviar</button>
    </div> 
    <script type="text/javascript">
        function adicionar(){
  
   var tabela = document.getElementById('tabela');
   var tp = document.getElementById("pedido");
   tp = tp.options[tp.selectedIndex].textContent;
   var qtd = document.getElementById("qtd").value;
   
   var ped_id = document.body.querySelectorAll(".rowtabela").length;
   
   var novo_item = '<div class="rowtabela" id="'+ped_id+'">'
   +'<div class="item">'+qtd+'</div>'
   +'<div class="item">'+tp+'</div>'
   +'<div class="botao">'
   +'<button onclick="remover(this)">X</button>'
   +'</div></div>';
   
   tabela.innerHTML += novo_item;
   
}

function remover(e){
   e.parentNode.parentNode.outerHTML = '';
}
    </script>
</body>
</html>