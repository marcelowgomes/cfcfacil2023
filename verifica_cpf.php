<?php
session_start();
include_once "bd/conexao.php";
$iduser = $_SESSION['id_user'];
$sqluser = "SELECT * FROM usuarios WHERE id_user = '$iduser'";
$exeuser = mysqli_query($conn, $sqluser);
$user = mysqli_fetch_array($exeuser);


/// verificando se existe cpf cadastrado

$sqlcpf = "SELECT * FROM alunos WHERE aluno_cpf = '$_POST[cpf2]' and aluno_cfc = $user[user_empresa] ";
$execpf = mysqli_query($conn, $sqlcpf);
$totaluser = mysqli_num_rows($execpf);
?>

<?php if($totaluser > '0') { ?>
CPF JA CADASTRADO

<?PHP } else {?>

<form method="post" action="inserir_aluno">
<div class="row">

<div class="col-12"> 
<label for="a1" class="il-gray fs-14 fw-500 align-center mb-10">Informe o nome completo</label>
<input type="text" name="nome" required class="form-control ih-medium ip-light radius-xs b-light px-15" id="a1">
</div>     

<div class="col-6"> 
<label for="a1" class="il-gray fs-14 fw-500 align-center mb-10">Identidade</label>
<input type="text" name="rg"  class="form-control ih-medium ip-light radius-xs b-light px-15" id="a1">
</div>  

<div class="col-6"> 
<label for="a1" class="il-gray fs-14 fw-500 align-center mb-10">Orgão Expedidor:</label>
<input type="text" name="expedidor"  class="form-control ih-medium ip-light radius-xs b-light px-15" id="a1">
</div>   


<div class="col-6"> 
<label for="a1" class="il-gray fs-14 fw-500 align-center mb-10">Estado Expedidor: *</label>

<select id="estado" name="ufexpedidor" class="form-control ih-medium ip-light radius-xs b-light px-15">
    <option value="">Informe</option>
    <option value="AC">Acre</option>
    <option value="AL">Alagoas</option>
    <option value="AP">Amapá</option>
    <option value="AM">Amazonas</option>
    <option value="BA">Bahia</option>
    <option value="CE">Ceará</option>
    <option value="DF">Distrito Federal</option>
    <option value="ES">Espírito Santo</option>
    <option value="GO">Goiás</option>
    <option value="MA">Maranhão</option>
    <option value="MT">Mato Grosso</option>
    <option value="MS">Mato Grosso do Sul</option>
    <option value="MG">Minas Gerais</option>
    <option value="PA">Pará</option>
    <option value="PB">Paraíba</option>
    <option value="PR">Paraná</option>
    <option value="PE">Pernambuco</option>
    <option value="PI">Piauí</option>
    <option value="RJ">Rio de Janeiro</option>
    <option value="RN">Rio Grande do Norte</option>
    <option value="RS">Rio Grande do Sul</option>
    <option value="RO">Rondônia</option>
    <option value="RR">Roraima</option>
    <option value="SC">Santa Catarina</option>
    <option value="SP">São Paulo</option>
    <option value="SE">Sergipe</option>
    <option value="TO">Tocantins</option>
    <option value="EX">Estrangeiro</option>
</select>

</div>   

<div class="col-6"> 
<label for="a1" class="il-gray fs-14 fw-500 align-center mb-10">Data Nascimento: *</label>
<input type="date" name="nascimento" required class="form-control ih-medium ip-light radius-xs b-light px-15" id="a1">
</div>   

<div class="col-6"> 
<label for="a1" class="il-gray fs-14 fw-500 align-center mb-10">Sexo *</label>
<select name="sexo" class="form-control ih-medium ip-light radius-xs b-light px-15">
    <option value="">Informe</option>
    <option value="Masculino">Masculino</option>
    <option value="Feminino">Feminino</option>

</select></div>   


<div class="col-6"> 
<label for="a1" class="il-gray fs-14 fw-500 align-center mb-10">Categoria Pretendida</label>
<select name="pretendida" class="form-control ih-medium ip-light radius-xs b-light px-15">
    <option value="">Informe</option>
    <option value="A">A</option>
    <option value="B">B</option>
    <option value="C">C</option>
    <option value="D">D</option>
    <option value="E">E</option>
    <option value="ACC">ACC</option>
    <option value="Simultânea">Simultânea</option>
</select>
</div>   
</div>

<br>

<h5>Dados Contato</h5><br>
<div class="row">

<div class="col-6"> 
<label for="a1" class="il-gray fs-14 fw-500 align-center mb-10">Telefone</label>
<input type="text" name="t1" maxlength="15" onkeyup="handlePhone(event)"  required class="form-control ih-medium ip-light radius-xs b-light px-15" id="a1">
</div>  

<div class="col-6"> 
<label for="a1" class="il-gray fs-14 fw-500 align-center mb-10">É whatsaap? </label>
<select name="w1" required class="form-control ih-medium ip-light radius-xs b-light px-15">
    <option value="">Informe</option>
    <option value="Sim">Sim</option>
    <option value="Não">Não</option>
</select>
</div>  

<div class="col-6"> 
<label for="a1" class="il-gray fs-14 fw-500 align-center mb-10">Telefone alternativo</label>
<input type="text" name="t2" maxlength="15" onkeyup="handlePhone(event)"   class="form-control ih-medium ip-light radius-xs b-light px-15" id="a1">
</div>  

<div class="col-6"> 
<label for="a1" class="il-gray fs-14 fw-500 align-center mb-10">É whatsaap? </label>
<select name="w2" class="form-control ih-medium ip-light radius-xs b-light px-15">
    <option value="">Informe</option>
    <option value="Sim">Sim</option>
    <option value="Não">Não</option>
</select>
</div>  
</div> 

<div class="col-6"> 
<label for="a1" class="il-gray fs-14 fw-500 align-center mb-10">E-mail: </label>
<input type="text" name="email"  class="form-control ih-medium ip-light radius-xs b-light px-15" id="a1">
</div> 
</div>  
<br>

<h5>Endereço</h5><br>
<div class="row">

<div class="col-6"> 
<label for="a1" class="il-gray fs-14 fw-500 align-center mb-10"  >Cep</label>
<input type="text" name="cep"  class="form-control ih-medium ip-light radius-xs b-light px-15" maxlength="8"  id="cep">
</div> 

<div class="col-6"> 
<label for="a1" class="il-gray fs-14 fw-500 align-center mb-10">Lagradouro</label>
<input type="text" name="rua"  class="form-control ih-medium ip-light radius-xs b-light px-15" id="rua">
</div> 

<div class="col-6"> 
<label for="a1" class="il-gray fs-14 fw-500 align-center mb-10">Numero</label>
<input type="text" name="numero"  class="form-control ih-medium ip-light radius-xs b-light px-15" id="a1">
</div> 

<div class="col-6"> 
<label for="a1" class="il-gray fs-14 fw-500 align-center mb-10">Complemento</label>
<input type="text" name="complemento"  class="form-control ih-medium ip-light radius-xs b-light px-15" id="a1">
</div> 

<div class="col-6"> 
<label for="a1" class="il-gray fs-14 fw-500 align-center mb-10">Bairro</label>
<input type="text" name="bairro"  class="form-control ih-medium ip-light radius-xs b-light px-15" id="bairro">
</div>

<div class="col-6"> 
<label for="a1" class="il-gray fs-14 fw-500 align-center mb-10">Cidade</label>
<input type="text" name="cidade"  class="form-control ih-medium ip-light radius-xs b-light px-15" id="cidade">
</div>

<div class="col-6"> 
<label for="a1" class="il-gray fs-14 fw-500 align-center mb-10">Estado</label>
<input type="text" name="estado"  class="form-control ih-medium ip-light radius-xs b-light px-15" id="uf">
</div>

<input type="hidden" name="cpf" value = "<?php echo $_POST['cpf2'] ?>" class="form-control ih-medium ip-light radius-xs b-light px-15" id="uf">

</div> 
<br>

<Button class="btn btn-info"> Cadastrar</Button>
<br>

</form>
<?php } ?>



<script type="text/javascript" >

const handlePhone = (event) => {
  let input = event.target
  input.value = phoneMask(input.value)
}

const phoneMask = (value) => {
  if (!value) return ""
  value = value.replace(/\D/g,'')
  value = value.replace(/(\d{2})(\d)/,"($1) $2")
  value = value.replace(/(\d)(\d{4})$/,"$1-$2")
  return value
}

$(document).ready(function () {
   $('input').keypress(function (e) {
        var code = null;
        code = (e.keyCode ? e.keyCode : e.which);                
        return (code == 13) ? false : true;
   });
});

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });


        function fMasc(objeto,mascara) {
				obj=objeto
				masc=mascara
				setTimeout("fMascEx()",1)
			}
			function fMascEx() {
				obj.value=masc(obj.value)
			}
			function mTel(tel) {
				tel=tel.replace(/\D/g,"")
				tel=tel.replace(/^(\d)/,"($1")
				tel=tel.replace(/(.{3})(\d)/,"$1)$2")
				if(tel.length == 9) {
					tel=tel.replace(/(.{1})$/,"-$1")
				} else if (tel.length == 10) {
					tel=tel.replace(/(.{2})$/,"-$1")
				} else if (tel.length == 11) {
					tel=tel.replace(/(.{3})$/,"-$1")
				} else if (tel.length == 12) {
					tel=tel.replace(/(.{4})$/,"-$1")
				} else if (tel.length > 12) {
					tel=tel.replace(/(.{4})$/,"-$1")
				}
				return tel;
			}
			function mCNPJ(cnpj){
				cnpj=cnpj.replace(/\D/g,"")
				cnpj=cnpj.replace(/^(\d{2})(\d)/,"$1.$2")
				cnpj=cnpj.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")
				cnpj=cnpj.replace(/\.(\d{3})(\d)/,".$1/$2")
				cnpj=cnpj.replace(/(\d{4})(\d)/,"$1-$2")
				return cnpj
			}
			function mCPF(cpf){
				cpf=cpf.replace(/\D/g,"")
				cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
				cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
				cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
				return cpf
			}
			function mCEP(cep){
				cep=cep.replace(/\D/g,"")
				cep=cep.replace(/^(\d{2})(\d)/,"$1.$2")
				cep=cep.replace(/\.(\d{3})(\d)/,".$1-$2")
				return cep
			}
			function mNum(num){
				num=num.replace(/\D/g,"")
				return num
			}
    </script>