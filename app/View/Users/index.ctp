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
                    <table class="datatable compact hover row-border">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th class="text-center"><?php echo __('id'); ?></th>
                                <th><?php echo __('name'); ?></th>
                                <th><?php echo __('group id'); ?></th>
                                <th class="text-center"><?php echo __('status'); ?></th>
                                <th><?php echo __('email'); ?></th>
                            </tr>
                        </thead>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td class="text-center dt-body-nowrap">
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
                                <td class="text-center"><?php echo h($user['User']['id']); ?></td>
                                <td><?php echo h($user['User']['name']); ?></td>
                                <td><?php echo h($user['Group']['name']); ?></td>
                                
                                <td class="text-center">
                                    <?php
                                    if ($user['User']['status'] == 'Ativo') {
                                        $label = 'label-success';
                                    } else {
                                        $label = 'label-danger';
                                    }
                                    ?>
                                    <span class="label <?=$label?>">
                                        <?php echo h($user['User']['status']); ?>
                                    </span>
                                    
                                </td>
                                
                                <td><?php echo h($user['User']['email']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
