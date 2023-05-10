<?php
session_start();
include_once("bd/conexao.php");

	$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	//echo "$usuario - $senha";
	if((!empty($usuario)) AND (!empty($senha))){
		//Gerar a senha criptografa
		//echo password_hash($senha, PASSWORD_DEFAULT);
		//Pesquisar o usuário no BD
		$result_usuario = "SELECT id_user, user_login, user_senha, user_status FROM usuarios WHERE user_login='$usuario' and user_status='1' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		if($resultado_usuario){
			$row_usuario = mysqli_fetch_assoc($resultado_usuario);
			if(password_verify($senha, $row_usuario['user_senha'])){
				$_SESSION['id_user'] = $row_usuario['id_user'];
                ?>


<div role="alert1">
<br>
<div class="alert-icon-area alert alert-success">


<div class="alert-icon" role="alert">
<i class="fa fa-lock"></i>
</div>
<div class="alert-content">
<p>Login realizado com sucesso, redirecionando....</p>
</div>
</div></div></div>

<script>

  window.setTimeout(function() {
    $(".alert1").fadeTo(500, 0).slideUp(500, function(){
        $(".alert1").addClass('hidden');
    });
  }, 1000); 

  setTimeout(function() {
    window.location.href = "home";
}, 1000);
</script>



                <?php
			}else{
                ?>

<div role="alert">
<br>
<div class="alert-icon-area alert alert-danger " role="alert">


<div class="alert-icon" role="alert">
<i class="fa fa-unlock"></i>
</div>
<div class="alert-content">
<p>Login ou senha incorretos</p>
</div>
</div></div></div>



          <?php
				
			}
		}
	}else{
		$_SESSION['msg'] = "Login e senha incorreto!";
		header("Location: login.php");
	}
