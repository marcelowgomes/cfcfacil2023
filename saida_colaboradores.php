<?php // CODIGO DA SESSION

if (!empty($_SESSION['id_user'])) {
} else {
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");
}
?>
<link rel="stylesheet" href="tabelas/style.css">
<style>
.pagination{
    display:inline-block;
    padding-left:0;
    margin:20px 0;
    border-radius:4px
}
.pagination>li{
    display:inline
}
.pagination>li>a,.pagination>li>span{
    position:relative;
    float:left;
    padding:6px 12px;
    margin-left:-1px;
    line-height:1.42857143;
    color:#337ab7;
    text-decoration:none;
    background-color:#fff;
    border:1px solid #ddd
}
.pagination>li:first-child>a,.pagination>li:first-child>span{
    margin-left:0;
    border-top-left-radius:4px;
    border-bottom-left-radius:4px
}
.pagination>li:last-child>a,.pagination>li:last-child>span{
    border-top-right-radius:4px;
    border-bottom-right-radius:4px
}
.pagination>li>a:focus,.pagination>li>a:hover,.pagination>li>span:focus,.pagination>li>span:hover{
    z-index:2;
    color:#23527c;
    background-color:#eee;
    border-color:#ddd
}
.pagination>.active>a,.pagination>.active>a:focus,.pagination>.active>a:hover,.pagination>.active>span,.pagination>.active>span:focus,.pagination>.active>span:hover{
    z-index:3;
    color:#fff;
    cursor:default;
    background-color:#337ab7;
    border-color:#337ab7
}
.pagination>.disabled>a,.pagination>.disabled>a:focus,.pagination>.disabled>a:hover,.pagination>.disabled>span,.pagination>.disabled>span:focus,.pagination>.disabled>span:hover{
    color:#777;
    cursor:not-allowed;
    background-color:#fff;
    border-color:#ddd
}
.pagination-lg>li>a,.pagination-lg>li>span{
    padding:10px 16px;
    font-size:18px;
    line-height:1.3333333
}
.pagination-lg>li:first-child>a,.pagination-lg>li:first-child>span{
    border-top-left-radius:6px;
    border-bottom-left-radius:6px
}
.pagination-lg>li:last-child>a,.pagination-lg>li:last-child>span{
    border-top-right-radius:6px;
    border-bottom-right-radius:6px
}
.pagination-sm>li>a,.pagination-sm>li>span{
    padding:5px 10px;
    font-size:12px;
    line-height:1.5
}
.pagination-sm>li:first-child>a,.pagination-sm>li:first-child>span{
    border-top-left-radius:3px;
    border-bottom-left-radius:3px
}
.pagination-sm>li:last-child>a,.pagination-sm>li:last-child>span{
    border-top-right-radius:3px;
    border-bottom-right-radius:3px
}
</style>

<?php /// ALUNOS
$sql = "SELECT * FROM colaboradores WHERE colaborador_cfc = '$user[user_empresa]' and colaborador_status = '1' and colaborador_lixeira = 1 order by colaborador_nome";
$exe = mysqli_query($conn, $sql);
?>


<div class="container"><h4>Fluxo de Caixa > Colaboradores > Saídas</h4>

      <div class="header_wrap">
        <div class="num_rows">
		
				<div class="form-group">
			 		<select class  ="form-control" name="state" id="maxRows">
						 						 <option value="10">10</option>
						 <option value="15">15</option>
						 <option value="20">20</option>
						
            
						</select>
			 		
			  	</div>
        </div>
        <div class="tb_search">
<input type="text" id="search_input_all" onkeyup="FilterkeyWord_all_table()" placeholder="Buscar" class="form-control">
        </div>
      </div>

      <table class="table mb-0 table-borderless " data-sorting="true" data-filter-container="#filter-form-container" data-paging-current="1" data-paging-position="right" data-paging-size="10">


<table class="table table-striped table-class table-borderless " id= "table-id">
  
	
<thead>
<tr class="userDatatable-header">
<th>
<span  class="userDatatable-title">Nome</span>
</th>
<th>
<span class="userDatatable-title">CNPJ/CPF</span>
</th>

<th>
<span class="userDatatable-title">Ações</span>
</th>
	</tr>
  </thead>
<tbody>
<?php while( $user = mysqli_fetch_array($exe)) { ?> 

	<tr>
		<td style="text-align: left">
<div class="userDatatable-inline-title">
<a href="nova_saida_colaborador/<?php echo $user['colaborador_id'] ?>" class="text-dark fw-500">
<h6><?php echo $user['colaborador_nome'] ?> </h6>
</a>
</div> </td>
		<td><div class="userDatatable-inline-title">
<a href="nova_saida_colaborador/<?php echo $user['colaborador_id'] ?>" class="text-dark fw-500">
<h6><?php echo $user['colaborador_cpf'] ?> </h6>
</a>
</div></td>
		
		<td>  <a href="nova_saida_colaborador/<?php echo $user['colaborador_id'] ?>" class="view">
                                          <i class="uil uil-plus"></i>
                                       </a></td>
	</tr>
	
  <?php } ?>
    <tbody>
</table>

<!--		Start Pagination -->
			<div class='pagination-container'>
				<nav>
				  <ul class="pagination">
				   <!--	Here the JS Function Will Add the Rows -->
				  </ul>
				</nav>
			</div>
      <div class="rows_count">Mostrando 11 para 20 de 91 registros</div>

</div> 
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
<script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'>
</script><script  src="tabelas/script.js"></script>