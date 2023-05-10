<?php
session_start();
include_once "bd/conexao.php";
$iduser = $_SESSION['id_user'];
$sqluser = "SELECT * FROM usuarios WHERE id_user = '$iduser'";
$exeuser = mysqli_query($conn, $sqluser);
$user = mysqli_fetch_array($exeuser);

$datahora =  date('Y-m-d h:i:s');

$conn->query("update escala_alunos set escala_status = '3',	justificativa_cancelada= '$_POST[justificativa]', motivo_cancelada= '$_POST[motivo]' ,  usuario_cancelou = '$user[id_user]' , escala_data_cancelou = '$datahora'  WHERE id_escala_aluno = $_POST[agendamento] and escala_cfc = $user[user_empresa]  ");


  ?>




<button type="button" class="btnlivre" data-bs-toggle="modal" data-bs-target="#modal-info-delete<?php echo $_POST[modal] ?>">Livre</button>

<!-- MODAL CONFIRMAR HORARIO -->

<div class="modal-info-delete modal fade show" id="modal-info-delete<?php echo $_POST[modal] ?>" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-sm modal-info" role="document">
   <div class="modal-content">
      <div class="modal-body">
         <div class="modal-info-body d-flex">
            <div class="modal-info-icon warning">
               <img src="img/svg/alert-circle.svg" alt="alert-circle" class="svg">
            </div>

            <div class="modal-info-text">
               <h6>Marcar aluno neste horario?</h6>
             
            </div>

         </div>
      </div>
      <div class="modal-footer">

         <button type="button" class="btn btn-danger btn-outlined btn-sm" data-bs-dismiss="modal">Não</button>


         <form id="salvar<?php echo $horario_inicio.$horario_fim.$semana.$j ?>" method="post">
<?php
echo '
<input type="hidden" name="horario_inicio" value="' . $_POST[horario_inicio] . '">
    <input type="hidden" name="horario_fim" value="' . $_POST[horario_fim] . '">
    <input type="hidden" name="semana_aluno" value="' . $_POST[semana_aluno] . '">
    <input type="hidden" name="dia_aluno" value="' . $_POST[dia_aluno] . '">
    <input type="hiddena" name="data_aluno" id="'.$_POST[data_aluno] . '">
    <input type="hiddena" name="aluno" value="'.$_POST[aluno] . '">
    <input type="hiddena" name="nome" value="'.$_POST[nome]. '">
    <input type="hiddena" name="veiculo" value="'.$_POST[veiculo].'">
    <input type="hiddena" name="instrutor" value="'.$_POST[instrutor].'">
    <input type="hiddena" name="escala" value="'.$_POST[escala].'">


   ' ?>
         <button type="submit" class="btn btn-success btn-outlined btn-sm" data-bs-dismiss="modal">Sim</button>

                    </form>




      </div>
   </div>
</div>


</div>
<!-- FIM MODAL CONFIRMAR HORARIO -->