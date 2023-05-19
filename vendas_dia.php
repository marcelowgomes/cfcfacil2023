<?php 
if (!empty($_SESSION['id_user'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: logar.php");
}

?>

 
       
          
      

         <div class="container-fluid">
            <div class="profile-content mb-50">
               <div class="row">
                  <div class="col-lg-12">

                     <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title"><i class="uil uil-list-ul"></i> Relatórios / Financeiro /  Movimentação do Dia</h4>
                        <div class="breadcrumb-action justify-content-center flex-wrap">
                           <nav aria-label="breadcrumb">
                           <div class="ap-button button-group d-flex justify-content-center flex-wrap">                                    
                                 </div>


                               

                           </nav>
                        </div>
                     </div>

                  </div>
                  
                  






<br><br>
         <div class="userDatatable adv-table-table global-shadow border-light-0 w-100 adv-table">
                  <div class="table-responsive">
                     <div class="adv-table-table__header">
                       
                        <div class="adv-table-table__button">
                      
                        </div>
                     </div>
                     <div id="filter-form-container"></div>

<table class="table mb-0 table-borderless" data-sorting="true" data-filter-container="#filter-form-container" data-paging-current="1" data-paging-position="right" data-paging-size="10">
                        <thead>
                           <tr class="userDatatable-header">
                              
                          
                              <th>
                                 <span class="userDatatable-title">Tipo</span>
                              </th>
                              <th>
                                 <span class="userDatatable-title">Data</span>
                              </th>
                              <th>
                                 <span class="userDatatable-title">Para</span>
                              </th>
                              <th>
                                 <span class="userDatatable-title">Ação</span>
                              </th>
                              <th>
                                 <span class="userDatatable-title">Colaborador</span>
                              </th>

                             
                              <th>
                                 <span class="userDatatable-title">Valor</span>
                              </th>
                            
                             
                              
                           </tr>
                        </thead>
                  

   

<?php
$sqla = "SELECT * FROM caixa c where caixa_cfc = $user[user_empresa] and caixa_estorno = '1' order by caixa_data desc    ";
$exea = mysqli_query($conn, $sqla);
while( $caixa = mysqli_fetch_array($exea)) {


/// DADOS ALUNOS
$sqlaluno = "SELECT * FROM alunos WHERE aluno_id = '$caixa[caixa_aluno]'  ";
$exealuno = mysqli_query($conn, $sqlaluno);
$aluno = mysqli_fetch_array($exealuno);

$partes2 = explode(' ',$aluno[aluno_nome]);
$primeiroNome = array_shift($partes2);
$ultimoNome = array_pop($partes2);

mysqli_close($sqlaluno);


/// DADOS COLABORADORES
$sqlcolaborador = "SELECT * FROM colaboradores WHERE colaborador_id = '$caixa[caixa_colaborador]'  ";
$execolaborador = mysqli_query($conn, $sqlcolaborador);
$colaborador= mysqli_fetch_array($execolaborador);

$partes2c = explode(' ',$colaborador[colaborador_nome]);
$primeiroNomec = array_shift($partes2c);
$ultimoNomec = array_pop($partes2c);

mysqli_close($sqlcolaborador);

/// DADOS FORNECEDORES  
$sqlfornecedor = "SELECT * FROM fornecedores WHERE fornecedor_id = '$caixa[caixa_fornecedor]'  ";
$exefornecedor = mysqli_query($conn, $sqlfornecedor);
$fornecedor= mysqli_fetch_array($exefornecedor);

$partes2f = explode(' ',$fornecedor[fornecedor_nome]);
$primeiroNomef = array_shift($partes2f);
$ultimoNomef = array_pop($partes2f);

mysqli_close($sqlfornecedor);

/// DADOS VEICULOS  
$sqlveiculo = "SELECT * FROM veiculos WHERE id_veiculo = '$caixa[caixa_veiculo]'  ";
$exeveiculo = mysqli_query($conn, $sqlveiculo);
$veiculo= mysqli_fetch_array($exeveiculo);

mysqli_close($sqlveiculo);


?> 



<tbody>      
<tr>

<td>
 <?php if ($caixa[caixa_aluno] <> '') { ?> A<?php } ?>
 <?php if ($caixa[caixa_colaborador] <> '') { ?> C<?php } ?>
 <?php if ($caixa[caixa_fornecedor] <> '') { ?> F<?php } ?>
 <?php if ($caixa[caixa_veiculo] <> '') { ?> V<?php } ?>

</td>
                              <td>
                                 <div class="d-flex">
                                    <div class="userDatatable-inline-title">
                                       
                                          <h6>  <?php echo date('d/m/Y', strtotime($caixa[caixa_data])); ?> </h6>
                                      
                                    </div>
                                 </div>
                              </td>

                              <td>
<div class="userDatatable-inline-title">
<h6><?php echo $primeiroNome; ?> <?php echo $ultimoNome; ?>
<?php echo $primeiroNomec; ?> <?php echo $ultimoNomec; ?>
<?php if (caixa_veiculo <> '') {  ?> <?php echo $veiculo[placa_veiculo];  ?>   <?php } echo $primeiroNomef; ?> <?php echo $ultimoNomef; ?>


</h6>
</div>                  

                                 </td>


                              <td>
                              <?php if ($caixa[caixa_tipo] == 'Entrada') { ?> 
                                    <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">Entrada</span>
                                  
                                    <?php  } ?> 

                                    <?php if ($caixa[caixa_tipo] == 'Saida') { ?> 
                                       
                                      
                                       <span class="bg-opacity-danger  color-danger rounded-pill userDatatable-content-status active">Saida</span> 
                                   
                                       
                                       <?php } ?>
                              </td>



                              <td>
                                 <div class="userDatatable-content">
                                Colaborador




                                 
                                 </div>
                              </td>
                              
                            
                             
                              

                              <td>



R$ <?php echo $caixa[caixa_total] ?>
                        
                        
                        </td>
                              
                        </tr>
                      
               
                        </tbody>



<?php mysqli_close($sqla);  } ?>

                              </table>
                           </div>
                        </div>

                     </div>
                  </div>
               </div>
            </div>
         </div>

         

<div class="modal-basic modal fade show" id="modal-basic" tabindex="-1" role="dialog" aria-hidden="true">


<div class="modal-dialog modal-md" role="document">
   <div class="modal-content modal-bg-white ">
      <div class="modal-header">



         <h6 class="modal-title">Agendar Aulas</h6>
         <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <img src="img/svg/x.svg" alt="x" class="svg">
         </button>
      </div>
      <div class="modal-body">
      <form action="agendar_aulas_aluno/<?php echo $id ?>/<?php echo $id2 ?>" method="POST">
<label> Escolha o Veículo </label>

<select name="veiculo" class="form-control" required>
<option value="">Informe</option>
<?php 
$sqlv= "SELECT * FROM veiculos where veiculo_cfc = '$user[user_empresa]' and veiculo_status = '1' and veiculo_categoria = $id2 ";
$exev = mysqli_query($conn, $sqlv);
while($veiculo = mysqli_fetch_array($exev)) {
?>
<option value="<?php echo $veiculo[id_veiculo] ?>" ><?php echo $veiculo[placa_veiculo] ?></option>
<?php } ?>
</select>

<label> Escolha o Instrutor </label>
<select name="instrutor" required  class="form-control">
<option value="">Informe </option>
<?php 
$sqli= "SELECT * FROM colaboradores where colaborador_pratico = 1 and colaborador_status = 1 and colaborador_cfc = '$user[user_empresa]' ";
$exei = mysqli_query($conn, $sqli);
while($instrutor = mysqli_fetch_array($exei)) {
?>
<option value="<?php echo $instrutor[colaborador_id] ?>" ><?php echo $instrutor[colaborador_nome] ?></option>
<?php } ?>
</select>




      </div>
      <div class="modal-footer">
         <input name="cat" type="hidden" value="<?php echo $id2 ?>" ?>
         <button type="submit" class="btn btn-primary btn-sm">Avançar</button>
         <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Fechar</button>
      </div>
   </div>
</div>


</div></form> 