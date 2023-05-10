<?php 
if (!empty($_SESSION['id_cliente'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: logar.php");
}

?>

<div class="container-fluid">
    <div class="header rounded p-4" style="background-color: #F4F5F7">
        <h2 class='mb-2'>Cadastrar Receitas e Despesas</h2>
        <span>Complete cadastro abaixo</span>
    </div>

    <div class="row mt-4 rounded p-3" style="background-color: #F4F5F7">
        <h2 class='mb-2'>Dados</h2>
        <form action="confirmar_cadastro_receitas" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Informe o Tipo</label>
                        <select class="form-select" name="tipo">
                            <option value="">Escolha</option>
                            <option value="Aulas">Aulas</option>
                            <option value="Taxas">Taxas</option>
                            <option value="Cursos">Cursos</option>
                            <option value="Outros">Outros</option>
                            <option value="Locação">Locação</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Ocorrência Caixa</label>
                        <select class="form-select" name="ocorrencia">
                            <option value="">Escolha</option>
                            <option value="Entrada">Entrada</option>
                            <option value="Saida">Saída</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Incidência</label>
                        <select class="form-select" name="incidencia">
                            <option value="">Escolha</option>
                            <option value="Aluno">Aluno</option>
                            <option value="Fornecedor">Fornecedor</option>
                            <option value="Veiculos">Veículos</option>
                            <option value="Colaborador">Colaborador</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Valor</label>
                        <input type="text" class="form-control" name="valor">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Disponível para venda?</label>
                        <select class="form-select" name="disponivel">
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Título</label>
                        <input type="text" class="form-control" name="titulo">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Valor de custo</label>
                        <input type="text" class="form-control" name="valor_custo">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-info">CADASTRAR</button>
        </form>
    </div>
</div>