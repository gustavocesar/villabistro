<h3>Definições</h3>

<ul class="text-justify">
    <li>
        <u>Inventário</u>: é a contagem física dos produtos mantidos pela empresa. Essa contagem pode ser controlada manualmente ou por um sistema de informação.
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
        <u>Ruptura do Estoque</u>: é caracterizada quando o estoque chega a zero e não se pode atender a uma necessidade de consumo.
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
        Cadastros
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
        Notas de Entrada
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
        Transferência Interna
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
        Controle de Estoque
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
</ol>
