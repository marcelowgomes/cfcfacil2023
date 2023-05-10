<?php // CODIGO DA SESSION

if (!empty($_SESSION['id_user'])) {
} else {
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");
}

include_once 'bd/conexao.php';

$sqlv = "SELECT * from caixa WHERE caixa_id = '$id' and caixa_cfc = $user[user_empresa] ";
$caixas = mysqli_query($conn, $sqlv);
$caixa = mysqli_fetch_array($caixas);


$sql = "SELECT * from alunos WHERE aluno_id = '$caixa[caixa_aluno]' and aluno_cfc = $user[user_empresa] ";
$sql2 = "SELECT * from receitas_despesas where receita_cfc = $user[user_empresa] ";
$sql3 = "SELECT * from colaboradores ";
$aluno = mysqli_query($conn, $sql);
$dados = mysqli_fetch_assoc($aluno);
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
<h4>Venda registrada -   <?php echo ($dados['aluno_nome']) ?> </h4>
<div class='mt-2 d-flex'>
<p><strong>CPF: </strong><?php echo ($dados['aluno_cpf']) ?></p>&nbsp; -
<p class='mx-2'><strong>Telefone: </strong><?php echo ($dados['aluno_t1']) ?></p>
</div>
</div>  </div></div></div>

<br>





<div class="col-xxl-12 mb-25">

<div class="card border-0 px-25"><br>
   <div class="alert alert-success" role="alert">
 Tudo ok venda registrada com sucesso.
</div>
   <br>
  <div> <a href="perfil_aluno/<?php echo ($dados['aluno_id']) ?>"> <button class="btn btn-info"> Seguir Para Perfil do Aluno </button></a></div> 
<br><br>
               </div>
            </div>
         </div>
        
      </div>
   </div>
</div>

</div>





