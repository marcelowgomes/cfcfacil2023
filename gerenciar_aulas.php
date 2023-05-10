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
$sqlag = "SELECT  * FROM escala_alunos where escala_cfc  = '$user[user_empresa]' and escala_aluno = '$id'  and escala_categoria = '$id2'   ";
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
                        <h4 class="text-capitalize breadcrumb-title"><i class="uil uil-user"></i> Área do Aluno / Controle de Aulas / <?php echo $subcategoria[subcat_produto_nome] ?></h4>
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
                  <div class="col-xxl-3 col-md-4  ">
                     <aside class="profile-sider">
                        <!-- Profile Acoount -->
                        <div class="card mb-25">
                           <div class="card-body text-center pt-sm-30 pb-sm-0  px-25 pb-0">

                              <div class="account-profile">
                                 <div class="ap-img w-100 d-flex justify-content-center">
                                    <!-- Profile picture image-->
                                    <div class="ap-img pro_img_wrapper">
                                        
                                          <!-- Profile picture image-->
                                          <label for="file-upload">
                                             <img class="ap-img__main rounded-circle wh-120 bg-lighter d-flex" src="img/author/profile.png" alt="profile">
                                            
                                          </label>
                                       </div>                                 </div>
                                 <div class="ap-nameAddress pb-3 pt-1">
                                    <h5 class="ap-nameAddress__title"><?php echo $aluno['aluno_nome'] ?></h5>
                                    <p class="ap-nameAddress__subTitle fs-14 m-0"><?php echo $aluno['aluno_cpf'] ?></p>
                                    <p class="ap-nameAddress__subTitle fs-14 m-0">
                                     Processo categoria: &nbsp; <strong> <?php echo $aluno['aluno_categoria_pretendida'] ?></strong>
                                    </p>
                                 </div>
                                
                              </div>

                           </div>
                        </div>
                        <!-- Profile Acoount End -->





                        <!-- Profile User Bio -->
                        <div class="card mb-25">
                          
                           <div class="user-info border-bottom">
                              <div class="card-header border-bottom-0 pt-sm-25 pb-sm-0  px-md-25 px-3">
                                 <div class="profile-header-title">
Controle de aulas                                </div>
                              </div>
                              <div class="card-body pt-md-1 pt-0">
                                 
 
                              <div class="row"> 


<div class="col-2"><a href="gerenciar_aulas/<?php echo $id ?>/1"><i class="fa fa-motorcycle" aria-hidden="true"></i></a></div>
<div class="col-8"><a href="gerenciar_aulas/<?php echo $id ?>/1">Moto</a></div>
<div class="col-2"><a href="gerenciar_aulas/<?php echo $id ?>/1"><?php echo $somam['totalmoto'] ?></a></div>


<div class="col-2"><a href="gerenciar_aulas/<?php echo $id ?>/2"><i class="fa fa-car" aria-hidden="true"></i></a></div>
<div class="col-8"><a href="gerenciar_aulas/<?php echo $id ?>/2">Carro</a></div>
<div class="col-2"><a href="gerenciar_aulas/<?php echo $id ?>/2"><?php echo $somac['totalcarro'] ?></a></div>

<div class="col-2"><a href="gerenciar_aulas/<?php echo $id ?>/3"><i class="fa fa-truck" aria-hidden="true"></i></a></div>
<div class="col-8"><a href="gerenciar_aulas/<?php echo $id ?>/3">Caminhão</a></div>
<div class="col-2"><a href="gerenciar_aulas/<?php echo $id ?>/3"><?php echo $somaca['totalcaminhao'] ?></a></div>

<div class="col-2"><a href="gerenciar_aulas/<?php echo $id ?>/4"><i class="fas fa-bus-alt" aria-hidden="true"></i></a></div>
<div class="col-8"><a href="gerenciar_aulas/<?php echo $id ?>/4">Ônibus</a></div>
<div class="col-2"><a href="gerenciar_aulas/<?php echo $id ?>/4"><?php echo $somao['totalonibus'] ?></a></div>

<div class="col-2"><a href="gerenciar_aulas/<?php echo $id ?>/5"><i class="fas fa-truck-moving" aria-hidden="true"></i></a></div>
<div class="col-8"><a href="gerenciar_aulas/<?php echo $id ?>/5">Carreta</a></div>
<div class="col-2"><a href="gerenciar_aulas/<?php echo $id ?>/5"><?php echo $somacar['totalcarreta'] ?></a></div>

<div class="col-2"><a href="gerenciar_aulas/<?php echo $id ?>/6"><i class="la la-motorcycle" aria-hidden="true"></i></a></div>
<div class="col-8"><a href="gerenciar_aulas/<?php echo $id ?>/6">Ciclomotor</a></div>
<div class="col-2"><a href="gerenciar_aulas/<?php echo $id ?>/6"><?php echo $somaci['totalclicomotor'] ?></a></div>

<div class="col-2"><a href="gerenciar_aulas/<?php echo $id ?>/13"><i class="fa fa-desktop" aria-hidden="true"></i></a></div>
<div class="col-8"><a href="gerenciar_aulas/<?php echo $id ?>/13">Simulador</a></div>
<div class="col-2"><a href="gerenciar_aulas/<?php echo $id ?>/13"><?php echo $somas['totalsimulador'] ?></a></div>


</div>


                                
                           
                              </div>
                           </div>
                        
                     </aside>
              

                        <!-- Profile User Bio -->
                        <div class="card mb-25">
                          
                           <div class="user-info border-bottom">
                              <div class="card-header border-bottom-0 pt-sm-25 pb-sm-0  px-md-25 px-3">
                                 <div class="profile-header-title">
Dados de contato                                 </div>
                              </div>
                              <div class="card-body pt-md-1 pt-0">
                                 <div class="user-content-info">
                                    <p class="user-content-info__item">
                                       <img class="svg" src="img/svg/mail.svg" alt="mail"><?php echo $aluno['aluno_email'] ?>
                                    </p>
                                    <p class="user-content-info__item">
                                       <img src="img/svg/phone.svg" alt="phone" class="svg"><?php echo $aluno['aluno_t1'] ?>
                                    </p>
                                    
                                 </div>
                              </div>
                        
                           </div>
                          
                        </div>
                        <!-- Profile User Bio End -->
                     </aside>
                  </div>

                  <div class="col-xxl-9 col-md-8">
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

<div class="col-2"><strong>Saldo</strong></div>
<div class="col-1"><?php echo $saldo_aulas  ?></div>

</div>

                   

                     </div> </div>
<?php if($a_agender == '0') { } else { ?>
   <div align="right"><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-basic"><i class="fas fa-calendar-plus"></i> Agendar Novas Aulas </button></div>
<?php } ?>





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
$sqli= "SELECT * FROM colaboradores where pratico = 1 and status = 1 and cod_cfc = '$user[user_empresa]' ";
$exei = mysqli_query($conn, $sqli);
while($instrutor = mysqli_fetch_array($exei)) {
?>
  <option value="<?php echo $instrutor[id] ?>" ><?php echo $instrutor[nome] ?></option>
<?php } ?>
</select>




                  </div>
                  <div class="modal-footer">
                     <button type="submit" class="btn btn-primary btn-sm">Avançar</button>
                     <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Fechar</button>
                  </div>
               </div>
            </div>


         </div></form> 