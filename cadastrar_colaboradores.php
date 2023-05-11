<?php
if (!empty($_SESSION['id_user'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: logar.php");
}

?>

<div class="container-fluid">
    <div>

        <div>
            <h4 style="margin-left: -30px">Novo cadastro colaborador </h4>

        </div>
    </div>
</div>
</div>

<br>
<div class="container-fluid" style="background-color: white; border-radius: 10px; padding: 15px">
    <form method="post" action="mais_informacoes_colaboradores">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" name="cpf2" required class="form-control ih-medium ip-light radius-xs b-light px-15" id="a1" onkeyup="cpfCheck(this)" maxlength="18" onkeydown="javascript: fMasc( this, mCPF );">
                </div>
            </div>
        </div>
        <!--  col-md-4   -->
        <h2 class="my-3">Tipo de cadastro</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="administrativo">Administrativo</label>
                    <select type="select" class="form-control" id="administrativo" name="administrativo">
                        <option value="" selected>Informe</option>
                        <option value="1">SIM</option>
                        <option value="0">NÃO</option>
                    </select>

                </div>
            </div>
            <!--  col-md-4   -->



            <div class="col-md-4">
                <div class="form-group">
                    <label for="pratico">Prático</label>
                    <select type="select" class="form-control" id="pratico" name="pratico">
                        <option value="" selected>Informe</option>
                        <option value="1">SIM</option>
                        <option value="0">NÃO</option>
                    </select>
                </div>


            </div>
            <!--  col-md-4   -->

            <div class="col-md-4">

                <div class="form-group">
                    <label for="teorico">Teórico</label>
                    <select type="select" class="form-control" id="teorico" name="teorico">
                        <option value="" selected>Informe</option>
                        <option value="1">SIM</option>
                        <option value="0">NÃO</option>
                    </select>
                </div>
            </div>

        </div>
        <!--  row   -->

        <td>
            <strong>Administrativo:</strong>
            Recepcionistas, gerente, sócios,etc...
        </td>
        <br>


        <td>
            <strong>Prático:</strong>
            Instrutor categoria A,B,C,D OU E
        </td>
        <br>


        <td>
            <strong>Teórico:</strong>
            Professor de legislação
        </td>
        <br><br>


        <button type="submit" name="submit" class="btn btn-primary">Avançar</button>
    </form>
</div>