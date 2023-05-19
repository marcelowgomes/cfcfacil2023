<?php // CODIGO DA SESSION

if (!empty($_SESSION['id_user'])) {
} else {
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");
}

include_once 'bd/conexao.php';

?>




<div class="container-fluid">
    <div class="header">
        <h1>Fluxo de Caixa</h1>
        <p class='mt-3'>Escolha uma opção abaixo</p>
        <div class='mt-3 d-flex'>
            <a href="entrada"><button class="btn btn-success">Entrada</button></a>
            <a href="#" class="link" data-bs-toggle="modal" data-bs-target="#modal-saida">
<button class='btn btn-danger mx-2'>Saída</button></a>
        </div>
    </div>
</div>


<!-- INICIO MODAL OUTRAS  -->

<div class="modal-basic modal fade show" id="modal-saida" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-md" role="document">
   <div class="modal-content modal-bg-white ">
      <div class="modal-header">



         <h6 class="modal-title">Fluxo Caixa - Saída</h6>
         
      </div>
      <div class="modal-body">
<label> <strong> Informe a incidência dessa saída  </strong> </label> <br>
<div class="row">




<div class="row">

<div class="col-auto">
<a href="saida_alunos"><button class="btn btn-info">Alunos</button></a>
</div>

<div class="col-auto">
<a href="saida_fornecedores"><button class="btn btn-primary">Fonecedores</button></a>
</div>

<div class="col-auto">
<a href="saida_colaboradores"><button class="btn btn-warning">Colaboradors</button></a>
</div>

<div class="col-auto">
<a href="saida_veiculos"><button class="btn btn-success">Veículos</button></a>
</div>

</div></div></div>




      <div class="modal-footer">
         <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Fechar</button>
      </div>
   </div>
</div>

</div>

                   <!-- FIM MODAL OUTRAS  -->