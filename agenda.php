
<?php
session_start();
include_once "bd/conexao.php";
$iduser = $_SESSION['id_user'];
$sqluser = "SELECT * FROM usuarios WHERE id_user = '$iduser'";
$exeuser = mysqli_query($conn, $sqluser);
$user = mysqli_fetch_array($exeuser);



$sql = "SELECT * from escalas WHERE escala_veiculo = '$_GET[veiculo]'";
$aluno = mysqli_query($conn, $sql);
$dados = mysqli_fetch_array($aluno);


$sql2 = "SELECT * from alunos WHERE aluno_id = '$_GET[id]'";
$aluno2 = mysqli_query($conn, $sql2);
$dados2 = mysqli_fetch_array($aluno2);

$sqlv = "SELECT * from veiculos WHERE id_veiculo = '$_GET[veiculo]' and veiculo_cfc = '$user[user_empresa]'";
$veiculov = mysqli_query($conn, $sqlv);
$veiculo = mysqli_fetch_array($veiculov);

?>

<!doctype html>
<html lang="pt_br">

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


<link rel="stylesheet" href="assets/vendor_assets/css/daterangepicker.css">

<link rel="stylesheet" href="assets/vendor_assets/css/fontawesome.css">

<link rel="stylesheet" href="assets/vendor_assets/css/footable.standalone.min.css">

<link rel="stylesheet" href="assets/vendor_assets/css/fullcalendar@5.2.0.css">

<link rel="stylesheet" href="assets/vendor_assets/css/jquery-jvectormap-2.0.5.css">

<link rel="stylesheet" href="assets/vendor_assets/css/jquery.mCustomScrollbar.min.css">

<link rel="stylesheet" href="assets/vendor_assets/css/leaflet.css">

<link rel="stylesheet" href="assets/vendor_assets/css/line-awesome.min.css">

<link rel="stylesheet" href="assets/vendor_assets/css/magnific-popup.css">

<link rel="stylesheet" href="assets/vendor_assets/css/MarkerCluster.css">

<link rel="stylesheet" href="assets/vendor_assets/css/MarkerCluster.Default.css">

<link rel="stylesheet" href="assets/vendor_assets/css/select2.min.css">

<link rel="stylesheet" href="assets/vendor_assets/css/slick.css">

<link rel="stylesheet" href="assets/vendor_assets/css/star-rating-svg.css">

<link rel="stylesheet" href="assets/vendor_assets/css/trumbowyg.min.css">

<link rel="stylesheet" href="assets/vendor_assets/css/wickedpicker.min.css">


<style>
    .btnlivre {
  background: #52d934;
  background-image: -webkit-linear-gradient(top, #52d934, #4cb82b);
  background-image: -moz-linear-gradient(top, #52d934, #4cb82b);
  background-image: -ms-linear-gradient(top, #52d934, #4cb82b);
  background-image: -o-linear-gradient(top, #52d934, #4cb82b);
  background-image: linear-gradient(to bottom, #52d934, #4cb82b);
  -webkit-border-radius: 8;
  -moz-border-radius: 8;
  border-radius: 8px;
  font-family: Arial;
  color: #ffffff;
  font-size: 12px;
  padding: 7px 7px 7px 7px;
  text-decoration: none;
}

.btnlivre:hover {
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
}
</style>




</head>

</html>

<?php
//Lógica para gerar os feriados

function dias_feriados($ano = null)
{
    if ($ano === null) {
        $ano = intval(date('Y'));
    }

    $pascoa     = easter_date($ano); // Limite de 1970 ou após 2037 da easter_date PHP consulta https://www.php.net/manual/pt_BR/function.easter-date.php
    $dia_pascoa = date('j', $pascoa);
    $mes_pascoa = date('n', $pascoa);
    $ano_pascoa = date('Y', $pascoa);

    $feriados = array(
        // Tatas Fixas dos feriados Nacionail Basileiras
        mktime(0, 0, 0, 1,  1,   $ano), // Confraternização Universal - Lei nº 662, de 06/04/49
        mktime(0, 0, 0, 4,  21,  $ano), // Tiradentes - Lei nº 662, de 06/04/49
        mktime(0, 0, 0, 5,  1,   $ano), // Dia do Trabalhador - Lei nº 662, de 06/04/49
        mktime(0, 0, 0, 9,  7,   $ano), // Dia da Independência - Lei nº 662, de 06/04/49
        mktime(0, 0, 0, 10,  12, $ano), // N. S. Aparecida - Lei nº 6802, de 30/06/80
        mktime(0, 0, 0, 11,  2,  $ano), // Todos os santos - Lei nº 662, de 06/04/49
        mktime(0, 0, 0, 11, 15,  $ano), // Proclamação da republica - Lei nº 662, de 06/04/49
        mktime(0, 0, 0, 12, 25,  $ano), // Natal - Lei nº 662, de 06/04/49

        // These days have a date depending on easter
        mktime(0, 0, 0, $mes_pascoa, $dia_pascoa - 48,  $ano_pascoa), //2ºferia Carnaval
        mktime(0, 0, 0, $mes_pascoa, $dia_pascoa - 47,  $ano_pascoa), //3ºferia Carnaval	
        mktime(0, 0, 0, $mes_pascoa, $dia_pascoa - 2,  $ano_pascoa), //6ºfeira Santa  
        mktime(0, 0, 0, $mes_pascoa, $dia_pascoa,  $ano_pascoa), //Pascoa
        mktime(0, 0, 0, $mes_pascoa, $dia_pascoa + 60,  $ano_pascoa), //Corpus Cirist
    );

    sort($feriados);

    return $feriados;
}
$feriados = [];
$ano_ = date("Y"); // $ano_='2010'; 
foreach (dias_feriados($ano_) as $a) {
    array_push($feriados, date("d-m", $a));
}

//Lógica para armazenar os dados dos alunos da grade
$sql = "SELECT * from escala_alunos WHERE fk_semana = '$_GET[semana]' and escala_veiculo= '$_GET[veiculo]' and escala_status <> '3' and escala_cfc = $user[user_empresa]";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $alunos[] = $row["nome_escala_aluno"];
        $dias[] = $row["dia_escala_aluno"];
        $horarios_inicio[] = $row["horario_inicio_escala_aluno"];
        $horarios_fim[] = $row["horario_fim_escala_aluno"];
        $id_escala[] =  $row["id_escala_aluno"]; 
       
    }
} else {
    $nao_tem_registro = 1;
}


array_multisort($horarios_inicio, $dias,  $horarios_fim, $alunos, $id_escala );

//Lógica para transformar os arrays em um objeto

$objeto_grade = [
    1 => [
        [],
        [],
        [],
        [],

    ],
    2 => [
        [],
        [],
        [],
        [],

    ],
    3 => [
        [],
        [],
        [],
        [],

    ],
    4 => [
        [],
        [],
        [],
        [],

    ],
    5 => [
        [],
        [],
        [],
        [],
        

    ]
    
];

for ($i = 0; $i < count($alunos); $i++) {
    if ($dias[$i] == 1) {
        array_push($objeto_grade[1][0], $alunos[$i]);
        array_push($objeto_grade[1][1], $horarios_inicio[$i]);
        array_push($objeto_grade[1][2], $horarios_fim[$i]);
        array_push($objeto_grade[1][3], $id_escala[$i]);


        
    } elseif ($dias[$i] == 2) {
        array_push($objeto_grade[2][0], $alunos[$i]);
        array_push($objeto_grade[2][1], $horarios_inicio[$i]);
        array_push($objeto_grade[2][2], $horarios_fim[$i]);
        array_push($objeto_grade[2][3], $id_escala[$i]);

    } elseif ($dias[$i] == 3) {
        array_push($objeto_grade[3][0], $alunos[$i]);
        array_push($objeto_grade[3][1], $horarios_inicio[$i]);
        array_push($objeto_grade[3][2], $horarios_fim[$i]);
        array_push($objeto_grade[3][3], $id_escala[$i]);

    } elseif ($dias[$i] == 4) {
        array_push($objeto_grade[4][0], $alunos[$i]);
        array_push($objeto_grade[4][1], $horarios_inicio[$i]);
        array_push($objeto_grade[4][2], $horarios_fim[$i]);
        array_push($objeto_grade[4][3], $id_escala[$i]);

    } elseif ($dias[$i] == 5) {
        array_push($objeto_grade[5][0], $alunos[$i]);
        array_push($objeto_grade[5][1], $horarios_inicio[$i]);
        array_push($objeto_grade[5][2], $horarios_fim[$i]);
        array_push($objeto_grade[5][3], $id_escala[$i]);
    }
}


// Lógica para produção de horários
function calculaQTDAulas($periodo)
{
    $qtdeAulas = 0;
    $periodo = $periodo / 60;

    $qtdeAulas = floor($periodo / 60);

    return $qtdeAulas;
}
// if ($nao_tem_registro == 0) {
//     $horario_inicio = $dados['escala_hora_inicio']; //Para integrar com o banco de dados passe pelo $_POST
//     $horario_fim = $dados['escala_hora_fim']; //Para integrar com o banco de dados passe pelo $_POST
//     $periodo_aula = $dados['escala_tempo']; //Para integrar com o banco de dados passe pelo $_POST
//     $periodo_intervalo = $dados['escala_intervalo']; //Para integrar com o banco de dados passe pelo $_POST
//     $tempo_entre_aulas = $periodo_aula + $periodo_intervalo;
//     $tempo_inicio_intervalo_descanso = ['12:00'];
//     $tempo_final_intervalo_descanso = ['12:50'];
// } else {
    $horario_inicio = $dados['escala_hora_inicio']; //Para integrar com o banco de dados passe pelo $_POST
    $horario_fim = $dados['escala_hora_fim']; //Para integrar com o banco de dados passe pelo $_POST
    $periodo_aula = $dados['escala_tempo']; //Para integrar com o banco de dados passe pelo $_POST
    $periodo_intervalo = $dados['escala_intervalo']; //Para integrar com o banco de dados passe pelo $_POST
    $tempo_entre_aulas = $periodo_aula + $periodo_intervalo;
  
    //// PEGANDO INTERVALOS ESCALA
$sqlin = "SELECT * from intervalos_escala WHERE intervalo_escala = '$dados[escala_id]'";
$exein = mysqli_query($conn, $sqlin);
while($intervalos = mysqli_fetch_array($exein)) { 

    $tempo_inicio_intervalo_descanso = ['12:00'];
    $tempo_final_intervalo_descanso = ['12:50'];

}
//}


$horario_inicio = date('H:i', strtotime($horario_inicio));
$horario_fim = date('H:i', strtotime($horario_fim));

$horario_inicio = strtotime($horario_inicio);
$horario_fim = strtotime($horario_fim);

$intervalo = $horario_fim - $horario_inicio;
$qtdeAulas = calculaQTDAulas($intervalo);

// Lógica para geração de calendário

if (!empty($_GET['semana'])) {
    $semana = $_GET['semana'];
    $count_semana = time() + (604800 * $semana);
} else {
    $semana = 0;
    $count_semana = time() + (604800 * $semana);
}
$mes = date("m", $count_semana);
$ano = date("Y", $count_semana);
$dia_semana = date("w", $count_semana);
$dia = date("d", $count_semana);

function calculaMes($mes)
{
    switch ($mes) {
        case 1:
            $mes = "Janeiro";
            break;
        case 2:
            $mes = "Fevereiro";
            break;
        case 3:
            $mes = "Março";
            break;
        case 4:
            $mes = "Abril";
            break;
        case 5:
            $mes = "Maio";
            break;
        case 6:
            $mes = "Junho";
            break;
        case 7:
            $mes = "Julho";
            break;
        case 8:
            $mes = "Agosto";
            break;
        case 9:
            $mes = "Setembro";
            break;
        case 10:
            $mes = "Outubro";
            break;
        case 11:
            $mes = "Novembro";
            break;
        case 12:
            $mes = "Dezembro";
            break;
    }

    return $mes;
}

function nome_dia($nome_dia)
{
    if ($nome_dia >= 7) {
        $nome_dia = $nome_dia - 7;
    }

    switch ($nome_dia) {
        case 0:
            return "Domingo";
            break;
        case 1:
            return "Segunda";
            break;
        case 2:
            return "Terça";
            break;
        case 3:
            return "Quarta";
            break;
        case 4:
            return "Quinta";
            break;
        case 5:
            return "Sexta";
            break;
        case 6:
            return "Sábado";
            break;
        default:
            return "Erro!";
    }
}

$x = date("w");

$k = 0;
while ($k <= 6) {
    ${'dia0' . $k} = date("d.m", mktime(0, 0, 0, $mes, ($dia - $x) + $k, $ano));
    ${'dia_semana' . $k} = 6 + $k;
    $k++;
}

?>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

<table width="33%" border="0" cellspacing="1" cellpadding="4" class="table table-striped table-primary">

    <thead class="thead">
        <tr>
            <td colspan="7" id="ano" style="font-size: 30px"><?php echo (calculaMes($mes) . ' ');
                                                    echo ($ano) ?></td>
            <td><button class="btn" type="button"><a href="?semana=<?php echo ($semana - 1) ?>&veiculo=<?php echo $_GET[veiculo] ?>&id=<?php echo $_GET[id] ?>&instrutor=<?php echo $_GET[instrutor] ?>&cat=<?php echo $_GET[cat] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                        </svg></a></button><button class="btn"><a href="?semana=<?php echo ($semana + 1) ?>&veiculo=<?php echo $_GET[veiculo] ?>&id=<?php echo $_GET[id] ?>&instrutor=<?php echo $_GET[instrutor] ?>&cat=<?php echo $_GET[cat] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                        </svg></a>
                </button>
            </td>

        </tr>
        <tr>
            <th scope="col">Horário</th>
            <?php

            $dias = array(0, 1, 2, 3, 4, 5, 6);
            $i = $dias[date("w")];

            for ($j = 0; $j <= 6; $j++) {
                $dia_semana = nome_dia($dias[$j]);
                $d = " 
        <th scope=\"col\">";
                if (date("d") == substr(${'dia0' . $j}, 0, 2))
                    $d .= "<b>";
                $d .= $dia_semana . " - ${'dia0' .$j}";
                if (date("d") == substr(${'dia0' . $j}, 0, 2))
                    $d .= "</b>";
                $d .= "</th> 
        ";
                $dias[$j] = $d;
            }
            // para melhorar, em vez de "echo", � melhor colocar os dias da semana 
            // em um array; assim fica mais conveniente ordenar. 
            $nd = count($dias);

            for ($i = 0; $i < $nd; $i++) {
                $partes = explode("-", $dias[$i]);
                $partes[1] = str_replace('.', '-', $partes[1]);
                $existe_feriado = 0;
                foreach ($feriados as $data_feriado) {
                    if (strpos($partes[1], $data_feriado)) {
                        $existe_feriado = 1;
                    } 
                }

                if ($existe_feriado == 0) {
                    echo $dias[$i];
                }else{ 
                    $header = $dias[$i];
                    $header = str_replace('scope', 'class', $header);
                    $header = str_replace('col', 'text-danger', $header);
                    echo $header;
                }
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php

        for ($i = 1; $i <= $qtdeAulas; $i++) {
            $horario_fim = strtotime('+' . $periodo_aula . ' minutes', $horario_inicio);
            echo '<tr>';
            echo '<td>' . date('H:i', $horario_inicio) . '-' . date('H:i', $horario_fim) . '</td>';

            // Loop through each day of the week (except the first and last columns which are reserved for time and the "blocked" column)
            echo '<td class="text-danger">Bloqueado!</td>';
            for ($j = 1; $j <= 7 - 2; $j++) {
                $aluno_disponivel = "";

                foreach ($objeto_grade as $dia => $dados_aluno) {
                    $horario_inicio_aluno = strtotime($objeto_grade[$dia][1][0]);
                    $horario_fim_aluno = strtotime($objeto_grade[$dia][2][0]);

                    if ($horario_inicio_aluno <= $horario_inicio && $horario_fim_aluno >= $horario_fim_aluno && $dia == $j) {
                        array_shift($objeto_grade[$dia][1]);
                        array_shift($objeto_grade[$dia][2]);

                        $aluno_disponivel = array_shift($objeto_grade[$dia][0]);
                        $id_escala = array_shift($objeto_grade[$dia][3]);

                        

                     



                        break;
                    }
                }

        
                if (in_array(date('H:i', $horario_inicio), $tempo_inicio_intervalo_descanso) && in_array(date('H:i', $horario_fim), $tempo_final_intervalo_descanso)) {
                    echo '<td class="text-danger">Bloqueado!</td>';
                } else {
                    if($aluno_disponivel == ''){
                        echo '<td>
                        <input type="hidden" name="horario_inicio" value="' . date('H:i', $horario_inicio) . '">
                            <input type="hidden" name="horario_fim" value="' . date('H:i', $horario_fim) . '">
                            <input type="hidden" name="semana_aluno" value="' . $semana . '">
                            <input type="hidden" name="dia_aluno" value="' . $j . '">
                            <input type="hidden" name="data_aluno" id="'.$j . '">
                            <input type="hidden" name="aluno" value="'.$_GET[id]. '">
                            <input type="hidden" name="cat" value="'.$_GET[cat]. '">
                            <div id="caixa'.$horario_inicio.$horario_fim.$semana.$j.'" style="display:block" >
                            
                            
                            <button type="button" class="btnlivre" data-bs-toggle="modal" data-bs-target="#modal-info-delete'.$horario_inicio.$horario_fim.$semana.$j.'">Livre</button>
                           
                           
                          </div> <div id="results'.$horario_inicio.$horario_fim.$semana.$j.'" style="display:block"></div> </td>';


                            ?>

<!-- MODAL CONFIRMAR HORARIO -->

<div class="modal-info-delete modal fade show" id="modal-info-delete<?php echo $horario_inicio.$horario_fim.$semana.$j ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
<input type="hidden" name="horario_inicio" value="' . date('H:i', $horario_inicio) . '">
    <input type="hidden" name="horario_fim" value="' . date('H:i', $horario_fim) . '">
    <input type="hidden" name="semana_aluno" value="' . $semana . '">
    <input type="hidden" name="dia_aluno" value="' . $j . '">
    <input type="hidden" name="data_aluno" id="'.$j . '">
    <input type="hidden" name="aluno" value="'.$_GET[id] . '">
    <input type="hidden" name="nome" value="'.$dados2[aluno_nome]. '">
    <input type="hidden" name="modal" value="'.$horario_inicio.$horario_fim.$semana.$j. '">
    <input type="hidden" name="veiculo" value="'.$_GET[veiculo].'">
    <input type="hidden" name="instrutor" value="'.$_GET[instrutor].'">
    <input type="hidden" name="escala" value="'.$dados[escala_id].'">
    <input type="hidden" name="cat" value="'.$_GET[cat]. '">


   ' ?>
         <button type="submit" class="btn btn-success btn-outlined btn-sm" data-bs-dismiss="modal">Sim</button>

                    </form>




      </div>
   </div>
</div>


</div>
<!-- FIM MODAL CONFIRMAR HORARIO -->


 

<script>
$(document).ready(function() {
 $("#salvar<?php echo $horario_inicio.$horario_fim.$semana.$j ?>").submit(function(){
var formData = new FormData(this);
  $.ajax({
    url: 'salvaralunoagenda.php',
    cache: false,
    data: formData,
    type: "POST",  
    enctype: 'multipart/form-data',
    processData: false, // impedir que o jQuery tranforma a "data" em querystring
    contentType: false, // desabilitar o cabeçalho "Content-Type"
    success: function(msg){
      $("#results<?php echo $horario_inicio.$horario_fim.$semana.$j ?>").empty();
      $("#results<?php echo $horario_inicio.$horario_fim.$semana.$j ?>").append(msg);
      document.getElementById("caixa<?php echo $horario_inicio.$horario_fim.$semana.$j ?>").style.display = "none";


    }
  });
   return false;
 });
});

</script>		

<?php



                    }else{



?>







<!-- INICIO MODAL ACOES  -->

<div class="modal-basic modal fade show" id="modal-acoes<?php echo $horario_inicio.$horario_fim.$semana.$j ?>" tabindex="-1" role="dialog" aria-hidden="true">


<form id="editar<?php echo $horario_inicio.$horario_fim.$semana.$j ?>" method="post">

<!-- CONECTANDO AOS DADOS DO AGENDAMENTO -->


<?php

$sqlea = "SELECT * from escala_alunos WHERE id_escala_aluno = '$id_escala'";
$alunoea = mysqli_query($conn, $sqlea);
$dadosea = mysqli_fetch_array($alunoea);
mysqli_close($sqlea);

$sqleaa = "SELECT * from alunos WHERE aluno_id = '$dadosea[escala_aluno]'";
$alunoeaa = mysqli_query($conn, $sqleaa);
$dadoseaa = mysqli_fetch_array($alunoeaa);
mysqli_close($sqleaa);

$partes2 = explode(' ',$dadoseaa[aluno_nome]);
$primeiroNome = array_shift($partes2);
$ultimoNome = array_pop($partes2);


$sqlin= "SELECT * from colaboradores WHERE id = '$dadosea[escala_instrutor]'";
$instrutorin = mysqli_query($conn, $sqlin);
$instrutor = mysqli_fetch_array($instrutorin);
mysqli_close($sqlin);
?>

<div class="modal-dialog modal-md" role="document">
   <div class="modal-content modal-bg-white ">
      <div class="modal-header">



         <h6 class="modal-title">Ações</h6>
         <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <img src="img/svg/x.svg" alt="x" class="svg">
         </button>
      </div>
      <div class="modal-body">
         <p>
            <strong> Aluno:  </strong><?php echo $dadoseaa[aluno_nome] ?><br>
            <strong> Veiculo:  </strong><?php echo $veiculo[marca_veiculo] ?> <?php echo $veiculo[modelo_veiculo] ?> <?php echo $veiculo[cor_veiculo] ?> Placa: <?php echo $veiculo[placa_veiculo] ?><br>
            <strong> Instrutor:  </strong> <?php echo $instrutor[nome] ?><br>
            <strong> Dia da aula:  </strong> <?php echo date('d/m/Y', strtotime($dadosea[escala_data_aula])); ?>  <strong> Horario: </strong>  <?php echo $dadosea[horario_inicio_escala_aluno] ?>  às <?php echo $dadosea[horario_fim_escala_aluno] ?>   <br>
           
           
        
<br>


<label for="countryOption" class="il-gray fs-14 fw-500 align-center mb-10"><strong>Ações</strong></label> <br><br>


<input type="checkbox" id="chkCancelar<?php echo $horario_inicio.$horario_fim.$semana.$j ?>" name="scales" >
Cancelar Agendamento


<div id="divCancelar<?php echo $horario_inicio.$horario_fim.$semana.$j ?>"  runat="server" style="display:none">


<?php 

echo "<SELECT NAME='motivo' SIZE='1' required class='form-control'>

<OPTION VALUE='' SELECTED> Informe o motivo ";
// Selecionando os dados da tabela em ordem decrescente
$sql = "SELECT * FROM motivos_ajustes_agenda where motivo_ajuste_aula_status = '1'";
// Executando $sql e verificando se tudo ocorreu certo.
$resultado = mysqli_query($conn, $sql);
//Realizando um loop para exibi&ccedil;&atilde;o de todos os dados 
while ($linha=mysqli_fetch_array($resultado)) {
echo "<OPTION VALUE='".$linha['motivo_ajuste_aula_id']."' ";
echo ">".$linha['motivo_ajuste_aula_motivo'];
}
echo "</SELECT>";
?>

<br>
<input type="text" class="form-control"  required name="justificativa" placeholder="Informe uma Justificativa">
<br>
</div>
<?php

echo '<input type="hidden" name="horario_inicio" value="' . date('H:i', $horario_inicio) . '">
<input type="hidden" name="horario_fim" value="' . date('H:i', $horario_fim) . '">
<input type="hidden" name="semana_aluno" value="' . $semana . '">
<input type="hidden" name="dia_aluno" value="' . $j . '">
<input type="hidden" name="data_aluno" id="'.$j . '">
<input type="hidden" name="aluno" value="'.$_GET[id] . '">
<input type="hidden" name="modal" value="'.$horario_inicio.$horario_fim.$semana.$j. '">
<input type="hidden" name="agendamento" value="'.$dadosea[id_escala_aluno]. '">


<div id="caixa'.$horario_inicio.$horario_fim.$semana.$j.'" style="display:block" >'

?>
      
      <div class="modal-footer">


      <button type="submit" id="btn<?php echo $horario_inicio.$horario_fim.$semana.$j ?>" disabled class="btn btn-success btn-outlined btn-sm" data-bs-dismiss="modal">Salvar</button>
                   
         <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Fechar</button>
      </div>
   </div>
</div>

</div>
</div>
</form>
<!-- FIM  MODAL ACOES  -->



<script>




////  check box debito
$('#chkCancelar<?php echo $horario_inicio.$horario_fim.$semana.$j ?>').on('change', function () {
    if ($(this).is(':checked')) {
        $('#divCancelar<?php echo $horario_inicio.$horario_fim.$semana.$j ?>').css('display', 'block');
        $('#btn<?php echo $horario_inicio.$horario_fim.$semana.$j ?>').attr('disabled', false);

    }
    else {
        $("#divCancelar<?php echo $horario_inicio.$horario_fim.$semana.$j ?>").css('display', 'none');
        $('#btn<?php echo $horario_inicio.$horario_fim.$semana.$j ?>').attr('disabled', true);



    }
});



$(document).ready(function() {
 $("#editar<?php echo $horario_inicio.$horario_fim.$semana.$j ?>").submit(function(){
var formData = new FormData(this);
  $.ajax({
    url: 'editaragenda.php',
    cache: false,
    data: formData,
    type: "POST",  
    enctype: 'multipart/form-data',
    processData: false, // impedir que o jQuery tranforma a "data" em querystring
    contentType: false, // desabilitar o cabeçalho "Content-Type"
    success: function(msg){
      $("#results2<?php echo $horario_inicio.$horario_fim.$semana.$j ?>").empty();
      $("#results2<?php echo $horario_inicio.$horario_fim.$semana.$j ?>").append(msg);
      document.getElementById("aberto<?php echo $horario_inicio.$horario_fim.$semana.$j ?>").style.display = "none";


    }
  });
   return false;
 });
});

</script>	

<?php


                        echo  '<td>' 
                        
                       . '<div id="aberto'. $horario_inicio.$horario_fim.$semana.$j.'" style="display:block">'

                        . $primeiroNome .  ' <br>'. $ultimoNome .  '
                        <i class="fas fa-info-circle" data-bs-toggle="modal" data-bs-target="#modal-acoes'.$horario_inicio.$horario_fim.$semana.$j.'"></i> 
</div> 
                        <div id="results2'.$horario_inicio.$horario_fim.$semana.$j.'" style="display:block"></div>


                        </td>';
                    }
                }
            }

            echo '<td class="text-danger">Bloqueado!</td>';
            echo '</tr>';
            $horario_inicio = strtotime('+' . $tempo_entre_aulas . ' minutes', $horario_inicio);
        }

        ?>
        </div>
    </tbody>


</table>

<script>
    var index = $('th.text-danger').index();
    $('tbody tr:eq(1)').each(function() {
        var td = $(this).find('td').eq(index)
        if(td.text().trim() === ''){
            td.text('Feriado!');
            td.addClass('text-danger');
        }
    })

    var ano = $('td[id="ano"]').text();

ano = ano.substring(ano.indexOf(' ') , ano.length)

    var valores = [];
    $('thead tr').children().slice(4,9).each(function() {
        let data = ($(this).text());
        data = data.substring(data.indexOf('-') + 2);
        let arrayDatas = data.split('.');
        let dataFormatada = ano + '-' + arrayDatas[1] + '-' + arrayDatas[0];
        valores.push(dataFormatada) 
    })

    $('input[id="1"]').val(valores[0])
    $('input[id="2"]').val(valores[1])
    $('input[id="3"]').val(valores[2])
    $('input[id="4"]').val(valores[3])
    $('input[id="5"]').val(valores[4])

    console.log(valores)
</script>
<script src="assets/vendor_assets/js/jquery/jquery-3.5.1.min.js"></script>
   <script src="assets/vendor_assets/js/jquery/jquery-ui.js"></script>
   <script src="assets/vendor_assets/js/bootstrap/popper.js"></script>
   <script src="assets/vendor_assets/js/bootstrap/bootstrap.min.js"></script>
   <script src="assets/vendor_assets/js/moment/moment.min.js"></script>
   <script src="assets/vendor_assets/js/accordion.js"></script>
   <script src="assets/vendor_assets/js/apexcharts.min.js"></script>
   <script src="assets/vendor_assets/js/autoComplete.js"></script>
   <script src="assets/vendor_assets/js/Chart.min.js"></script>
   <script src="assets/vendor_assets/js/daterangepicker.js"></script>
   <script src="assets/vendor_assets/js/drawer.js"></script>
   <script src="assets/vendor_assets/js/dynamicBadge.js"></script>
   <script src="assets/vendor_assets/js/dynamicCheckbox.js"></script>
   <script src="assets/vendor_assets/js/footable.min.js"></script>
   <script src="assets/vendor_assets/js/fullcalendar@5.2.0.js"></script>
   <script src="assets/vendor_assets/js/google-chart.js"></script>
   <script src="assets/vendor_assets/js/jquery-jvectormap-2.0.5.min.js"></script>
   <script src="assets/vendor_assets/js/jquery-jvectormap-world-mill-en.js"></script>
   <script src="assets/vendor_assets/js/jquery.countdown.min.js"></script>
   <script src="assets/vendor_assets/js/jquery.filterizr.min.js"></script>
   <script src="assets/vendor_assets/js/jquery.magnific-popup.min.js"></script>
   <script src="assets/vendor_assets/js/jquery.peity.min.js"></script>
   <script src="assets/vendor_assets/js/jquery.star-rating-svg.min.js"></script>
   <script src="assets/vendor_assets/js/leaflet.js"></script>
   <script src="assets/vendor_assets/js/leaflet.markercluster.js"></script>
   <script src="assets/vendor_assets/js/loader.js"></script>
   <script src="assets/vendor_assets/js/message.js"></script>
   <script src="assets/vendor_assets/js/moment.js"></script>
   <script src="assets/vendor_assets/js/muuri.min.js"></script>
   <script src="assets/vendor_assets/js/notification.js"></script>
   <script src="assets/vendor_assets/js/popover.js"></script>
   <script src="assets/vendor_assets/js/select2.full.min.js"></script>
   <script src="assets/vendor_assets/js/slick.min.js"></script>
   <script src="assets/vendor_assets/js/trumbowyg.min.js"></script>
   <script src="assets/vendor_assets/js/wickedpicker.min.js"></script>
   <script src="assets/theme_assets/js/apexmain.js"></script>
   <script src="assets/theme_assets/js/charts.js"></script>
   <script src="assets/theme_assets/js/drag-drop.js"></script>
   <script src="assets/theme_assets/js/footable.js"></script>
   <script src="assets/theme_assets/js/full-calendar.js"></script>
   <script src="assets/theme_assets/js/googlemap-init.js"></script>
   <script src="assets/theme_assets/js/icon-loader.js"></script>
   <script src="assets/theme_assets/js/jvectormap-init.js"></script>
   <script src="assets/theme_assets/js/leaflet-init.js"></script>
   <script src="assets/theme_assets/js/main.js"></script>