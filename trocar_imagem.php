<?php
if(isset($_FILES['imagem_perfil'])) {
    $file_name = $_FILES['imagem_perfil']['name'];
    $file_tmp = $_FILES['imagem_perfil']['tmp_name'];
    $file_destination = 'img/perfil/'.$file_name;
    move_uploaded_file($file_tmp, $file_destination);

    $sql = "INSERT INTO imagens_perfil (caminho_imagem, id_usuario) VALUES ('$file_destination', '$id')";
    if (mysqli_query($conn, $sql)) {
        echo("<h1>Imagem de Perfil adicionada com sucesso!</h1>");
    }else{
        echo("<h1>Houve um erro na adição de Imagem de Perfil</h1>");
    }
}