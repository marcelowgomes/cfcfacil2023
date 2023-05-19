<?php // CODIGO DA SESSION

if (!empty($_SESSION['id_user'])) {
} else {
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");
}
?>

<?php /// ALUNOS
$sql = "SELECT * FROM alunos WHERE aluno_cfc = '$user[user_empresa]' and aluno_status = '1' and aluno_lixeira = 1 order by aluno_nome";
$exe = mysqli_query($conn, $sql);
?>


               <div class="userDatatable adv-table-table global-shadow border-light-0 w-100 adv-table">
                  <div class="table-responsive">
                     <div class="adv-table-table__header">
                        <h4>Fluxo de Caixa > Alunos > Saídas</h4>
                        <div class="adv-table-table__button">
                          
                        </div>
                     </div>
                     <div id="filter-form-container"></div>

                     <table class="table mb-0 table-borderless adv-table" data-sorting="true" data-filter-container="#filter-form-container" data-paging-current="1" data-paging-position="right" data-paging-size="10">
                        <thead>
                           <tr class="userDatatable-header">
                              
                              <th>
                                 <span class="userDatatable-title">Nome</span>
                              </th>
                              <th>
                                 <span class="userDatatable-title">CPF</span>
                              </th>
                              <th>
                                 <span class="userDatatable-title">Telefone</span>
                              </th>
                              <th data-type="html" data-name='position'>
                                 <span class="userDatatable-title">Categoria</span>
                              </th>
                             <!--  <th>
                                 <span class="userDatatable-title">Última compra</span>
                              </th> -->
                             
                              <th>
                                 <span class="userDatatable-title float-end">Ações</span>
                              </th>
                           </tr>
                        </thead>
                      

                        <tbody>
                           
                        <?php
                        while( $user = mysqli_fetch_array($exe)) {
                        ?> 
                         
                        <tr>
                              <td>
                                 <div class="d-flex">
                                    <div class="userDatatable-inline-title">
                                       <a href="nova_saida/<?php echo $user['aluno_id'] ?>" class="text-dark fw-500">
                                          <h6><?php echo $user['aluno_nome'] ?> </h6>
                                       </a>
                                    </div>
                                 </div>
                              </td>
                              <td>
                                 <div class="userDatatable-content">
                                 <a href="nova_saida/<?php echo $user['aluno_id'] ?>" class="text-dark fw-500"> <?php echo $user['aluno_cpf'] ?></a>
                                 </div>
                              </td>
                              <td>
                                 <div class="userDatatable-content">
                                 <a href="nova_saida/<?php echo $user['aluno_id'] ?>" class="text-dark fw-500">  <?php echo $user['aluno_t1'] ?></a>




                                 
                                 </div>
                              </td>
                              <td>
                                 <div class="userDatatable-content">
                                 <a href="nova_saida/<?php echo $user['aluno_id'] ?>" class="text-dark fw-500"> <?php echo $user['aluno_categoria_pretendida'] ?></a>
                                 </div>
                              </td>
                           
                              <td>
                                 <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                    <li>
                                       <a href="nova_saida/<?php echo $user['aluno_id'] ?>" class="view">
                                          <i class="uil uil-plus"></i>
                                       </a>
                                    </li>
                                    
                                 </ul>
                              </td>
                        </tr>
                           
<?php } ?>
</tbody>
                              </table>
                           </div>
                        </div>

                     </div>
                  </div>
               </div>
            </div>
         </div>


         <?php
         if(isset($metodo) && $metodo == "editar"){
                $sql_alunos = "SELECT * FROM alunos WHERE aluno_id = $id";
                $alunos = mysqli_query($conn, $sql_alunos);
                $dados = $alunos->fetch_assoc();
            ?>
            
                <div class="modal fade show" id="modal-edicao-alun" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm modal-info  modal-lg" role="document">
                        <div class="modal-content ">
                            <div class="modal-body">
                                <div class="modal-info-body d-flex">
                                    <div class="modal-info-icon success">
                                        <img src="img/svg/alert-circle.svg" alt="alert-circle" class="svg">
                                    </div>
            
                                    <div class="modal-info-text">
                                        <h6>Para editar um Colaborador modifique os dados abaixo!</h6>
                                    </div> 
                                </div>
                                <BR>
                                <form action="editar_alunos/<?php echo $dados['aluno_id'] ?>" id="verificar" method="post">
                                <div class="row" id = "dvConteudo"> 
                                    <div class="col-6">
                                        <label> Nome </label> 
                                        <input type="text" required class="form-control" name="nome" id="nome" value="<?php echo $dados['aluno_nome'] ?>">
                                    </div>
                                    <div class="col-6">
                                        <label> CPF </label> 
                                        <input type="text" required class="form-control" name="cpf" id="cpf" value="<?php echo $dados['aluno_cpf'] ?>">
                                    </div>
                                    <div class="col-6">
                                        <label> Categoria </label> 
                                        <input type="text" required class="form-control" name="categoria" id="categoria" value="<?php echo $dados['aluno_categoria_pretendida'] ?>">
                                    </div>
                                    <div class="col-6">
                                        <label> Status </label> 
                                        <input type="text" required class="form-control" name="status" id="status" value="<?php echo $dados['aluno_status'] ?>">
                                    </div>
                                </div>
                            <div id="results"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light btn-outlined btn-sm" data-bs-dismiss="modal">Cancelar</button>
                                <button name="atualizado" type="submit" class="btn btn-info btn-outlined btn-sm">Atualizar</button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
                <script src="assets/vendor_assets/js/jquery/jquery-3.5.1.min.js"></script>
                <script>
                    $(document).ready(function(){
                        $('#modal-edicao-alun').modal('show')
                        $('.footer-wrapper').hide()
                    })
                </script>
                <?php
            }

            if(isset($metodo) && $metodo == "excluir"){
               ?>
               <div class="modal fade show" id="modal-exclusao-alun" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm modal-info  modal-lg" role="document">
                        <div class="modal-content ">
                            <div class="modal-body">
                                <div class="modal-info-body d-flex">
                                    <div class="modal-info-icon success">
                                        <img src="img/svg/alert-circle.svg" alt="alert-circle" class="svg">
                                    </div>
            
                                    <div class="modal-info-text">
                                        <h6>Tem certeza que deseja excluir esse aluno?</h6>
                                    </div>
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light btn-outlined btn-sm" data-bs-dismiss="modal">Cancelar</button>
                              <a href="excluir_aluno/<?php echo($id) ?>"><button name="atualizado" type="submit" class="btn btn-info btn-outlined btn-sm">Sim</button></a>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
                <script src="assets/vendor_assets/js/jquery/jquery-3.5.1.min.js"></script>
                <script>
                    $(document).ready(function(){
                        $('#modal-exclusao-alun').modal('show')
                        $('.footer-wrapper').hide()
                    })
                </script>
                <?php
            }