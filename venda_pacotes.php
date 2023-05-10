<?php
include_once "bd/conexao.php";
$sql = "SELECT * from alunos WHERE aluno_id = '$id'";
$aluno = mysqli_query($conn, $sql);
$dados = mysqli_fetch_assoc($aluno);
$pattern = '/\(\d+\)[ ]?\d+[-. ]?\d+/';
preg_match($pattern, $dados["aluno_telefones"], $matches);
$sql2 = "SELECT * FROM pacotes";
$pacotes = mysqli_query($conn, $sql2);
?>

<div class="container-fluid">
    <div class="row rounded p-2" style="background-color: #F4F5F7">
        <div class="col">
            <h2>
                <?php echo ($dados['aluno_nome']) ?>
            </h2>
            <div class='mt-2 d-flex'>
                <p><strong>CPF: </strong><?php echo ($dados['aluno_cpf']) ?></p>&nbsp; -
                <p class='mx-2'><strong>Telefone: </strong><?php echo ($matches[0]) ?></p>
            </div>
        </div>
    </div>

    <div class="card card-horizontal card-default card-md mb-4">
        <h2 class="text my-2">Pacotes</h2>
        <span>Temos um total de <?php echo (mysqli_num_rows($pacotes)) ?> pacotes cadastrados</span>
        <div class="card-body py-md-30">
            <?php
            if (mysqli_num_rows($pacotes) > 0) {
                $dados = '<div class="userDatatable userDatatable--ticket userDatatable--ticket--2 mt-1" id="form-geral">';
                $dados .= '<div class="table-responsive">';
                $dados .= '<table class="table mb-0 table-borderless">';
                $dados .= '<thead>';
                $dados .= '<tr class="userDatatable-header">';
                $dados .= '<th>
                <span class="userDatatable-title">Título</span>
                </th>
                <th>
                    <span class="userDatatable-title">Valor</span>
                </th>
                <th>
                    <span class="userDatatable-title">Produtos</span>
                </th>
                <th>
                    <span class="userDatatable-title">Ações</span>
                </th>';
                $dados .= '</tr>';
                $dados .= '</thead>';
                while ($row = mysqli_fetch_assoc($pacotes)) {
                    $dados .= '<tbody>';
                    $dados .= "<tr>";
                    $dados .= "<td>" . $row["titulo_pacote"] . "</td>";
                    $dados .= "<td>" . $row["valor_pacote"] . "</td>";
                    $dados .= '<td><button class="btn btn-primary notika-btn-primary btn-xs waves-effect" data-toggle="modal" data-target="#itens1"><i class="fa fa-plus"></i> Ver itens</button></td>';
                    $dados .= '<td> <a href="venda_pacote2/'.$id.'/'.$row['id_pacote'].'">
                    <button class="btn btn-success notika-btn-success btn-xs waves-effect" data-toggle="modal" data-target="#vender">Vender</button>
                  </a></td>';
                }
                $dados .= "</tbody>";
                $dados .= "</table>";
                $dados .= "</div>";
                $dados .= "</div>";

                echo ($dados);
            }
