<?php
include_once "bd/conexao.php";
$sql = "SELECT * FROM colaboradores";
$colaborador = mysqli_query($conn, $sql);

if (!empty($_SESSION['id_user'])) {
} else {
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");
}
?>

<div class="container-fluid">
    <div class="card card-horizontal card-default card-md mb-4">
        <div class="adv-table-table__header">
            <h4>Colaboradores</h4>
            <div class="adv-table-table__button">

            </div>
        </div>
        <div class="card-body py-md-30">
            <?php
            if (mysqli_num_rows($colaborador) > 0) {
                $dados = '<div class="userDatatable userDatatable--ticket userDatatable--ticket--2 mt-1" id="form-geral">';
                $dados .= '<div class="table-responsive" style="margin-left: -30px">';
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
                    <span class="userDatatable-title">CPF</span>
                </th>
                <th>
                    <span class="userDatatable-title">RG</span>
                </th>
                <th>
                </th>
                ';
                $dados .= '</tr>';
                $dados .= '</thead>';

                // Exibindo cada colaborador como uma linha da tabela
                while ($row = mysqli_fetch_assoc($colaborador)) {
                    $dados .= '<tbody>';
                    $dados .= "<tr>";
                    $dados .= "<td>" . $row["colaborador_id"] . "</td>";
                    $dados .= "<td>" . $row["colaborador_nome"] . "</td>";
                    $dados .= "<td>" . $row["colaborador_cpf"] . "</td>";
                    $dados .= "<td>" . $row["colaborador_rg"] . "</td>";
                    $dados .=
                    '<td>
                        <ul style="display: flex; flex-direction: row;">
                            <li style="padding: 2px;">
                                <a class="edit" href="listar_colaboradores/editar/' . $row['colaborador_id'] . '">
                                    <i class="uil uil-edit" data-bs-toggle="modal" data-bs-target="#modal-edicao-colab"></i>
                                </a>
                            </li>
                        </ul>
                    </td>';
                }

                $dados .= "</tbody>";
                $dados .= "</table>";
                $dados .= "</div>";
                $dados .= "</div>";

                echo $dados;
            }

            if(isset($metodo) && $metodo == "editar"){
                $sql_colaborador = "SELECT * FROM colaboradores WHERE colaborador_id = $id";
                $colaborador = mysqli_query($conn, $sql_colaborador);
                $dados = $colaborador->fetch_assoc();
            ?>
            
                <div class="modal fade show" id="modal-edicao-colab" tabindex="-1" role="dialog" aria-hidden="true">
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
                                <form action="editar_colaboradores/<?php echo $dados['colaborador_id'] ?>" id="verificar" method="post">
                                <div class="row" id = "dvConteudo"> 
                                    <div class="col-6">
                                        <label> Nome </label> 
                                        <input type="text" required class="form-control" name="nome" id="nome" value="<?php echo $dados['colaborador_nome'] ?>">
                                    </div>
                                    <div class="col-6">
                                        <label> CPF </label> 
                                        <input type="text" required class="form-control" name="cpf" id="cpf" value="<?php echo $dados['colaborador_cpf'] ?>">
                                    </div>
                                    <div class="col-6">
                                        <label> RG </label> 
                                        <input type="text" required class="form-control" name="rg" id="rg" value="<?php echo $dados['colaborador_rg'] ?>">
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
                        $('#modal-edicao-colab').modal('show')
                        $('.footer-wrapper').hide()
                    })
                </script>
                <?php
            }
