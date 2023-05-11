<?php
include_once "bd/conexao.php";
$sql = "SELECT * FROM veiculos where veiculo_cfc = $user[user_empresa]";
$veiculos = mysqli_query($conn, $sql);

?>

<div class="container-fluid">
    <div class="card card-horizontal card-default card-md mb-4">
    <div class="adv-table-table__header">
                        <h4>Veículos</h4>
                        <div class="adv-table-table__button">
                          
                        </div>
                     </div>
        <div class="card-body py-md-30">
            <?php
            if (mysqli_num_rows($veiculos) > 0) {
                $dados = '<div class="userDatatable userDatatable--ticket userDatatable--ticket--2 mt-1" id="form-geral">';
                $dados .= '<div class="table-responsive" style="margin-left: -30px">';
                $dados .= '<table class="table mb-0 table-borderless" >';
                $dados .= '<thead>';
                $dados .= '<tr class="userDatatable-header">';
                $dados .= '<th>
                <span class="userDatatable-title">Registro</span>
                </th>
                <th>
                    <span class="userDatatable-title">Tipo</span>
                </th>
                <th>
                    <span class="userDatatable-title">Placa</span>
                </th>
                <th>
                    <span class="userDatatable-title">Marca/Modelo</span>
                </th>
                <th>
                    <span class="userDatatable-title">Cor</span>
                </th>
                <th>
                    <span class="userDatatable-title">Fabricação/Modelo</span>
                </th>
                <th>
                    <span class="userDatatable-title"></span>
                </th>';
                $dados .= '</tr>';
                $dados .= '</thead>';
                $dados .= '<tbody>';
                // Exibindo cada lead como uma linha da tabela
                while ($row = mysqli_fetch_assoc($veiculos)) {
                    $dados .= "<tr>";
                    $dados .= "<td>" . $row["id_veiculo"] . "</td>";
                    $dados .= "<td>" . $row["tipo_veiculo"] . "</td>";
                    $dados .= "<td>" . $row["placa_veiculo"] . "</td>";
                    $dados .= "<td>" . $row["marca_veiculo"] . "</td>";
                    $dados .= "<td>" . $row["cor_veiculo"] . "</td>";
                    $dados .= "<td>" . $row["ano_fabricacao_veiculo"] . "/" . $row["ano_modelo_veiculo"] . "</td>";
                    $dados .= 
                    '<td>
                        <ul style="display: flex; flex-direction: row;">
                            <li style="padding: 2px;">
                                <a class="edit" href="listar_veiculo/editar/'.$row['id_veiculo'].'">
                                    <i class="uil uil-edit" data-bs-toggle="modal" data-bs-target="#modal-edicao"></i>
                                </a>
                            </li>
                        </ul>
                    </td>
                    ';
                }
                $dados .= "</tbody>";
                $dados .= "</table>";
                $dados .= "</div>";
                $dados .= "</div>";

                echo $dados;
            }

            if(isset($metodo) && $metodo == "editar"){
                $sql = "SELECT * FROM veiculos WHERE id_veiculo = '$id'";
                $veiculo = mysqli_query($conn, $sql);
                $dados = $veiculo->fetch_array(); 
            ?>
            
                <div class="modal fade show" id="modal-edicao" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm modal-info  modal-lg" role="document">
                        <div class="modal-content ">
                            <div class="modal-body">
                                <div class="modal-info-body d-flex">
                                    <div class="modal-info-icon success">
                                        <img src="img/svg/alert-circle.svg" alt="alert-circle" class="svg">
                                    </div>
            
                                    <div class="modal-info-text">
                                        <h6>Para editar um Veículo modifique os dados abaixo!</h6>
                                    </div> 
                                </div>
                                <BR>
                                <form action="editar_veiculo/<?php echo $dados['id_veiculo'] ?>" id="verificar" method="post">
                                <div class="row" id = "dvConteudo"> 
                                    <div class="col-6">
                                        <label> Placa </label> 
                                        <input type="text" required class="form-control" name="placa" id="placa" value="<?php echo $dados['placa_veiculo'] ?>">
                                    </div>
                                    <div class="col-6">
                                        <label> Tipo </label> 
                                        <input type="text" required class="form-control" name="tipo" id="tipo" value="<?php echo $dados['tipo_veiculo'] ?>">
                                    </div>
                                    <div class="col-6">
                                        <label> Marca </label> 
                                        <input type="text" required class="form-control" name="marca" id="marca" value="<?php echo $dados['marca_veiculo'] ?>">
                                    </div>
                                    <div class="col-6">
                                        <label> Ano Fabricação </label> 
                                        <input type="text" required class="form-control" name="ano_fabricacao" id="ano_fabricacao" value="<?php echo $dados['ano_fabricacao_veiculo'] ?>">
                                    </div>
                                    <div class="col-6">
                                        <label> Ano Modelo </label> 
                                        <input type="text" required class="form-control" name="ano_modelo" id="ano_modelo" value="<?php echo $dados['ano_modelo_veiculo'] ?>">
                                    </div>
                                    <div class="col-6">
                                        <label> Cor </label> 
                                        <input type="text" required class="form-control" name="cor" id="cor" value="<?php echo $dados['cor_veiculo'] ?>">
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
                        $('#modal-edicao').modal('show')
                        $('.footer-wrapper').hide()
                    })
                </script>
                <?php
            }
