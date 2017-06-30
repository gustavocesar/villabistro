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
                                <th><?php echo __("Subcategory Id"); ?></th>
                                <th><?php echo __("Unit Id"); ?></th>
                                <th class="text-center"><?php echo __('status'); ?></th>
                                <th class="text-right"><?php echo __('cost_price'); ?></th>
                                <th class="text-right"><?php echo __('sell_price'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product): ?>
                                <tr>
                                    <td class="text-center dt-body-nowrap">
                                        <?php
                                        echo $this->Html->link(
                                                '<i class="fa fa-check"></i>', [
                                            'controller' => 'products',
                                            'action' => 'view',
                                            $product['Product']['id']
                                                ], ['escape' => false, 'title' => __('View')]
                                        );
                                        ?>
                                        &nbsp;
                                        <?php
                                        echo $this->Html->link(
                                                '<i class="fa fa-pencil"></i>', [
                                            'controller' => 'products',
                                            'action' => 'edit',
                                            $product['Product']['id']
                                                ], ['escape' => false, 'title' => __('Edit')]
                                        );
                                        ?>
                                        &nbsp;
                                        <?php
                                        echo $this->Form->postLink(
                                                '<i class="fa fa-trash-o"></i>', [
                                            'controller' => 'products',
                                            'action' => 'delete',
                                            $product['Product']['id']
                                                ], [
                                            'escape' => false,
                                            'title' => __('Delete'),
                                            'confirm' => __('Are you sure you want to delete # %s?', $product['Product']['id'])
                                                ]
                                        );
                                        ?>
                                    </td>
                                    <td class="text-center"><?php echo h($product['Product']['code']); ?></td>
                                    <td><?php echo h($product['Product']['name']); ?></td>
                                    <td>
                                        <?php echo $this->Html->link($product['Subcategory']['name'], array('controller' => 'subcategories', 'action' => 'view', $product['Subcategory']['id'])); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link($product['Unit']['name'], array('controller' => 'units', 'action' => 'view', $product['Unit']['id'])); ?>
                                    </td>
                                    <td class="text-center"><?php echo h($product['Product']['status']); ?></td>
                                    <td class="text-right"><?php echo $product['Product']['cost_price'] ? h($this->MyFormat->format_show($product['Product']['cost_price'], 2)) : ""; ?></td>
                                    <td class="text-right"><?php echo $product['Product']['sell_price'] ? h($this->MyFormat->format_show($product['Product']['sell_price'], 2)): ""; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

