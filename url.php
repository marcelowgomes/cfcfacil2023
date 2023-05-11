

<?php //// INICIO CODIGO 


if (!empty($_GET['url'])) {
    $url = explode("/", $_GET['url']);
    if (empty($url[count($url) - 1])) {
        unset($url[count($url) - 1]);
    }

    switch ($url[0]) {

        case 'home':
            include('home.php');
            break;

        case 'agendas':
            include('agendas.php');
            break;

        case 'agenda_geral_veiculo':
            include('agenda_geral_veiculo.php');
            break;





            // ALUNOS		
        case 'perfil_aluno':
            $id = $url[1];
            $id2 = $url[2];
            include('perfil_aluno.php');
            break;

        case 'editar_alunos':
            $id = $url[1];
            include('editar_alunos.php');
            break;

        case 'excluir_aluno':
            $id = $url[1];
            include('excluir_aluno.php');
            break;
        case 'alunos':
            $metodo = $url[1];
            $id = $url[2];
            include('alunos.php');
            break;

        case 'cad_aluno':
            include('cad_aluno.php');
            break;

        case 'inserir_aluno':
            include('inserir_aluno.php');
            break;

        case 'nova_saida':
            $id = $url[1];
            include('nova_saida.php');
            break;

        case 'gerenciar_aulas':
            $id = $url[1];
            $id2 = $url[2];
            include('gerenciar_aulas.php');
            break;

        case 'relatorio_reposicao':
            include('relatorio_reposicao.php');
            break;

        case 'cadastrar_veiculo':
            include('cadastrar_veiculo.php');
            break;

        case 'listar_veiculo':
            $metodo = $url[1];
            $id = $url[2];
            include('listar_veiculo.php');
            break;

        case 'editar_veiculo':
            $id = $url[1];
            include('editar_veiculo.php');
            break;

        case 'cadastrar_fornecedores':
            include('cadastrar_fornecedores.php');
            break;

        case 'nova_venda_pacote':
            $id = $url[1];
            $id2 = $url[2];
            include('nova_venda_pacote.php');
            break;


        case 'listar_fornecedores':
            $metodo = $url[1];
            $id = $url[2];
            include('listar_fornecedores.php');
            break;



        case 'agendar_aulas_aluno':
            $id = $url[1];
            $id2 = $url[2];
            $id3 = $url[3];
            include('agendar_aulas_aluno.php');
            break;


        case 'inserir_item_pacote':
            include('inserir_item_pacote.php');
            break;
        
            
        case 'editar_pacotes':
            $id = $url[1];
            include('editar_pacote.php');
            break;


        case 'editar_fornecedores':
            $id = $url[1];
            include('editar_fornecedores.php');
            break;

        case 'cadastrar_receitas':
            include('cadastrar_receitas.php');
            break;

        case 'cadastrar_pacotes':
            $metodo = $url[1];
            $id = $url[2];
            include('cadastrar_pacotes.php');
            break;

        case 'finalizarescala':
            include('finalizarescala.php');
            break;


        case 'cadastrar_colaboradores':
            include('cadastrar_colaboradores.php');
            break;

        case 'mais_informacoes_colaboradores':
            include('mais_informacoes_colaboradores.php');
            break;

        case 'listar_colaboradores':
            $metodo = $url[1];
            $id = $url[2];
            include('listar_colaboradores.php');
            break;

        case 'editar_colaboradores':
            $id = $url[1];
            include('editar_colaboradores.php');
            break;

        case 'add_itens_pacote':
            $id = $url[1];
            include('add_itens_pacote.php');
            break;


        case 'escala_veiculos':
            include('escala_veiculos.php');
            break;


        case 'confirmar_cadastro_veiculo':
            include('confirmar_cadastro_veiculo.php');
            break;

        case 'inserir_pacote':
            include('inserir_pacote.php');
            break;




        case 'confirmar_cadastro_colaboradores':
            include('confirmar_cadastro_colaboradores.php');
            break;

        case 'confirmar_cadastro_fornecedor':
            include('confirmar_cadastro_fornecedor.php');
            break;

        case 'confirmar_cadastro_receitas':
            include('confirmar_cadastro_receitas.php');
            break;

        case 'confirmar_cadastro_pacotes':
            include('confirmar_cadastro_pacotes.php');
            break;

        case 'fluxo':
            include('fluxo_caixa.php');
            break;

        case 'entrada':
            include('fluxo_caixa_entrada.php');
            break;

        case 'entrada_aluno':
            $id = $url[1];
            include('fluxo_caixa_entrada_aluno.php');
            break;

        case 'nova_venda':
            $id = $url[1];
            include('nova_venda.php');
            break;

        case 'venda_pacotes':
            $id = $url[1];
            include('venda_pacotes.php');
            break;

        case 'venda_pacote2':
            $id = $url[1];
            $id_pacote = $url[2];
            include('venda_pacotes2.php');
            break;

        case 'gerar_lista_nova':
            include('gerar_lista_nova.php');
            break;

            /// remover inicio

        case 'perfil_unidade2':
            $id = $url[1];
            include('perfil_unidade2.php');
            break;

        case 'inserir_receita_aulas':
            $id = $url[1];
            include('inserir_receita_aulas.php');
            break;


        case 'inserir_receita_cursos':
            $id = $url[1];
            include('inserir_receita_cursos.php');
            break;

        case 'inserir_receita_taxas':
            $id = $url[1];
            include('inserir_receita_taxas.php');
            break;

        case 'inserir_receita_locacao':
            $id = $url[1];
            include('inserir_receita_locacao.php');
            break;


        case 'inserir_receita_outros':
            $id = $url[1];
            include('inserir_receita_outros.php');
            break;


        case 'venda_finalizada':
            $id = $url[1];
            $id2 = $url[2];
            include('venda_finalizada.php');
            break;

        case 'trocar_imagem':
            $id = $url[1];
            include('trocar_imagem.php');
            break;


        case 'sair':
            include('sair.php');
            break;

            /// PAGINA 404
        default:
            include('404.php');
    }
}

?>	