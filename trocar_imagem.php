

<?php

if (!empty($_SESSION['id_user'])) {
} else {
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");
}

include_once 'bd/conexao.php';



if(isset($_FILES['imagem_perfil'])) {
    $file_name = $_FILES['imagem_perfil']['name'];
    $file_tmp = $_FILES['imagem_perfil']['tmp_name'];
    $file_destination = 'img/perfil/'.$file_name;
    move_uploaded_file($file_tmp, $file_destination);
    $sql_n = "SELECT * from imagens_perfil WHERE id_usuario = $id";
    $result = mysqli_query($conn, $sql_n);
    $n_imagens = mysqli_num_rows($result);
    if($n_imagens == 0) {
    $sql = "INSERT INTO imagens_perfil (caminho_imagem, id_usuario) VALUES ('$file_destination', '$id')";
    if (mysqli_query($conn, $sql)) {
        echo("<h1>Imagem de Perfil adicionada com sucesso 2!</h1>");
    }else{
        echo("<h1>Houve um erro na adição de Imagem de Perfil</h1>");
    }
}else{
    $sql = "UPDATE imagens_perfil SET caminho_imagem = '$file_destination' WHERE id_usuario = $id";
    if (mysqli_query($conn, $sql)) {
        ?>
<script>
 alert("Foto Adicionada com sucesso");

 window.location.href = "perfil_aluno/<?php echo $id ?>";
</script>

<?php
    }else{
        echo("<h1>Houve um erro na atualização de Imagem de Perfil</h1>");
    }
}
}