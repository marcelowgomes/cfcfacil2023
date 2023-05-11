
<?php 
if (!empty($_SESSION['id_user'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: logar.php");
}

?>      
<div class="container-fluid">
    <form method="post" action="mais_informacoes_colaboradores">
        <h2 class="my-3">Cadastrar Colaborador</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" name="cpf" required class="form-control ih-medium ip-light radius-xs b-light px-15" id="a1" onkeyup="cpfCheck(this)" maxlength="18" onkeydown="javascript: fMasc( this, mCPF );">
                </div>
            </div>
        </div>
        <!--  col-md-4   -->
        <h2 class="my-3">Tipo de cadastro</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="administrativo">Administrativo</label>
                    <select type="select"required class="form-control" id="administrativo" name="administrativo">
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
                    <select type="select" required class="form-control" id="pratico" name="pratico">
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
                    <select type="select" required class="form-control" id="teorico" name="teorico">
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



<script>
function is_cpf (c) {

if((c = c.replace(/[^\d]/g,"")).length != 11)
  return false

if (c == "00000000000")
  return false;

var r;
var s = 0;

for (i=1; i<=9; i++)
  s = s + parseInt(c[i-1]) * (11 - i);

r = (s * 10) % 11;

if ((r == 10) || (r == 11))
  r = 0;

if (r != parseInt(c[9]))
  return false;

s = 0;

for (i = 1; i <= 10; i++)
  s = s + parseInt(c[i-1]) * (12 - i);

r = (s * 10) % 11;

if ((r == 10) || (r == 11))
  r = 0;

if (r != parseInt(c[10]))
  return false;

return true;
}


function fMasc(objeto,mascara) {
obj=objeto
masc=mascara
setTimeout("fMascEx()",1)
}

function fMascEx() {
obj.value=masc(obj.value)
}

function mCPF(cpf){
cpf=cpf.replace(/\D/g,"")
cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
return cpf
}

cpfCheck = function (el) {
  document.getElementById('cpfResponse').innerHTML = is_cpf(el.value)? '<span style="color:green">  <div class="layout-button mt-10" id="botao"><button type="submit"  class="btn btn-primary btn-default btn-squared px-30">Avancar</button></div></span>' : '<span style="color:red">inválido</span>';
  if(el.value=='') document.getElementById('cpfResponse').innerHTML = '';
}

</script>