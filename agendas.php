<?php 
if (!empty($_SESSION['id_user'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: logar.php");
}

?>
<?php 

/// ALUNOS
$sqla = "SELECT * FROM alunos WHERE aluno_cfc = '$user[user_empresa]' and aluno_id = '$id'";
$exea = mysqli_query($conn, $sqla);
$aluno = mysqli_fetch_array($exea);

/// SUBCATEGORIAS
$sqlsb = "SELECT * FROM subcategoria_produtos WHERE subcat_produto_id = '$id2' ";
$exesb = mysqli_query($conn, $sqlsb);
$subcategoria = mysqli_fetch_array($exesb);

//// CONTROLE DE AULA
$sqlcontrole = "SELECT  SUM(carrinho_qtd) as totalcontrole FROM carrinho where carrinho_cfc  = '$user[user_empresa]' and carrinho_aluno = '$id' and carrinho_status = '2' and carrinho_subcategoria = '$id2' and carrinho_categoria = '1'  ";
$execontrole = mysqli_query($conn, $sqlcontrole);
$controle = mysqli_fetch_array($execontrole);
mysqli_close($sqlcontrole);


//// CONTROLE DE AULA AGENDADAS 
$sqlag = "SELECT  * FROM escala_alunos where escala_cfc  = '$user[user_empresa]' and escala_aluno = '$id'  and escala_categoria = '$id2' and escala_status <>  '3'   ";
$exeag = mysqli_query($conn, $sqlag);
$agendadas = mysqli_num_rows($exeag);
mysqli_close($sqlag);

//// CONTROLE DE AULA AGENDADAS E REALIZADAS
$sqlagr = "SELECT  * FROM escala_alunos where escala_cfc  = '$user[user_empresa]' and escala_aluno = '$id' and escala_status = '2' and escala_categoria = '$id2'   ";
$exeagr = mysqli_query($conn, $sqlagr);
$realizadas = mysqli_num_rows($exeagr);
mysqli_close($sqlagr);





/// PEGANDO DADOS DAS COMPRAS
$sqldc = "SELECT  COUNT(*) as registros, SUM(caixa_total) as totalcompras, caixa_cfc, caixa_aluno, caixa_tipo  FROM caixa WHERE caixa_cfc = '$user[user_empresa]' and caixa_aluno = '$id' and caixa_tipo = 'Entrada'";
$exedc = mysqli_query($conn, $sqldc);
$alunodc = mysqli_fetch_array($exedc);
$compras = mysqli_num_rows($exedc);


/// SOMANDO AULAS DE CARRO
$sqlsc = "SELECT  SUM(carrinho_qtd) as totalcarro FROM carrinho where carrinho_cfc  = '$user[user_empresa]' and carrinho_aluno = '$id' and carrinho_status = '2' and carrinho_subcategoria = '2' and carrinho_categoria = '1'  ";
$exesc = mysqli_query($conn, $sqlsc);
$somac = mysqli_fetch_array($exesc);
mysqli_close($sqlsc);

/// SOMANDO AULAS DE MOTO
$sqlsm = "SELECT  SUM(carrinho_qtd) as totalmoto FROM carrinho where carrinho_cfc  = '$user[user_empresa]' and carrinho_aluno = '$id' and carrinho_status = '2' and carrinho_subcategoria = '1' and carrinho_categoria = '1'  ";
$exesm = mysqli_query($conn, $sqlsm);
$somam = mysqli_fetch_array($exesm);
mysqli_close($sqlsm);

/// SOMANDO AULAS DE CAMINHÃO
$sqlsca = "SELECT  SUM(carrinho_qtd) as totalcaminhao FROM carrinho where carrinho_cfc  = '$user[user_empresa]' and carrinho_aluno = '$id' and carrinho_status = '2' and carrinho_subcategoria = '3' and carrinho_categoria = '1'  ";
$exesca = mysqli_query($conn, $sqlsca);
$somaca = mysqli_fetch_array($exesca);
mysqli_close($sqlsca);

/// SOMANDO AULAS DE ONIBUS
$sqlso = "SELECT  SUM(carrinho_qtd) as totalonibus FROM carrinho where carrinho_cfc  = '$user[user_empresa]' and carrinho_aluno = '$id' and carrinho_status = '2' and carrinho_subcategoria = '4' and carrinho_categoria = '1'  ";
$exeso = mysqli_query($conn, $sqlso);
$somao = mysqli_fetch_array($exeso);
mysqli_close($sqlso);

/// SOMANDO AULAS DE CARRETA
$sqlscar = "SELECT  SUM(carrinho_qtd) as totalcarreta FROM carrinho where carrinho_cfc  = '$user[user_empresa]' and carrinho_aluno = '$id' and carrinho_status = '2' and carrinho_subcategoria = '5' and carrinho_categoria = '1'  ";
$exescar = mysqli_query($conn, $sqlscar);
$somacar = mysqli_fetch_array($exescar);
mysqli_close($sqlscar);

/// SOMANDO AULAS DE CICLOMOTOR
$sqlsci = "SELECT  SUM(carrinho_qtd) as totalclicomotor FROM carrinho where carrinho_cfc  = '$user[user_empresa]' and carrinho_aluno = '$id' and carrinho_status = '2' and carrinho_subcategoria = '6' and carrinho_categoria = '1'  ";
$exesci = mysqli_query($conn, $sqlsci);
$somaci = mysqli_fetch_array($exesci);
mysqli_close($sqlsci);


/// SOMANDO AULAS DE SIMULDOR
$sqlss = "SELECT  SUM(carrinho_qtd) as totalsimulador FROM carrinho where carrinho_cfc  = '$user[user_empresa]' and carrinho_aluno = '$id' and carrinho_status = '2' and carrinho_subcategoria = '13' and carrinho_categoria = '1'  ";
$exess = mysqli_query($conn, $sqlss);
$somas = mysqli_fetch_array($exess);
mysqli_close($sqlss);

$totalaulas = $somam[totalmoto] + $somac[totalcarro] + $somaca[totalcaminhao]  + $somao[totalonibus] + $somacar[totalcarreta] + $somaci[totalclicomotor] + $somasi[totalsimulador]
?>
  
 
       
          
      

         <div class="container-fluid">
            <div class="profile-content mb-50">
               <div class="row">
                  <div class="col-lg-12">

                     <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title"><i class="uil uil-user"></i> Agendas</h4>
                        <div class="breadcrumb-action justify-content-center flex-wrap">
                           <nav aria-label="breadcrumb">
                           <div class="ap-button button-group d-flex justify-content-center flex-wrap">
                              
                                   <a href="perfil_aluno/<?php echo $id ?>"> <button type="button" class="border  px-25 bg-info text-white radius-md">
                                   <i class="fa fa-arrow-left" aria-hidden="true"></i>&ensp;Voltar</button> </a>

                                    
                                 </div>


                               

                           </nav>
                        </div>
                     </div>

                  </div>
                 



                  <div class="col-xxl-12 col-md-8">
                     <!-- Tab Menu -->
                       
<div class="card global-shadow mb-25">
<div class="ffp align-items-center w-100">
   
<div class="row">

<div class="col-2"><strong>Contratadas</strong></div>
<div class="col-1"><?php echo $controle[totalcontrole] ?></div>

<div class="col-2"><strong>Agendadas</strong></div>
<div class="col-1"><?php echo $agendadas ?></div>

<div class="col-2"><strong>Realizadas</strong></div>
<div class="col-1"><?php echo $realizadas ?></div>

<?php 
/// SALDO DE AULAS
$saldo_aulas =  $controle[totalcontrole] - $realizadas;
/// AULAS A AGENDAR
$a_agender =  $controle[totalcontrole] - $agendadas;
?>

<div class="col-2"><strong>A Realizar</strong></div>
<div class="col-1"><?php echo $saldo_aulas  ?></div>

</div>

                   

                     </div> </div>

<div> </div>
<label> Escolha o Veículo </label>

<form action="agenda_geral_veiculo" method="post" >
<div class="row"> 
<div class="col-6"> 
<select name="veiculo" class="form-control" required>
<option value="">Informe</option>
<?php 
$sqlv= "SELECT * FROM veiculos where veiculo_cfc = '$user[user_empresa]' and veiculo_status = '1' ";
$exev = mysqli_query($conn, $sqlv);
while($veiculo = mysqli_fetch_array($exev)) {
?>
<option value="<?php echo $veiculo[id_veiculo] ?>" ><?php echo $veiculo[placa_veiculo] ?></option>
<?php } ?>
</select>
</div>
<div class="col-6"> 
<button class="btn btn-primary btn-xs btn-squared "><i class="fas fa-calendar-alt"></i>
                                       Consultar
                                    </button>

</div></div>
</form>