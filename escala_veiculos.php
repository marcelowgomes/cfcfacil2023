<?php // CODIGO DA SESSION

if (!empty($_SESSION['id_user'])) {
} else {
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");
}
?>

<?php /// ALUNOS
$sql = "SELECT * FROM alunos WHERE aluno_cfc = '$user[user_empresa]'";
$exe = mysqli_query($conn, $sql);
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


               <div>
                 
                     <div>
                        <h4>Controle de Escalas</h4>
                       
                     </div> 
                    
                    </div>
                    
                    </div>

                     <BR>

                    

<form action="finalizarescala" method="POST">

                     <div class="col-12 mb-25">
                     <!-- Card 1  -->
                     <div class="ap-po-details ap-po-details--1 radius-xl">
                     <h6>Criar nova grade</h6> <br>
                    
                    <div class="row">
                    <div class="col-6">
                        <label>Nome da Grade</label>
                        <input class="form-control" name="nome" required>
                    </div>
                    <div class="col-6">
                        <label>Informe o veículo</label>
                        <input class="form-control" name="veiculo">
                    </div>
                    

                    <div class="col-3">
                        <label>Horario de inicio</label>
                        <input class="form-control" type="time"  name="hinicio" required>
                    </div>
                    <div class="col-3">
                        <label>Horario de termino</label>
                        <input class="form-control" type="time"  name="hfim" required>
                    </div>

                    <div class="col-3">
                        <label>Tempo de aula  <small class="text-muted">(minutos)</small></label>
                        <input class="form-control" type="number"  name="tempo" required value="50">
                    </div>

                    <div class="col-3">
                        <label>Intervalo <small class="text-muted">(minutos)</small></label>
                        <input class="form-control" type="number"  name="intervalo2" required value="10">
                    </div>
                                   
                    </div>


<!-- DINHEIRO -->

<div class="col-12"> 
<input type="checkbox" id="chkDinheiro" name="checkareceber" value='sim' >
Intervalos
</div>
<div id="divDinheiro" name="dinheiro" class="col-12" runat="server" style="display:none">
<label> <strong>Informe quantidade de intervalos  </strong></label>
<select name="parcelas" id='departamento'  class="form-control">
<option value="">Informe</option>
<?php
  $i = 1;
  $x = 0;
  $parcelas = '24';
  while ($i <= $parcelas):
   $x++;
    ?>
  <option value="<?php echo $x ?>"><?php echo $x ?></option>

  <?php  $i++;
  endwhile; ?>


</select>
<div id="resultsd"></div>

<script>
   $(document).ready(function() {
   $('#departamento').on('change', function() {
      var dados = jQuery(this).serialize();
      var id = $("#valor").val(); /// <<<<<

     $.ajax({
        url: 'intervalos.php',
        cache: false,
        data: dados,
        type: "POST",  
        success: function(msg){
           $("#resultsd").empty();
           $("#resultsd").append(msg);
        }
     });
      return false;
   });

});
</script>		



</div>

                    <br>
                <button class="btn btn-success"> SALVAR </button> 
</form>


</div></div>

<div class="col-12 mb-25">
                     <!-- Card 1  -->
                     <div class="ap-po-details ap-po-details--3 radius-xl d-flex py-25">
sasas
</div></div>


<div id="resultsvenda"></div>


<script language="javascript">

$('#chkDinheiro').on('change', function () {
    if ($(this).is(':checked')) {
        $('#divDinheiro').css('display', 'block');
    }
    else {
        $("#divDinheiro").css('display', 'none');
        document.getElementById("dinheiro").value = "";

    }
});
</script>