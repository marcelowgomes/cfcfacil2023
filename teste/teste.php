<?php
include "../bd/conexao.php";


$sql = "SELECT * from escalas WHERE escala_id = '$_GET[semana]'";
$aluno = mysqli_query($conn, $sql);
$dados = mysqli_fetch_array($aluno);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
$sql = "SELECT * from escala_alunos WHERE fk_semana = '$_GET[semana]'";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $alunos[] = $row["nome_escala_aluno"];
        $dias[] = $row["dia_escala_aluno"];
        $horarios_inicio[] = $row["horario_inicio_escala_aluno"];
        $horarios_fim[] = $row["horario_fim_escala_aluno"];
    }
} else {
    $nao_tem_registro = 1;
}


array_multisort($horarios_inicio, $dias,  $horarios_fim, $alunos);

//Lógica para transformar os arrays em um objeto

$objeto_grade = [
    1 => [
        [],
        [],
        [],

    ],
    2 => [
        [],
        [],
        [],

    ],
    3 => [
        [],
        [],
        [],

    ],
    4 => [
        [],
        [],
        [],

    ],
    5 => [
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
    } elseif ($dias[$i] == 2) {
        array_push($objeto_grade[2][0], $alunos[$i]);
        array_push($objeto_grade[2][1], $horarios_inicio[$i]);
        array_push($objeto_grade[2][2], $horarios_fim[$i]);
    } elseif ($dias[$i] == 3) {
        array_push($objeto_grade[3][0], $alunos[$i]);
        array_push($objeto_grade[3][1], $horarios_inicio[$i]);
        array_push($objeto_grade[3][2], $horarios_fim[$i]);
    } elseif ($dias[$i] == 4) {
        array_push($objeto_grade[4][0], $alunos[$i]);
        array_push($objeto_grade[4][1], $horarios_inicio[$i]);
        array_push($objeto_grade[4][2], $horarios_fim[$i]);
    } elseif ($dias[$i] == 5) {
        array_push($objeto_grade[5][0], $alunos[$i]);
        array_push($objeto_grade[5][1], $horarios_inicio[$i]);
        array_push($objeto_grade[5][2], $horarios_fim[$i]);
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
    $horario_inicio = '07:00'; //Para integrar com o banco de dados passe pelo $_POST
    $horario_fim = '22:00'; //Para integrar com o banco de dados passe pelo $_POST
    $periodo_aula = '50'; //Para integrar com o banco de dados passe pelo $_POST
    $periodo_intervalo = '10'; //Para integrar com o banco de dados passe pelo $_POST
    $tempo_entre_aulas = $periodo_aula + $periodo_intervalo;
    $tempo_inicio_intervalo_descanso = ['12:00'];
    $tempo_final_intervalo_descanso = ['12:50'];
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
<table width="33%" border="0" cellspacing="1" cellpadding="4" class="table table-striped table-primary">

    <thead class="thead">
        <tr>
            <td colspan="7" style="font-size: 30px"><?php echo (calculaMes($mes) . ' ');
                                                    echo ($ano) ?></td>
            <td><button class="btn" type="button"><a href="?semana=<?php echo ($semana - 1) ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                        </svg></a></button><button class="btn"><a href="?semana=<?php echo ($semana + 1) ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
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
                        break;
                    }
                }


                if (in_array(date('H:i', $horario_inicio), $tempo_inicio_intervalo_descanso) && in_array(date('H:i', $horario_fim), $tempo_final_intervalo_descanso)) {
                    echo '<td class="text-danger">Bloqueado!</td>';
                } else {

                    echo '<td>' . $aluno_disponivel . '</td>';
                }
            }

            echo '<td class="text-danger">Bloqueado!</td>';
            echo '</tr>';
            $horario_inicio = strtotime('+' . $tempo_entre_aulas . ' minutes', $horario_inicio);
        }

        ?>
    </tbody>


</table>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script>
    var index = $('th.text-danger').index();
    $('tbody tr').each(function() {
        var td = $(this).find('td').eq(index)
        if(td.text().trim() === ''){
            td.text('Feriado!');
            td.addClass('text-danger');
        }
    })
</script>