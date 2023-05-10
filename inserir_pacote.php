<?php // CODIGO DA SESSION

if (!empty($_SESSION['id_user'])) {
} else {
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");
}

$sql = "INSERT INTO pacotes (pacote_categoria, pacote_valor, pacote_descricao, pacote_usuario, pacote_cfc) VALUES ('$_POST[subcategoria]', 
'$_POST[valor]', '$_POST[descricao]','$user[id_user]','$user[user_empresa]')";
if (mysqli_query($conn, $sql)) {
    echo ("<h1>Pacote cadastrado com sucesso!</h1>");
} else {
    echo ("<h1>Houve um problema ao cadastrar o Pacote!</h1><br><p>" . $conn->error . "</p>");
}
