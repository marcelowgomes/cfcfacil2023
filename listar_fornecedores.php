<?php
include_once "bd/conexao.php";
$sql = "SELECT * FROM fornecedores";
$fornecedores = mysqli_query($conn, $sql);

?>

<div class="container-fluid">
    <div class="card card-horizontal card-default card-md mb-4">
        <h1 class="text-center my-5">Listar Fornecedores</h1>
        <div class="card-body py-md-30">
            <?php
            if (mysqli_num_rows($fornecedores) > 0) {
                $dados = '<div class="userDatatable userDatatable--ticket userDatatable--ticket--2 mt-1" id="form-geral">';
                $dados .= '<div class="table-responsive">';
                $dados .= '<table class="table mb-0 table-borderless">';
                $dados .= '<thead>';
                $dados .= '<tr class="userDatatable-header">';
                $dados .= '<th>
                
                
                <span class="userDatatable-title">Registro</span>
                </th>
                <th>
                    <span class="userDatatable-title">Nome</span>
                </th>
                <th>
                    <span class="userDatatable-title">CPF/CNPJ</span>
                </th>
                <th>
                    <span class="userDatatable-title">Telefone</span>
                </th>
                <th>
                    <span class="userDatatable-title">Contato</span>
                </th>
                <th>
                    <span class="userDatatable-title">Cep</span>
                </th>
                <th>
                    <span class="userDatatable-title">Rua</span>
                </th>
                <th>
                    <span class="userDatatable-title">Número</span>
                </th>
                <th>
                    <span class="userDatatable-title">Bairro</span>
                </th>
                <th>
                    <span class="userDatatable-title">Cidade</span>
                </th>
                <th>
                    <span class="userDatatable-title">Estado</span>
                </th>
                <th>
                    <span class="userDatatable-title"></span>
                </th>';
                $dados .= '</tr>';
                $dados .= '</thead>';
                
                // Exibindo cada lead como uma linha da tabela
                while ($row = mysqli_fetch_assoc($fornecedores)) {
                    $dados .= '<tbody>';
                    $dados .= "<tr>";
                    $dados .= "<td>" . $row["fornecedor_id"] . "</td>";
                    $dados .= "<td>" . $row["fornecedor_nome"] . "</td>";
                    $dados .= "<td>" . $row["fornecedor_cpf"] . "</td>";
                    $dados .= "<td>" . $row["fornecedor_telefone"] . "</td>";
                    $dados .= "<td>" . $row["fornecedor_contato"] . "</td>";
                    $dados .= "<td>" . $row["fornecedor_cep"] . "</td>";
                    $dados .= "<td>" . $row["fornecedor_rua"] . "</td>";
                    $dados .= "<td>" . $row["fornecedor_numero"] . "</td>";
                    $dados .= "<td>" . $row["fornecedor_bairro"] . "</td>";
                    $dados .= "<td>" . $row["fornecedor_cidade"] . "</td>";
                    $dados .= "<td>" . $row["fornecedor_estado"] . "</td>";
                    $dados .= 
                    '<td>
                        <ul style="display: flex; flex-direction: row;">
                            <li style="padding: 2px;">
                                <a class="edit" href="listar_fornecedores/editar/'.$row['fornecedor_id'].'">
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
                $sql = "SELECT * FROM fornecedores WHERE fornecedor_id = '$id'";
                $fornecedor = mysqli_query($conn, $sql);
                $dados = $fornecedor->fetch_assoc();
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
                                        <h6>Para editar um Fornecedor modifique os dados abaixo!</h6>
                                    </div> 
                                </div>
                                <BR>
                                <form action="editar_fornecedores/<?php echo $dados['fornecedor_id'] ?>" id="verificar" method="post">
                                <div class="row" id = "dvConteudo"> 
                                    <div class="col-6">
                                        <label> Nome </label> 
                                        <input type="text" required class="form-control" name="nome" id="nome" value="<?php echo $dados['fornecedor_nome'] ?>">
                                    </div>
                                    <div class="col-6">
                                        <label> CPF </label> 
                                        <input type="text" required class="form-control" name="cpf" id="cpf" value="<?php echo $dados['fornecedor_cpf'] ?>">
                                    </div>
                                    <div class="col-6">
                                        <label> Telefone </label> 
                                        <input type="text" required class="form-control" name="telefone" id="telefone" value="<?php echo $dados['fornecedor_telefone'] ?>">
                                    </div>
                                    <div class="col-6">
                                        <label> Contato </label> 
                                        <input type="text" required class="form-control" name="contato" id="contato" value="<?php echo $dados['fornecedor_contato'] ?>">
                                    </div>
                                    <div class="col-6">
                                        <label> CEP </label> 
                                        <input type="text" required class="form-control" name="cep" id="cep" value="<?php echo $dados['fornecedor_cep'] ?>">
                                    </div>
                                    <div class="col-6">
                                        <label> Rua </label> 
                                        <input type="text" required class="form-control" name="rua" id="rua" value="<?php echo $dados['fornecedor_rua'] ?>">
                                    </div>
                                    <div class="col-6">
                                        <label> Numero </label> 
                                        <input type="text" required class="form-control" name="numero" id="numero" value="<?php echo $dados['fornecedor_numero'] ?>">
                                    </div>
                                    <div class="col-6">
                                        <label> Bairro </label> 
                                        <input type="text" required class="form-control" name="bairro" id="bairro" value="<?php echo $dados['fornecedor_bairro'] ?>">
                                    </div>
                                    <div class="col-6">
                                        <label> Cidade </label> 
                                        <input type="text" required class="form-control" name="cidade" id="cidade" value="<?php echo $dados['fornecedor_cidade'] ?>">
                                    </div>
                                    <div class="col-6">
                                        <label> Estado </label> 
                                        <input type="text" required class="form-control" name="estado" id="estado" value="<?php echo $dados['fornecedor_estado'] ?>">
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
