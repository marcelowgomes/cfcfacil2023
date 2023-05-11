<?php 
if (!empty($_SESSION['id_user'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: logar.php");
}

?>
<?php /// ALUNOS
$sqla = "SELECT * FROM alunos WHERE aluno_cfc = '$user[user_empresa]' and aluno_id = '$id'";
$exea = mysqli_query($conn, $sqla);
$aluno = mysqli_fetch_array($exea);


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

// PEGANDO FOTO DE PERIFL
$sql_foto = "SELECT * from imagens_perfil where id_usuario = '$id'";
$exe_foto = mysqli_query($conn, $sql_foto);
$foto = mysqli_fetch_assoc($exe_foto);

$totalaulas = $somam[totalmoto] + $somac[totalcarro] + $somaca[totalcaminhao]  + $somao[totalonibus] + $somacar[totalcarreta] + $somaci[totalclicomotor] + $somasi[totalsimulador]
?>
  
 
       
               
      

         <div class="container-fluid">
            <div class="profile-content mb-50">
               <div class="row">
                  <div class="col-lg-12">

                     <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title"><i class="uil uil-user"></i> Área do Aluno </h4>
                        <div class="breadcrumb-action justify-content-center flex-wrap">
                           <nav aria-label="breadcrumb">
                           <div class="ap-button button-group d-flex justify-content-center flex-wrap">
                              
                                   <a href="nova_venda/<?php echo $id ?>" data-bs-toggle="modal" data-bs-target="#modal-info"> <button type="button" class="border  px-25 bg-success text-white radius-md">
                                    <i class="fa fa-arrow-up" aria-hidden="true"></i>&ensp; Nova Venda</button> </a>

                                    <a href="nova_saida/<?php echo $id ?>">   <button type="button" class="border  px-25 bg-danger text-white radius-md">
                                       <i class="fa fa-arrow-down" aria-hidden="true"></i>&ensp; Nova Saida</button></a>
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
                                          <input id="file-upload" type="file" name="fileUpload" class="d-none">
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
                                 <div class="ap-button button-group d-flex justify-content-center flex-wrap">
                                    <button type="button" class="border text-capitalize px-25 color-gray transparent radius-md">
                                       <img class="svg" src="<?php echo $foto['caminho_imagem']?>" alt="mail">Enviar Mensagem</button>
                                 </div>
                                 <form action="trocar_imagem/<?php echo $id ?>" enctype="multipart/form-data" method="post">
                                 <div style="margin-top: 20px">
                                    <input type="file" name="imagem_perfil" id="file-upload" style="display:hidden">
                                    <button type="submit" class="btn btn-primary" style="margin-left: 190px; margin-top:10px">Enviar</button>
                                 </div>
                                 </form>
                              </div>

                              <div class="card-footer mt-20 pt-20 pb-20 px-0 bg-transparent">
                                 <div class="profile-overview d-flex justify-content-between flex-wrap">
                                    <div class="po-details">
                                       <h6 class="po-details__title pb-1">R$ <?php echo number_format($alunodc[totalcompras], 2, ',', '.');  ?> </h6>
                                       <span class="po-details__sTitle">Valor Investido</span>
                                    </div>
                                    <div class="po-details">
                                       <h6 class="po-details__title pb-1"><?php echo $alunodc[registros] ?></h6>
                                       <span class="po-details__sTitle">Compras</span>
                                    </div>
                                    <div class="po-details">
                                       <h6 class="po-details__title pb-1"><?php echo $totalaulas ?></h6>
                                       <span class="po-details__sTitle">Aulas</span>
                                    </div>
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
                           <div class="user-skils border-bottom">
                              <div class="card-header border-bottom-0 pt-sm-25 pb-sm-0  px-md-25 px-3">
                                 <div class="profile-header-title">
                                    Alertas
                                 </div>
                              </div>
                             <!-- <div class="card-body pt-md-1 pt-0">
                                 <ul class="user-skils-parent">
                                    <li class="user-skils-parent__item">
                                       <a href="#">Exame Carro Marcado dia 23/02/2024</a>
                                    </li>
                                 </ul>
                                 
                              </div> -->
                           </div>
                          
                        </div>
                        <!-- Profile User Bio End -->
                     </aside>
                  </div>

                  <div class="col-xxl-9 col-md-8">
                     <!-- Tab Menu -->
                     <div class="ap-tab ap-tab-header">
                        <div class="ap-tab-header__img">
                           <img src="img/ap-header.png" alt="ap-header" class="img-fluid w-100">
                        </div>
                        <div class="ap-tab-wrapper">
                           <ul class="nav px-25 ap-tab-main" id="ap-tab" role="tablist">


                              <li class="nav-item">
                                 <a class="nav-link active" id="ap-overview-tab" data-bs-toggle="pill" href="#ap-resumo" role="tab" aria-selected="true">Resumo Financeiro</a>
                              </li>



                              <li class="nav-item">
                                 <a class="nav-link" id="timeline-tab" data-bs-toggle="pill" href="#timeline" role="tab" aria-selected="false">Crediário</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" id="activity-tab" data-bs-toggle="pill" href="#activity" role="tab" aria-selected="false">Taxas e Locação</a>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <!-- Tab Menu End -->



                     <div class="tab-content mt-25" id="ap-tabContent">
                        <div class="tab-pane fade show active" id="ap-resumo" role="tabpanel" aria-labelledby="ap-overview-tab">
                           <div class="ap-content-wrapper">
                              <div class="row">
                                 <div class="col-lg-4 mb-25">
                                   
                                 </div>
                                 <div class="col-lg-4 mb-25">
                                    
                                 </div>
                                 <div class="col-lg-4 mb-25">
                                   
                                 </div>
                                 <div class="col-lg-12">



                              
                                    <!-- Friend post -->
                                    <div class="card global-shadow mb-25">
                                       <div class="friends-widget">
                                          


                                       <div class="card-body p-0 py-10">


<!-- inicio card -->

<?php /// VENDAS
$sqlv = "SELECT * FROM caixa WHERE caixa_cfc = '$user[user_empresa]' and caixa_aluno = '$id' order by caixa_data desc";
$exev = mysqli_query($conn, $sqlv);
while($venda = mysqli_fetch_array($exev)) { 
?>

<?php if( $venda['caixa_tipo'] == 'Entrada') { ?>
<div class="ffp d-flex ffp--hover justify-content-between  align-items-center w-100">
                                                <div class="d-flex">
                                                   <div class="me-3 ffp__imgWrapper d-flex align-items-center">
                                                      <span class="ffp__icon color-success bg-opacity-success">
                                                      <i class="fas fa-arrow-up"></i>                                                      </span>
                                                   </div>
                                                   <div class="ffp__title">
                                                      <a href="#" class="text-dark fw-500">  
                                                         <h6>
                                                          Compra realizada no valor R$ <?php echo number_format($venda[caixa_total], 2, ',', '.');  ?>
                                                      </a>
                                                      <p class="d-block">
                                                         <?php echo date('d/m/Y H:i:s', strtotime($venda['caixa_data'])); ?> 
                                                      </p>
                                                   </div>
                                                </div>
                                               
                                             </div>
<!-- fim card -->
<?php } ?>    

<?php if( $venda['caixa_tipo'] == 'Saida') { ?>

<div class="ffp d-flex ffp--hover justify-content-between  align-items-center w-100">
                                                <div class="d-flex">
                                                   <div class="me-3 ffp__imgWrapper d-flex align-items-center">
                                                      <span class="ffp__icon color-danger bg-opacity-danger">
                                                      <i class="fas fa-arrow-down"></i>                                                      </span>
                                                   </div>
                                                   <div class="ffp__title">
                                                      <a href="#" class="text-dark fw-500">
                                                         <h6>
                                                          Saida realizada no valor R$ <?php echo number_format($venda[caixa_total], 2, ',', '.');  ?>
                                                      </a>
                                                      <p class="d-block">
                                                      <?php echo date('d/m/Y H:i:s', strtotime($venda['caixa_data'])); ?> 
                                                      </p>
                                                   </div>
                                                </div>
                                                
                                             </div>




                                             <?php } ?>   


                                             <?php if( $venda['caixa_tipo'] == 'Crediario') { ?>

                                                <div class="ffp d-flex ffp--hover justify-content-between  align-items-center w-100">
                                                <div class="d-flex">
                                                   <div class="me-3 ffp__imgWrapper d-flex align-items-center">
                                                      <span class="ffp__icon color-success bg-opacity-success">
                                                      <i class="fas fa-clipboard-check"></i>                                                    </span>
                                                   </div>
                                                   <div class="ffp__title">
                                                      <a href="#" class="text-dark fw-500">
                                                         <h6>
                                                         Crédiario Recebido no valor R$ <?php echo number_format($venda[caixa_total], 2, ',', '.');  ?>
                                                      </a>                                                      </a>
                                                      </a>
                                                      <p class="d-block">
                                                      <?php echo date('d/m/Y H:i:s', strtotime($venda['caixa_data'])); ?> 
                                                      </p>
                                                   </div>
                                                </div>
                                                
                                             </div>




                                             <?php } ?>   


                     <?php } ?>           






                                             
                                             
                                  
                                 </div>  </div>  </div>
                                
                                 </div>
                              </div>
                           </div>
                        </div>





                        <div class="tab-pane fade" id="timeline" role="tabpanel" aria-labelledby="timeline-tab">
                           <div class="ap-post-content">
                              <div class="row">
                       

                              <div class="col-xxl-6">
                                    <!-- Friend Widgets -->
                                    <div class="card global-shadow mb-25">
                                       <div class="friends-widget">
                                          <div class="card-header px-md-25 px-3">
                                             <h6>Parcelas a Receber</h6>
                                          </div>


<?php /// CREDIARIO A RECEBER
$sqlar = "SELECT * FROM contas_areceber WHERE areceber_cfc = '$user[user_empresa]' and areceber_cliente = '$id' and areceber_status = 'areceber' order by areceber_vencimento asc ";
$exear = mysqli_query($conn, $sqlar);
while($areceber = mysqli_fetch_array($exear)) { 
?>
                                          <div class="card-body p-0">
                                             <div class="ffw d-flex justify-content-between">
                                                <div class="d-flex flex-wrap">
                                                <div class="me-3 ffp__imgWrapper d-flex align-items-center">
                                                      <span class="ffp__icon color-info bg-opacity-info">
                                                      <i class="fas fa-clipboard-check"></i>                                                    </span>
</div>
                                                   <div class="ffw__title">
                                                      <a href="#" class="text-dark fw-500">
                                                         <h6><?php echo date('d/m/Y', strtotime($areceber['areceber_vencimento'])); ?>  - Parcela <?php echo $areceber[areceber_parcela] ?>/<?php echo $areceber[areceber_parcelas] ?></h6>
                                                      </a>
                                                      <span class="d-block">
                                                      Valor: R$ <?php echo number_format($areceber[areceber_valor], 2, ',', '.');  ?> Venda: <?php echo $areceber[areceber_venda] ?>
                                                      </span>
                                                   </div>
                                                </div>
                                                <div>



                                                   <button class="btn btn-default btn-squared color-light btn-outline-light friends-follow">Receber
                                                   </button>




                                                </div>
                                             </div>
                                             
                                             
                                        
                                          </div>

                                          <?php } ?>


                                       </div>
                                    </div>
                                    </div>

     

                                  

                             

                                 
                                 <div class="col-xxl-6">
                                    <!-- Friend Widgets -->
                                    <div class="card global-shadow mb-25">
                                       <div class="friends-widget">
                                          <div class="card-header px-md-25 px-3">
                                             <h6>Parcelas Recebidas</h6>
                                          </div>

                                          <?php /// CREDIARIO A RECEBER
$sqlare = "SELECT * FROM contas_areceber WHERE areceber_cfc = '$user[user_empresa]' and areceber_cliente = '$id' and areceber_status = 'recebida' order by areceber_vencimento asc ";
$exeare = mysqli_query($conn, $sqlare);
while($arecebere = mysqli_fetch_array($exeare)) { 
?>



                                          <div class="card-body p-0">
                                             <div class="ffw d-flex justify-content-between">
                                                <div class="d-flex flex-wrap">
                                                <div class="me-3 ffp__imgWrapper d-flex align-items-center">
                                                      <span class="ffp__icon color-success bg-opacity-success">
                                                      <i class="fas fa-clipboard-check"></i>                                                    </span>
                                                   </div>
                                                   <div class="ffw__title">
                                                      <a href="#" class="text-dark fw-500">
                                                      <h6><?php echo date('d/m/Y', strtotime($arecebere['areceber_vencimento'])); ?>  - Parcela <?php echo $arecebere[areceber_parcela] ?>/<?php echo $arecebere[areceber_parcelas] ?></h6>
                                                      </a>
                                                      <span class="d-block">
                                                        Recebida dia: <?php echo date('d/m/Y', strtotime($arecebere['areceber_recebida'])); ?>  - Venda: <?php echo $arecebere[areceber_venda] ?><br>
                                                        Valor: R$ <?php echo number_format($arecebere[areceber_valor], 2, ',', '.');  ?> - Recebido: R$ <?php echo number_format($arecebere[areceber_recebido], 2, ',', '.');  ?>
                                                      </span>
                                                   </div>
                                                </div>
                                                <div>



                                                  <!-- <button class="btn btn-default btn-squared color-light btn-outline-light friends-follow">follow
                                                   </button> -->




                                                </div>
                                             </div>
                                             
                                             
                                             
                                          </div>
                                          <?php } ?>
                                       </div>
                                    </div>
                                    <!-- Friend Widgets End -->

                                   
                                    

                                    
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="activity" role="tabpanel" aria-labelledby="activity-tab">
                           <div class="ap-post-content">
                              <div class="row">
                                 <div class="col-xxl-12">
                                    <!-- Friend post -->
                                    <div class="card global-shadow mb-25">
                                       <div class="friends-widget">
                                          <div class="card-header px-md-25 px-3">
                                             <h6>Taxas</h6>
                                          </div>

                                        

<?php
 $cmdtx = "select * from receitas_despesas WHERE receita_categoria ='5' and receita_ocorrencia ='Entrada' and receita_cfc='$user[user_empresa]' ";
 $itenstx = mysqli_query($conn, $cmdtx);
 //exibe os produtos selecionados
while ($taxa = mysqli_fetch_array($itenstx)) {


$cmds = "select * from carrinho  WHERE carrinho_categoria ='5' and carrinho_aluno ='$id' and carrinho_subcategoria ='$taxa[receita_subcategoria]' and carrinho_cfc='$user[user_empresa]'  and carrinho_status ='2' and carrinho_ocorrencia='Entrada' ";
$alunoss = mysqli_query($conn, $cmds);
$compradas = mysqli_num_rows($alunoss);
  
$cmds2 = "select * from carrinho  WHERE carrinho_categoria ='5' and carrinho_aluno ='$id' and carrinho_subcategoria ='$itemcar[de]'  and carrinho_cfc='$user[user_empresa]' and carrinho_status ='2' and carrinho_ocorrencia ='Saida'  ";
$alunoss2 = mysqli_query($conn, $cmds2);
$utilizadas = mysqli_num_rows($alunoss2);
  
  $saldotx = $compradas - $utilizadas;





?>
                                          
                                          <div class="card-body p-0 py-10">
                                             <div class="ffp d-flex ffp--hover justify-content-between  align-items-center w-100">
                                                <div class="d-flex">
                                                   
                                                   <div class="ffp__title">
                                                      <a href="#" class="text-dark fw-500">
                                                         <h6>
                                                            <span class="color-primary"><?php echo $taxa[receita_nome] ?></span> 
                                                         </h6>
                                                      </a>
                                                      <span class="d-block">
                                                        Compradas: <?php echo $compradas ?> - Utilizadas: <?php echo $utilizadas ?> - Saldo: <?php echo $saldotx ?>
                                                      </span>
                                                   </div>
                                                </div>
                                                <div class="ffp__button">


                                                   <div class="dropdown  dropdown-click ">
<?php if($saldotx == '0') { } else { ?> 
                                                   <button class="btn btn-default btn-squared color-light btn-outline-light friends-follow">Lançar
                                                   </button>
<?php } ?>

                                                   
                                                   </div>


                                                </div>
                                             </div>





                                          <?php } ?>

                                          
                                            
                                            
                                          </div>
                                       </div>
                                    </div>
                                    <!-- Friend Post End -->
                                 </div>
                                 <div class="col-xxl-12">
                                    <!-- Friend Widgets -->
                                    <div class="card global-shadow mb-25">
                                       <div class="friends-widget">
                                          <div class="card-header px-md-25 px-3">
                                             <h6>Locação</h6>
                                          </div>
                                          <div class="card-body p-0">


                                          <?php
 $cmdl = "select * from receitas_despesas WHERE receita_categoria ='3' and receita_ocorrencia ='Entrada' and receita_cfc='$user[user_empresa]' ";
 $itensl= mysqli_query($conn, $cmdl);
 //exibe os produtos selecionados
while ($locacao = mysqli_fetch_array($itensl)) {

$cmdsc = "select * from carrinho  WHERE carrinho_categoria ='3' and carrinho_aluno ='$id' and carrinho_subcategoria ='$locacao[receita_subcategoria]' and carrinho_cfc='$user[user_empresa]'  and carrinho_status ='2' and carrinho_ocorrencia='Entrada' ";
$alunossc = mysqli_query($conn, $cmdsc);
$compradasc = mysqli_num_rows($alunossc);
     
$cmds2c = "select * from carrinho  WHERE carrinho_categoria ='3' and carrinho_aluno ='$id' and carrinho_subcategoria ='$locacao[de]'  and carrinho_cfc='$user[user_empresa]' and carrinho_status ='2' and carrinho_ocorrencia ='Saida'  ";
$alunoss2c = mysqli_query($conn, $cmds2c);
$utilizadasc = mysqli_num_rows($alunoss2c);

$saldo2 = $compradasc	-  $utilizadas2c;

   ?>
                                             <div class="ffw d-flex justify-content-between">
                                                <div class="d-flex flex-wrap">
                                                   
                                                   <div class="ffw__title">
                                                      <a href="#" class="text-dark fw-500">
                                                         <h6><?php echo $locacao[receita_nome] ?></h6>
                                                      </a>
                                                      <span class="d-block">
                                                      Compradas: <?php echo $compradasc    ?> - Utilizadas: <?php echo $utilizadasc ?> - Saldo: <?php echo $saldo2 ?>
                                                      </span>
                                                   </div>
                                                </div>
                                                <div>


                                                <?php if($saldo2 == '0') { } else { ?> 
                                                   <button class="btn btn-default btn-squared color-light btn-outline-light friends-follow">Resultado
                                                   </button>

<?php } ?>


                                                </div>
                                             </div>



<?php } ?>

                                            

                                           
                                          </div>
                                       </div>
                                    </div>
                                    <!-- Friend Widgets End -->


                                   
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

      </div>
      <footer class="footer-wrapper">
         <div class="footer-wrapper__inside">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-6">
                     <div class="footer-copyright">
                        <p><span>© 2023</span><a href="#">Sovware</a>
                        </p>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="footer-menu text-end">
                        <ul>
                           <li>
                              <a href="#">About</a>
                           </li>
                           <li>
                              <a href="#">Team</a>
                           </li>
                           <li>
                              <a href="#">Contact</a>
                           </li>
                        </ul>
                     </div>
                     <!-- ends: .Footer Menu -->
                  </div>
               </div>
            </div>
         </div>
      </footer>
   </main>
   <div id="overlayer">
      <div class="loader-overlay">
         <div class="dm-spin-dots spin-lg">
            <span class="spin-dot badge-dot dot-primary"></span>
            <span class="spin-dot badge-dot dot-primary"></span>
            <span class="spin-dot badge-dot dot-primary"></span>
            <span class="spin-dot badge-dot dot-primary"></span>
         </div>
      </div>
   </div>
   <div class="overlay-dark-sidebar"></div>
   <div class="customizer-overlay"></div>

   
<!-- INICIO MODAL VENDAS -->

            <div class="modal-info modal fade show" id="modal-info" tabindex="-1" role="dialog" aria-hidden="true">


<div class="modal-dialog modal-sm modal-info" role="document">
   <div class="modal-content">
      <div class="modal-body">
         <div class="modal-info-body d-flex">
            <div class="modal-info-icon primary">
               <img src="img/svg/alert-circle.svg" alt="alert-circle" class="svg">
            </div>

            <div class="modal-info-text">
               <p>Informe tipo de venda</p>
            </div>

         </div> <br>
<div class="row">
<div class="col-auto">
         <a href="nova_venda/<?php echo $id ?>"> <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal">Avulsa</button></a>&nbsp;
         </div>
         <div class="col-auto">

         <button type="button" class="btn btn-info btn-sm" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#exampleModalCenteredScrollable"> Pacote</button>
</div></div>

      </div>
      <div class="modal-footer">

         <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">Fechar</button>

      </div>
   </div>
</div>


</div>
<!-- FIM MODAL VENDAS -->



<!-- INICIO MODAL PACOTES -->

<div class="modal fade" id="exampleModalCenteredScrollable" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Escolha o pacote</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">  

      <div class="row">

<div class="col-7"><strong> Pacote</strong></div>
<div class="col-3"><strong>Valor</strong></div>
<div class="col-2"><strong>Ação</strong>  
</div></div>
<br>
<?php /// LOCALIZANDO PACOTES

$cmda = "SELECT * FROM pacotes p INNER JOIN subcategoria_produtos s on p.pacote_categoria = s.subcat_produto_id WHERE p.pacote_cfc = '$user[user_empresa]' and p.pacote_status ='1'";
$exepa = mysqli_query($conn, $cmda);
while($pacote = mysqli_fetch_array($exepa)) { 
                          ?>

                        
<div class="bd-example">
<div class="row"> 
<div class="p-2 mb-2 bg-info text-white col-7"><?php echo $pacote[subcat_produto_nome] ?> - <?php echo $pacote[pacote_descricao] ?></div>
<div class="p-2 mb-2 bg-info text-white col-3">R$<?php echo $pacote[pacote_valor] ?></div>
<div class="p-2 mb-2 bg-info text-black col-2"><a href="nova_venda_pacote/<?php echo $id ?>/<?php echo $pacote[pacote_id] ?>">  <span class="badge badge-round text-black badge-primary badge-lg">Vender</span></a></div>


</div>              
</div> 

<?php 
mysqli_close($cmda); 
} ?>

</div>



      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIM MODAL PACOTES -->