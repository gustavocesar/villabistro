
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
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th><?php echo $this->Paginator->sort('id'); ?></th>
                                <th><?php echo $this->Paginator->sort('name'); ?></th>
                                <th><?php echo $this->Paginator->sort('Subcategory.name', __("Subcategory Id")); ?></th>
                                <th><?php echo $this->Paginator->sort('Unit.name', __("Unit Id")); ?></th>
                                <th><?php echo $this->Paginator->sort('status'); ?></th>
                                <th><?php echo $this->Paginator->sort('cost_price'); ?></th>
                                <th><?php echo $this->Paginator->sort('sell_price'); ?></th>
                                <th><?php echo $this->Paginator->sort('avaliable_to_order'); ?></th>
                                <th><?php echo $this->Paginator->sort('stockable'); ?></th>
                                <th><?php echo $this->Paginator->sort('minimum_stock'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product): ?>
                                <tr>
                                    <td class="text-center">
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
                                    <td><?php echo h($product['Product']['id']); ?></td>
                                    <td><?php echo h($product['Product']['name']); ?></td>
                                    <td>
                                        <?php echo $this->Html->link($product['Subcategory']['name'], array('controller' => 'subcategories', 'action' => 'view', $product['Subcategory']['id'])); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link($product['Unit']['name'], array('controller' => 'units', 'action' => 'view', $product['Unit']['id'])); ?>
                                    </td>
                                    <td><?php echo h($product['Product']['status']); ?></td>
                                    <td><?php echo $product['Product']['cost_price'] ? "R$ ". h($this->MyFormat->format_show($product['Product']['cost_price'], 2)) : ""; ?></td>
                                    <td><?php echo $product['Product']['sell_price'] ? "R$ ". h($this->MyFormat->format_show($product['Product']['sell_price'], 2)): ""; ?></td>
                                    <td><?php echo h($product['Product']['avaliable_to_order']); ?></td>
                                    <td><?php echo h($product['Product']['stockable']); ?></td>
                                    <td><?php echo h($this->MyFormat->format_show($product['Product']['minimum_stock'])); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-lg-12">
        <ul class="pagination mtm mbm">
            <?php
            echo $this->Paginator->prev(
                    '«', ['tag' => 'li', 'disabledTag' => 'a'], null, ['class' => 'disabled', 'tag' => 'li']
            );
            echo $this->Paginator->numbers(
                    ['separator' => '', 'tag' => 'li', 'currentClass' => 'disabled', 'currentTag' => 'a']
            );
            echo $this->Paginator->next(
                    '»', ['tag' => 'li', 'disabledTag' => 'a'], null, ['class' => 'next disabled', 'tag' => 'li']
            );
            ?>
        </ul>
    </div>
</div>
