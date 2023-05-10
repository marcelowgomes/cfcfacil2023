<?php
session_start();
include_once("bd/conexao.php");

$iduser = $_SESSION['id_user'];
$sqluser = "SELECT * FROM usuarios WHERE id_user = '$iduser'";
$exeuser = mysqli_query($conn, $sqluser);
$user = mysqli_fetch_array($exeuser);

$sql = "SELECT aluno_id, aluno_cpf FROM alunos WHERE aluno_cpf ='$_POST[cpf]'  ";
$resultado = mysqli_query($conn, $sql);
$total = mysqli_num_rows($resultado);	

                ?>


<?php if ($_POST[segunda] == 'sim') { 
    
 
$telefones = '{"telefones": ["'.@$_POST[telefone].','.$_POST[tipo].'"],}';

@$conn->query($insert = "INSERT INTO alunos (aluno_nome, aluno_cpf, aluno_endereco_cep, aluno_endereco_uf, aluno_endereco_cidade, 
aluno_endereco_rua, aluno_endereco_numero, aluno_endereco_complemento, aluno_endereco_bairro, aluno_telefones,
aluno_cadastro_quem, aluno_cfc ) VALUES ('$_POST[nome]','$_POST[cpf]','$_POST[cep]','$_POST[uf]','$_POST[cidade]',
'$_POST[rua]','$_POST[numero]','$_POST[complemento]','$_POST[bairro]','$telefones','$user[id_user]', '$user[user_empresa]' )");

$ultimo_id = $conn->insert_id;
    
    
    ?>

aguarde ....

<script>
    window.location.href = "perfil_aluno/<?php echo $ultimo_id  ?>/novavenda";
    </script>





<?php exit; } ?>


<?php if ($total >= '1') { ?>
<div class="alert-icon-area alert alert-warning " role="alert">
<div class="alert-icon">
   <img src="img/svg/layers.svg"  alt="layers" class="svg">
</div>
<div class="alert-content">
   <p>Ops!! Já existe um cadastro com esse cpf</p>
</div>
</div>

<?php } else {  ?>
    <br>
    <div class="alert-icon-area alert alert-success " role="alert">
<div class="alert-icon">
   <img src="img/svg/layers.svg"  alt="layers" class="svg">
</div>
<div class="alert-content">
   <p>Obá, tudo certo!! Complete o cadastro abaixo.</p>
</div>
</div>

<div class="row">
<div class="col-6">
   
<label class="form-group mb-10"> Nome: </label> 
<input type="text" required class="form-control" name="nome" value="<?php echo $_POST[nome] ?>">

</div> 

<div class="col-6">
   
<label class="form-group mb-10"> CPF: </label> 
<input type="text" required class="form-control" name="cpf" disabled  value="<?php echo $_POST[cpf] ?>">

</div> </div> 

<div class="col-12"><br> <h5> Endereço do aluno</h5><div> <br>


                     <div class="row">
                   
<div class="col-6">
   
<label class="form-group mb-10"> Cep: </label> 
<input type="text" required class="form-control" name="cep" id="cep">

</div> 



<div class="col-6">
   
<label class="form-group mb-10">  Rua: </label> 
<input type="text" required class="form-control" name="rua"  id="rua" >

</div> 


<div class="col-4">
   
<label> Numero: </label> 
<input type="text" required class="form-control" name="numero" >

</div> 

<div class="col-4">
   
<label> Complemento: </label> 
<input type="text"  class="form-control" name="complemento" >

</div> 

<div class="col-4">
   
<label> Bairro: </label> 
<input type="text" required class="form-control" name="bairro"  id="bairro">

</div> 

<div class="col-6">
   
<label> Cidade: </label> 
<input type="text" required class="form-control" name="cidade" id="cidade">

</div> 

<div class="col-6">
   
<label> Estado: </label> 
<input type="text" required class="form-control" name="uf" id="uf">

</div> 


<div class="col-12">
   <br>
<h5> Dados Contato</h5>
<br>
</div> 


<div class="col-6">
   
<label> Telefone: </label> 
<input type="text " required class="form-control" onKeyPress="MascaraGenerica(this, 'TELEFONE');"  name="telefone" >

</div> 


<div class="col-6">
<label> Tipo: </label> 
<select name="tipo" class="form-control">
  <option value="Celular" selected>Celular</option>
  <option value="Whatsapp" >Whatsapp</option>
  <option value="Fixo">Fixo</option>
  <option value="Recado">Recado</option>

</select>
</div> 

</div>
<input type="hidden"  class="form-control" name="segunda" value="sim">




<?php } ?>


<script type="text/javascript" >


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

    </script>