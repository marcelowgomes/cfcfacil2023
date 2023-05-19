
<?php
if (!empty($_SESSION['id_user'])) {
} else {
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");
}
?>
<?php
    if(isset($_POST['submit'])){
        $fornecedor_nome = $_POST['nome'];
        $fornecedor_cpf = $_POST['cpf/cnpj'];
        $fornecedor_telefone = $_POST['telefone'];
        $fornecedor_contato = $_POST['contato'];
        $fornecedor_cep = $_POST['cep'];
        $fornecedor_rua = $_POST['rua'];
        $fornecedor_numero = $_POST['numero'];
        $fornecedor_bairro = $_POST['bairro'];
        $fornecedor_cidade = $_POST['cidade'];
        $fornecedor_estado = $_POST['estado'];

        $sql = "INSERT INTO fornecedores (fornecedor_nome, fornecedor_cpf, fornecedor_telefone, fornecedor_contato, fornecedor_cep, fornecedor_rua, 
        fornecedor_numero, fornecedor_bairro, fornecedor_cidade, fornecedor_estado, fornecedor_cfc, fornecedor_usuario) 
        VALUES ('$fornecedor_nome', '$fornecedor_cpf', '$fornecedor_telefone', '$fornecedor_contato', '$fornecedor_cep', 
        '$fornecedor_rua', '$fornecedor_numero', '$fornecedor_bairro', '$fornecedor_cidade', '$fornecedor_estado','$user[user_empresa]','$user[id_user]')";
        if (mysqli_query($conn, $sql)) {
           ?>
           <script>
 alert("Cadastro Realizado com sucesso");

 window.location.href = "listar_fornecedores";
</script>
<?php 
        } else {
            echo ("<h2>Houve um problema no cadastro do fornecedor!</h2><br><p>" . $conn->error . "</p>");
        }
    }