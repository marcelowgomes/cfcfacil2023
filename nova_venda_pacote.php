<?php // CODIGO DA SESSION

if (!empty($_SESSION['id_user'])) {
} else {
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");
}

include_once 'bd/conexao.php';

$sql = "SELECT * from alunos WHERE aluno_id = '$id' and aluno_cfc = $user[user_empresa] ";
$sql2 = "SELECT * from itens_pacote where itens_p_cfc = $user[user_empresa] and itens_p_pacote = '$id2' ";
$sql3 = "SELECT * from pacotes  WHERE pacote_id = '$id2' and pacote_cfc = $user[user_empresa] ";
$aluno = mysqli_query($conn, $sql);
$dados = mysqli_fetch_assoc($aluno);
$pacotes = mysqli_query($conn, $sql3);
$pacote = mysqli_fetch_assoc($pacotes);
$produtos = mysqli_query($conn, $sql2);




$produto_dados = mysqli_fetch_all($produto);
$colaborador = mysqli_query($conn, $sql3);




$pattern = '/\(\d+\)[ ]?\d+[-. ]?\d+/';
preg_match($pattern, $dados["aluno_telefones"], $matches);
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<style type="text/css">
        h1 {
            color:green;
        }
        .xyz {
            background-size: auto;
            text-align: center;
            padding-top: 100px;
        }
        .btn-circle.btn-sm {
            width: 30px;
            height: 30px;
            padding: 6px 0px;
            border-radius: 15px;
            font-size: 14px;
            text-align: center;
        }
        .btn-circle.btn-md {
            width: 50px;
            height: 50px;
            padding: 7px 10px;
            border-radius: 25px;
            font-size: 10px;
            text-align: center;
        }
        .btn-circle.btn-xl {
            width: 70px;
            height: 70px;
            padding: 10px 16px;
            border-radius: 35px;
            font-size: 12px;
            text-align: center;
        }
    </style>




<div>
                 
                 <div>
                    <h4>Nova Venda -   <?php echo ($dados['aluno_nome']) ?> </h4>
                    <div class='mt-2 d-flex'>
        <p><strong>CPF: </strong><?php echo ($dados['aluno_cpf']) ?></p>&nbsp; -
        <p class='mx-2'><strong>Telefone: </strong><?php echo ($dados['aluno_t1']) ?></p>
      </div>
                 </div>  </div></div></div>

<br>





<div class="col-xxl-7 mb-25">

<div class="card border-0 px-25">
   <div class="card-header px-0 border-0">
      <h6>Itens</h6>
      
   </div>
   <div class="card-body p-0">
      <div class="tab-content">
         <div class="tab-pane fade active show" id="t_selling-today222" role="tabpanel" aria-labelledby="t_selling-today222-tab">
            <div class="selling-table-wrap selling-table-wrap--source">
               <div class="table-responsive">
                  <table class="table table--default table-borderless ">
                     <thead>
                        <tr class="bg-primary">
                           <th class="text-white" >Item</th>
                         
                           <th class="text-center text-white">QTD.</th>
                        
                        </tr>
                     </thead>

                     <?php
  $x='0';
  while($produto = mysqli_fetch_array($produtos)) { 
  $x++;
  
  $sql2p = "SELECT * from receitas_despesas  where receita_id = $produto[itens_p_produto] and receita_cfc = $user[user_empresa]   ";
  $exe2p = mysqli_query($conn, $sql2p);
  $itemcarrinho = mysqli_fetch_array($exe2p)
    ?>
   

                     <tbody>
                        <tr>
                           <td>
                            <span><?php echo $itemcarrinho[receita_nome] ?></span>
                           </td>
                           <td class="text-center">
                           <?php echo $produto[itens_p_qtd] ?>
                          </td>
                          
                       
                       
                        
                       
                     </tbody>

<input type="hidden" name="aluno2"  value="<?php echo $id ?>"> 
<input type="hidden" name="categoria"  value="<?php echo $produto[receita_categoria] ?>"> 
<input type="hidden" name="subcategoria"  value="<?php echo $produto[receita_subcategoria] ?>"> 
<input type="hidden" name="custo"  value="<?php echo $produto[receita_custo] ?>"> 
<input type="hidden" name="item"  value="<?php echo $produto[receita_id] ?>"> 





                     <?php } ?> 


                  </table>
               </div>
            </div>
         </div>
        
      </div>
   </div>
</div>

</div>






<div class="col-xxl-5 mb-25">

<div class="card border-0 px-25">
   <div class="card-header px-0 border-0">
      <h6>Caixa</h6>
      
   </div>
   <div class="card-body p-0">
      <div class="tab-content">
         <div class="tab-pane fade active show" id="t_selling-today" role="tabpanel" aria-labelledby="t_selling-today-tab">
            <div class="selling-table-wrap">
               <div class="table-responsive">
                    </div>

                    <form id="finalizarvenda" action="#" method="post">

                    <?php include "pagar_pacote.php" ?>
  </form>
               </div>
            </div>
         </div>
         
         

      </div>
   </div>
</div>
 
</div>

</div>
<!-- ends: .row -->
</div>
</div>

</div>
