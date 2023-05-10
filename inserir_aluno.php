<?php
session_start();

 
include_once "bd/conexao.php";
$iduser = $_SESSION['id_user'];
$sqluser = "SELECT * FROM usuarios WHERE id_user = '$iduser'";
$exeuser = mysqli_query($conn, $sqluser);
$user = mysqli_fetch_array($exeuser);



    $sql = "INSERT INTO alunos (aluno_nome, aluno_cpf, aluno_rg, aluno_rg_expedidor, aluno_rg_uf, aluno_nascimento,
    aluno_endereco_rua, aluno_endereco_numero, aluno_endereco_complemento, aluno_endereco_cep, aluno_endereco_uf, aluno_endereco_cidade,
    aluno_endereco_bairro,aluno_t1, aluno_w1, aluno_t2, aluno_w2, aluno_email, aluno_cfc, aluno_usuario, aluno_sexo, 
    aluno_categoria_pretendida) values ('$_POST[nome]','$_POST[cpf]','$_POST[rg]','$_POST[expedidor]','$_POST[ufexpedidor]','$_POST[nascimento]','$_POST[rua]','$_POST[numero]'
    ,'$_POST[complemento]','$_POST[cep]','$_POST[estado]','$_POST[cidade]','$_POST[bairro]','$_POST[t1]','$_POST[w1]','$_POST[t2]','$_POST[w2]','$_POST[email]',
    '$user[user_empresa]','$user[id_user]','$_POST[sexo]','$_POST[pretendida]')
    ";



        if(mysqli_query($conn, $sql)){
        $idnovo = mysqli_insert_id($conn);
      
       ?>
<script>
 alert("Cadastro Realizado com sucesso");

 window.location.href = "perfil_aluno/<?php echo $idnovo ?>";
</script>

<?php
    }else{
        echo("<h1>Houve um erro no cadastro do colaborador!</h1><br><p>".$conn->error."</p>");
    }

?>