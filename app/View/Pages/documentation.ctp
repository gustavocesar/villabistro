<h3>Definições</h3>

<ul class="text-justify">
    <li>
        <u>Inventário</u>: é a contagem física dos produtos mantidos pela empresa.
    </li>
    <li>
        <u>Localização</u>: o controle de localização é usado para definir os locais de armazenamento dos produtos, podendo ser dividido em dois grupos: Físico e Virtual.
    </li>
    <li>
        <u>Estoque Físico</u>: é o estoque real mantido pelo estabelecimento (prateleiras).
    </li>
    <li>
        <u>Estoque Virtual</u>: é o estoque dos produtos que estão em processo de compra ou que foram vendidos. Por exemplo, quando uma nota de entrada é criada para que seja feita a reposição de um produto, a quantidade solicitada entra para o estoque virtual. E quando um produto é vendido, a quantidade vendida sai do estoque físico e passa a compor um estoque virtual.
    </li>
    <li>
        O Estoque Virtual normalmente é conduzido automaticamente pelo sistema. E o Estoque Físico é conduzido por uma pessoa (controlador do estoque).
    </li>
    <li>
        <u>Estoque Mínimo</u>: é uma quantidade morta, só sendo consumida em caso de necessidade. É a quantidade destinada a cobrir eventuais atrasos no ressuprimento, garantindo o funcionamento ininterrupto e eficiente do processo produtivo sem o risco de faltas.
    </li>
    <li>
        <u>Ruptura do Estoque</u>: é caracterizada quando o estoque chega a zero e não se pode atender a uma necessidade de consumo. Quaisquer pedidos feitos nesse momento irão causar <strong>valores negativos</strong> na contabilização do inventário.
    </li>
    <li>
        Possíveis causas para ruptura de estoque:
        <ul>
            <li>
                Oscilação no consumo
            </li>
            <li>
                Variação no prazo de reposição (possíveis atrasos na entrega)
            </li>
            <li>
                Fornecimento divergente do solicitado
            </li>
            <li>
                Diferenças no inventário
            </li>
        </ul>
    </li>
</ul>

<h3>Recursos do Sistema</h3>

<ol class="text-justify">

    <li>
        <h4>Cadastros<small>&nbsp;(menu Configurações)</small></h4>
        <ul>
            <li>
                <u>Categorias</u>:&nbsp;Classificação dos produtos numa perspectiva dos setores do estabelecimento. Ex: Restaurante, Bar, etc.
            </li>
            <li>
                <u>Subcategorias</u>:&nbsp;Subclassificação dos produtos dentro de uma Categoria. Ex: as subcategorias Sanduíches e Pratos pertencem a categoria Restaurante. As subcategorias Cervejas e Vinhos pertencem a categoria Bar.
            </li>
            <li>
                <u>Unidades de Medida</u>:&nbsp;Cadastro de todas as unidades de medida a serem utilizadas pelo sistema. Cada unidade de medida deve possuir uma sigla única, para que os produtos relacionados possam ser identificados com mais facilidade.
            </li>
            <li>
                <u>Produtos</u>:&nbsp;Cadastro dos produtos e/ou insumos (componentes) utilizados na produção. Os produtos utilizados como insumo são classificados como <strong>Estocáveis</strong>. Os produtos utilizados como produto final são classificados como <strong>Não Estocáveis</strong> e podem possuir um ou mais componentes.
            </li>
            <li>
                <u>Usuários</u>:&nbsp;Cadastro dos usuários que terão acesso ao sistema.
            </li>
            <li>
                <u>Fornecedores</u>:&nbsp;Relação das entidades responsáveis pelo suprimento dos produtos.
            </li>
            <li>
                <u>Localizações</u>:&nbsp;Para um controle de estoque mais flexível, é possível cadastrar mais de uma Localização. Essas localizações correspondem tanto a locais Virtuais (como Fornecedores, Clientes e Perdas) quanto a locais Físicos (como Armazém 1, Armazém 2, etc).
            </li>
        </ul>
    </li>

    <li>
        <h4>Controle de Mesas<small>&nbsp;(menu Mesas)</small></h4>
        <ul>
            <li>
                O sistema disponibiliza um <strong>Quadro de Mesas</strong> para que os atendentes possam realizar o lançamento de pedidos por mesa, além de oferecer uma interface simples para o acompanhamento dos pedidos de cada mesa.
            </li>
            <li>
                Para diferenciar as mesas livres das mesas ocupadas, o sistema exibe as mesas livres na cor <strong>branca</strong> e as mesas ocupadas na cor <strong>verde</strong>.
            </li>
            <ul>
                <li>
                    Exemplo:&nbsp;
                    <a class="btn btn-sm btn-default" href="javascript:;">
                        <span class="fa fa-bookmark-o"></span>
                        MESA LIVRE
                    </a>
                    &nbsp;
                    |
                    &nbsp;
                    <a class="btn btn-sm btn-green" href="javascript:;">
                        <span class="fa fa-bookmark"></span>
                        MESA OCUPADA
                    </a>
                </li>
            </ul>
            <li>
                Selecionando uma Mesa Livre, o sistema exibe uma tela com a opção de criar um Novo Pedido através do botão <a class="btn btn-sm btn-primary" href="javascript:;"><span class="fa fa-plus"></span>Novo Pedido</a>.
            </li>
            <li>
                Selecionando uma Mesa Ocupada, o sistema exibe uma tela com a listagem dos pedidos realizados e a opção para criar um Novo Pedido. Além disso, o sistema oferece as seguintes ações:
                <ul>
                    <li>
                        <u>Cancelar Pedido</u> (ícone <i class="fa fa-times"></i>): ao cancelar o pedido, o mesmo passa a ser considerado concluído e não aparecerá no fechamento da conta.
                    </li>
                    <li>
                        <u>Fechar Conta</u> (ícone <i class="fa fa-check"></i>): redireciona para a tela de pagamento e fechamento de conta.
                        <ul>
                            <li>
                                Nesta tela é possível pagar a conta <strong>parcialmente</strong> ou <strong>completa</strong>. Também permite abater um valor na conta atual.
                            </li>
                            <li>
                                Para pagar a conta parcialmente, basta selecionar apenas os itens as serem pagos no momento e clicar em Pagar. (botão <a class="btn btn-sm btn-green" href="javascript:;"><span class="fa fa-usd"></span>PAGAR</a>)
                            </li>
                            <li>
                                Para pagar a conta completa, selecione todos os itens e clique em Pagar.
                            </li>
                            <li>
                                Para abater um valor, clique em Pagar sem selecionar nenhum item.
                            </li>
                            <li>
                                A medida que são feitos pagamentos para uma mesa, o sistema verifica se ainda existem pendencias. Se ainda existirem itens a serem pagos, a mesa continua <strong>Ocupada</strong>. Se todos os itens tiverem sido quitados ou se o valor pago for maior que o valor da conta, a mesa passa a ser considerada como <strong>Liberada</strong> automaticamente.
                            </li>
                        </ul>
                    </li>
                    <li>
                        <u>Mudar de Mesa</u> (ícone <i class="fa fa-exchange"></i>): esta ação transfere tudo que está em andamento de uma mesa para outra. Isso inclui todos os pedidos e todos os valores abatidos.
                    </li>
                    <li>
                        <u>Histórico</u> (ícone <i class="fa fa-folder-open"></i>): 
                    </li>
                </ul>
            </li>
        </ul>
    </li>

    <li>
        <h4>Fila de Pedidos</h4>
        <ul>
            <li>
                Nesta tela é disponibilizada uma visão global de todos os pedidos do dia, separando-os por situação (pendente X concluído).
            </li>
            <li>
                Aqui é possível criar um Novo Pedido, ou cancelar um pedido realizado.
            </li>
        </ul>
    </li>

    <li>
        <h4>Cozinha</h4>
        <ul>
            <li>
                Esta tela oferece uma visão dos pedidos numa perspectiva para os funcionários da cozinha.
            </li>
            <li>
                As etapas importantes nesta visão são exibidas no formato <strong><i>Kanban</i></strong>, para que os funcionários da cozinha possam alterar os pedidos de uma etapa para outra simplesmente arrastando e ordenando os mesmos.
            </li>
            <li>
                Os novos pedidos criados pelos atendentes sempre entram no final da fila, na parte inferior da listagem. Então, os funcionários da cozinha podem atender os pedidos de cima para baixo, seguindo a ordem natural das solicitações.
            </li>
        </ul>
    </li>

    <li>
        <h4>Notas de Entrada</h4>
        <ul>
            <li>
                As Notas de Entrada são os comprovantes da compra de produtos. É por elas que o sistema realiza a entrada no estoque.
            </li>
            <li>
                É importante notar que existem duas situações possíveis para as Notas de Entrada.
                <ul class="text-justify">
                    <li>
                        <u>Cadastrando</u>:&nbsp;é a situação padrão para as notas. Nessa situação é possível editar quaisquer informações referentes a nota, incluir/excluir produtos dentro da nota, e editar a quantidade de cada produto.
                    </li>
                    <li>
                        <u>Concluída</u>:&nbsp;é a situação em que se finaliza a nota. Ao concluí-la os produtos serão <strong>agregados ao estoque</strong>. Após a conclusão de uma nota, a mesma não poderá mais ser alterada ou excluída, e eventuais correções devem ser feitas através de <strong>Ajustes Manuais</strong>.
                    </li>
                </ul>
            </li>
        </ul>
    </li>

    <li>
        <h4>Transferência Interna</h4>
        <ul>
            <li>
                A Transferência Interna é o recurso usado para alterar o local de estoque de produtos dentro da empresa, com o objetivo de deixar o inventário correto.
            </li>
            <li>
                Assim como nas Notas de Entrada, a Transferência Interna possui as situações Cadastrando e Concluída, e não é possível editar ou excluir uma transferência após a conclusão da mesma.
            </li>
            <li>
                Também podem ser realizados Ajustes Manuais para corrigir qualquer inconsistência após a conclusão da transferência.
            </li>
        </ul>
    </li>

    <li>
        <h4>Controle de Estoque</h4>
        <ul>
            <li>
                Nesta parte do sistema é fornecida uma visão das Localidades e seus respectivos Produtos em estoque.
            </li>
            <li>
                Indicadores:
                <ul>
                    <li>
                        <span class="label label-warning">Na Reserva</span>&nbsp;-&nbsp;Indica que a quantidade  do produto em estoque está inferior ao Estoque Mínimo.
                    </li>
                    <li>
                        <span class="label label-success">Em Estoque</span>&nbsp;-&nbsp;indica que a quantidade do produto em estoque é superior ao Estoque Mínimo.
                    </li>
                    <li>
                        <span class="label label-danger">Esgotado</span>&nbsp;-&nbsp;Indica que a quantidade do produto em estoque é zero.
                    </li>
                </ul>
            </li>
            <li>
                Se a quantidade do produto em estoque estiver abaixo do Estoque Mínimo, será exibido o indicador “Na Reserva” para aquele produto.
            </li>
            <li>
                Se a quantidade estiver acima do Estoque Mínimo será exibido o indicador “Em Estoque”, e se a quantidade do produto em estoque for zero será exibido o indicador “Esgotado”.
            </li>
            <li>
                Para cada produto dentro de uma Localização, pode-se realizar as seguintes operações:
                <ul>
                    <li>
                        <u>Visualizar Movimentações</u> (ícone <i class="fa fa-check-square-o"></i>): exibe o detalhamento das operações realizadas para cada produto.
                    </li>
                    <li>
                        <u>Ajuste Manual</u> (ícone <span class="fa fa-sliders"></span>): permite que a quantidade atual em estoque seja alterada manualmente.
                    </li>
                </ul>
            </li>
        </ul>
    </li>

    <li>
        <h4>Gráficos</h4>
        <ul>
            <li>
                Para facilitar a visualização de dados e estatísticas, o sistema disponibiliza as informações em gráficos.
            </li>
            <ol>
                <li>
                    <u>Estoque Semanal</u>:&nbsp;exibe as informações do estoque da última semana. Neste gráfico é exibido somente o estoque físico, o que garante uma visão real dos produtos mantidos nas prateleiras no momento.
                </li>
            </ol>
        </ul>
    </li>
</ol>
