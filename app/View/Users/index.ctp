<?php
echo $this->Html->css('/DataTables-1.10.13/media/css/jquery.dataTables.min');
echo $this->Html->script('/DataTables-1.10.13/media/js/jquery.dataTables.min');
?>

<div class="row">
    <div class="col-sm-2 pull-right">
        <p>
            <?php
            echo $this->Html->link(
                    '&nbsp;<span class="fa fa-plus"></span>&nbsp' . __('Add'). '&nbsp;', ['action' => 'add'], ['class' => 'btn btn-primary btn-block', 'escape' => false]
            )
            ?>
        </p>
    </div>
</div>

<div class="row">

    <div class="col-lg-12">

        <div class="panel panel-blue" style="background:#FFF;">
            <div class="panel-heading"><?php echo '<i class="fa fa-list-ol"></i>&nbsp;' . __('List'); ?></div>
            <div class="panel-body">

                <div class="table-responsive">
                    <table id="datatable" class="display">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th><?php echo __('id'); ?></th>
                                <th><?php echo __('name'); ?></th>
                                <th><?php echo __('group id'); ?></th>
                                <th><?php echo __('status'); ?></th>
                                <th><?php echo __('email'); ?></th>
                            </tr>
                        </thead>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td class="text-center">
                                    <?php
                                    echo $this->Html->link(
                                        '<i class="fa fa-check"></i>', [
                                        'controller' => 'users',
                                        'action' => 'view',
                                        $user['User']['id']
                                        ], ['escape' => false, 'title' => __('View')]
                                    );
                                    ?>
                                    &nbsp;
                                    <?php
                                    echo $this->Html->link(
                                        '<i class="fa fa-pencil"></i>', [
                                        'controller' => 'users',
                                        'action' => 'edit',
                                        $user['User']['id']
                                        ], ['escape' => false, 'title' => __('Edit')]
                                    );
                                    ?>
                                    &nbsp;
                                    <?php
                                    echo $this->Form->postLink(
                                        '<i class="fa fa-trash-o"></i>', [
                                        'controller' => 'users',
                                        'action' => 'delete',
                                        $user['User']['id']
                                        ], [
                                        'escape' => false,
                                        'title' => __('Delete'),
                                        'confirm' => __('Are you sure you want to delete # %s?', $user['User']['id'])
                                        ]
                                    );
                                    ?>
                                </td>
                                <td><?php echo h($user['User']['id']); ?></td>
                                <td><?php echo h($user['User']['name']); ?></td>
                                <td><?php echo h($user['Group']['name']); ?></td>
                                <td><?php echo h($user['User']['status']); ?></td>
                                <td><?php echo h($user['User']['email']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable').DataTable({
            language: {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            }
        });
    });
</script>