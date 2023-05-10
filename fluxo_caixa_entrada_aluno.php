<?php
include_once 'bd/conexao.php';
$sql = "SELECT * from alunos WHERE aluno_id = '$id'";
$aluno = mysqli_query($conn, $sql);
$dados = mysqli_fetch_assoc($aluno);
$pattern = '/\(\d+\)[ ]?\d+[-. ]?\d+/';
preg_match($pattern, $dados["aluno_telefones"], $matches);
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

    <div class="row mt-5">
        <div class="row">
            <div class="d-flex">
                <a href="nova_venda/<?php echo($id) ?>"><button class="btn btn-success">Nova Venda</button></a>
                <a href="venda_pacotes/<?php echo($id) ?>"><button class="mx-2 btn btn-info ">Venda Pacotes</button></a>
                <button class="btn btn-dark" style="width: 140px">Ficha</button>
            </div>
        </div>
    </div>
</div>