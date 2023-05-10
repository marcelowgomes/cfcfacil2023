<div class="container-fluid">
    <form method="post" action="mais_informacoes_colaboradores">
        <h2 class="my-3">Cadastrar Colaborador</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" class="form-control" placeholder="Informe o cpf" id="cpf" name="cpf">
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