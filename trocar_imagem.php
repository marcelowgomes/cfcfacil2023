<?php
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
        echo("<h1>Imagem de Perfil adicionada com sucesso!</h1>");
    }else{
        echo("<h1>Houve um erro na adição de Imagem de Perfil</h1>");
    }
}else{
    $sql = "UPDATE imagens_perfil SET caminho_imagem = '$file_destination' WHERE id_usuario = $id";
    if (mysqli_query($conn, $sql)) {
        echo("<h1>Imagem de Perfil atualizada com sucesso!</h1>");
    }else{
        echo("<h1>Houve um erro na atualização de Imagem de Perfil</h1>");
    }
}
}