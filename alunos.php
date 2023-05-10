<?php // CODIGO DA SESSION

if (!empty($_SESSION['id_user'])) {
} else {
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");
}
?>

<?php /// ALUNOS
$sql = "SELECT * FROM alunos WHERE aluno_cfc = '$user[user_empresa]' and '1' order by aluno_nome";
$exe = mysqli_query($conn, $sql);
?>


               <div class="userDatatable adv-table-table global-shadow border-light-0 w-100 adv-table">
                  <div class="table-responsive">
                     <div class="adv-table-table__header">
                        <h4>Alunos</h4>
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
                              <th data-type="html" data-name='status'>
                                 <span class="userDatatable-title">Status</span>
                              </th>
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
                                       <a href="#" class="text-dark fw-500">
                                          <h6><?php echo $user['aluno_nome'] ?> </h6>
                                       </a>
                                    </div>
                                 </div>
                              </td>
                              <td>
                                 <div class="userDatatable-content">
                                 <?php echo $user['aluno_cpf'] ?>
                                 </div>
                              </td>
                              <td>
                                 <div class="userDatatable-content">
                                 <?php echo $user['aluno_t1'] ?>




                                 
                                 </div>
                              </td>
                              <td>
                                 <div class="userDatatable-content">
                                  B
                                 </div>
                              </td>
                            <!--  <td>
                                 <div class="userDatatable-content">
                                    January 20, 2020
                                 </div>
                              </td> -->
                              <td>
                                 <div class="userDatatable-content d-inline-block">
                                   <?php if ($user[aluno_status] == '1') { ?> 
                                    <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">Ativo</span><?php  } else { ?> 
                                       <span class="bg-opacity-danger  color-danger rounded-pill userDatatable-content-status active">Inativo</span> <?php } ?>
                                 </div>
                              </td>
                              <td>
                                 <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                    <li>
                                       <a href="perfil_aluno/<?php echo $user['aluno_id'] ?>" class="view">
                                          <i class="uil uil-eye"></i>
                                       </a>
                                    </li>
                                    <li>
                                       <a href="<?php echo $user['aluno_id'] ?>" class="edit">
                                          <i class="uil uil-edit"></i>
                                       </a>
                                    </li>
                                    <li>
                                       <a href="#" class="remove">
                                          <i class="uil uil-trash-alt"></i>
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