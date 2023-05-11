<?php
include_once "bd/conexao.php";
$sql = "SELECT * FROM colaboradores where colaborador_cfc = $user[user_empresa] ";
$colaborador = mysqli_query($conn, $sql);

?>

<div class="container-fluid">
    <div class="card card-horizontal card-default card-md mb-4">
        <h1 class="text-center my-5">Listar Colaboradores</h1>
        <div class="card-body py-md-30">
            <?php
            if (mysqli_num_rows($colaborador) > 0) {
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
                    <span class="userDatatable-title">CPF</span>
                </th>
                <th>
                    <span class="userDatatable-title">Telefone</span>
                </th>';
                $dados .= '</tr>';
                $dados .= '</thead>';

                // Exibindo cada colaborador como uma linha da tabela
                while ($row = mysqli_fetch_assoc($colaborador)) {
                    $dados .= '<tbody>';
                    $dados .= "<tr>";
                    $dados .= "<td>" . $row["colaborador_id"] . "</td>";
                    $dados .= "<td>" . $row["colaborador_nome"] . "</td>";
                    $dados .= "<td>" . $row["colaborador_cpf"] . "</td>";
                    $dados .= "<td>" . $row["colaborador_telefone"] . "</td>";
                }
                $dados .= "</tbody>";
                $dados .= "</table>";
                $dados .= "</div>";
                $dados .= "</div>";

                echo $dados;
            }

