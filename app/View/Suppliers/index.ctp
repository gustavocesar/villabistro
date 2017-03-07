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
                                <th><?php echo __('company_name'); ?></th>
                                <th><?php echo __('contact_name'); ?></th>
                                <th><?php echo __('phone'); ?></th>
                                <th><?php echo __('fax'); ?></th>
                                <th><?php echo __('email'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($suppliers as $supplier): ?>
                                <tr>
                                    <td class="text-center dt-body-nowrap">
                                        <?php
                                        echo $this->Html->link(
                                                '<i class="fa fa-check"></i>', [
                                            'controller' => 'suppliers',
                                            'action' => 'view',
                                            $supplier['Supplier']['id']
                                                ], ['escape' => false, 'title' => __('View')]
                                        );
                                        ?>
                                        &nbsp;
                                        <?php
                                        echo $this->Html->link(
                                                '<i class="fa fa-pencil"></i>', [
                                            'controller' => 'suppliers',
                                            'action' => 'edit',
                                            $supplier['Supplier']['id']
                                                ], ['escape' => false, 'title' => __('Edit')]
                                        );
                                        ?>
                                        &nbsp;
                                        <?php
                                        echo $this->Form->postLink(
                                                '<i class="fa fa-trash-o"></i>', [
                                            'controller' => 'suppliers',
                                            'action' => 'delete',
                                            $supplier['Supplier']['id']
                                                ], [
                                            'escape' => false,
                                            'title' => __('Delete'),
                                            'confirm' => __('Are you sure you want to delete # %s?', $supplier['Supplier']['id'])
                                                ]
                                        );
                                        ?>
                                    </td>
                                    <td class="text-center"><?php echo h($supplier['Supplier']['id']); ?></td>
                                    <td><?php echo h($supplier['Supplier']['company_name']); ?></td>
                                    <td><?php echo h($supplier['Supplier']['contact_name']); ?></td>
                                    <td><?php echo h($supplier['Supplier']['phone']); ?></td>
                                    <td><?php echo h($supplier['Supplier']['fax']); ?></td>
                                    <td><?php echo h($supplier['Supplier']['email']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
