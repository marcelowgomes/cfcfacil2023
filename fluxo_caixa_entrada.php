<?php
include_once "bd/conexao.php";
$sql = "SELECT * FROM alunos";
$alunos = mysqli_query($conn, $sql);
?>

<div class="container-fluid">
    <div class="card card-horizontal card-default card-md mb-4">
        <h2 class="text my-2">Alunos</h2>
        <span>Temos um total de <?php echo(mysqli_num_rows($alunos)) ?> alunos cadastrados</span>
        <div class="card-body py-md-30">
            <?php
            if (mysqli_num_rows($alunos) > 0) {
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
                </th>
                <th>
                    <span class="userDatatable-title"></span>
                </th>';
                $dados .= '</tr>';
                $dados .= '</thead>';
           
                // Exibindo cada aluno como uma linha da tabela

                while($row = mysqli_fetch_assoc($alunos)){
                    $pattern = '/\(\d+\)[ ]?\d+[-. ]?\d+/';
                    preg_match($pattern, $row["aluno_telefones"], $matches);
                    $dados .= '<tbody>';
                    $dados .= "<tr>";
                    $dados .= "<td>" . $row["aluno_id"] . "</td>";
                    $dados .= "<td>" . $row["aluno_nome"] . "</td>";
                    $dados .= "<td>" . $row["aluno_cpf"] . "</td>";
                    $dados .= "<td>" . $matches[0] . "</td>";
                    $dados .= '<td>
                                    <ul style="display: flex; flex-direction: row;">
                                        <li style="padding: 2px;">
                                            <a class="edit" href="entrada_aluno/'.$row['aluno_id'].'">
                                                <i class="uil uil-plus" data-bs-toggle="modal" data-bs-target="#modal-edicao"></i>
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